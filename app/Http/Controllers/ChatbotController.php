<?php

namespace App\Http\Controllers;

use App\Services\ChatbotKnowledgeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function ask(Request $request, ChatbotKnowledgeService $knowledgeService)
    {
        $data = $request->validate([
            'message' => ['required', 'string', 'max:1000'],
            'history' => ['sometimes', 'array', 'max:12'],
            'history.*.role' => ['required_with:history', 'in:user,model'],
            'history.*.text' => ['required_with:history', 'string', 'max:2000'],
        ]);

        $apiKey = config('services.gemini.api_key');
        $model = config('services.gemini.model');

        if (empty($apiKey)) {
            return response()->json(['error' => __('chatbot.error_config')], 503);
        }

        $contents = [];
        foreach ($data['history'] ?? [] as $turn) {
            $contents[] = [
                'role' => $turn['role'],
                'parts' => [['text' => $turn['text']]],
            ];
        }
        $contents[] = [
            'role' => 'user',
            'parts' => [['text' => $data['message']]],
        ];

        $systemInstruction = $this->buildSystemInstruction($knowledgeService->build());

        try {
            $response = Http::timeout(25)
                ->withHeaders(['x-goog-api-key' => $apiKey])
                ->post(
                    "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent",
                    [
                        'system_instruction' => ['parts' => [['text' => $systemInstruction]]],
                        'contents' => $contents,
                        'generationConfig' => [
                            'temperature' => 0.4,
                            'maxOutputTokens' => 700,
                        ],
                    ]
                )
                ->throw();
        } catch (\Throwable $e) {
            Log::warning('Gemini chatbot request failed: ' . $e->getMessage());

            return response()->json(['error' => __('chatbot.error_generic')], 502);
        }

        $reply = data_get($response->json(), 'candidates.0.content.parts.0.text');

        if (empty($reply)) {
            return response()->json(['error' => __('chatbot.error_generic')], 502);
        }

        return response()->json(['reply' => trim($reply)]);
    }

    private function buildSystemInstruction(string $knowledge): string
    {
        $locale = app()->getLocale();
        $languageNames = [
            'uz' => 'Uzbek (Latin script)',
            'ru' => 'Russian',
            'en' => 'English',
        ];
        $language = $languageNames[$locale] ?? 'Uzbek (Latin script)';

        return <<<PROMPT
You are the official virtual assistant of the Criminology Research Institute of the Republic of Uzbekistan website.

Rules:
- Always answer in {$language}, regardless of the language the user writes in.
- Answer ONLY using facts from the KNOWLEDGE DOCUMENT below.
- If the answer is not in the document, say honestly that you don't have that information and suggest contacting the institute via the contact page. Never invent facts, names, numbers, or events.
- Be concise, warm, and professional. Prefer short paragraphs or short bullet lists.
- When relevant, mention the site page path from the document (e.g. "/tadqiqot-loyihalari/...") so the user can open it.

KNOWLEDGE DOCUMENT:
{$knowledge}
PROMPT;
    }
}
