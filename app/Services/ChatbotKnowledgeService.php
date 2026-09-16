<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Journal;
use App\Models\Rahbariyat;
use Illuminate\Support\Facades\Cache;

/**
 * Builds the "knowledge document" the chatbot answers from, live, out of data
 * that already exists in the project (DB + resources/data/*.php + lang files),
 * instead of a hand-maintained static file that could drift out of sync.
 */
class ChatbotKnowledgeService
{
    private const PROJECT_CATEGORIES = [
        ['data' => 'tashabbus_projects', 'lang' => 'tashabbus', 'route' => 'tashabbus_projects'],
        ['data' => 'buyurtma_projects', 'lang' => 'buyurtma', 'route' => 'buyurtma_projects'],
        ['data' => 'davlat_granti_projects', 'lang' => 'davlat_granti', 'route' => 'davlat_granti_projects'],
        ['data' => 'xalqaro_qoshma_projects', 'lang' => 'xalqaro_qoshma', 'route' => 'xalqaro_qoshma_projects'],
    ];

    private const SECTION_LINKS = [
        ['lan.bosh_sahifa', 'main'],
        ['lan.rahbariyat', 'boss'],
        ['lan.ilm_jurnal', 'journals_index'],
        ['lan.fotogaleriya', 'gallery'],
        ['lan.tad_natij', 'research_numbers'],
        ['lan.boglanish', 'contact'],
    ];

    public function build(): string
    {
        $locale = app()->getLocale();

        return Cache::remember("chatbot_knowledge_{$locale}", now()->addHour(), function () {
            $sections = array_filter([
                __('chatbot.about_paragraph'),
                $this->councilsSection(),
                $this->leadershipSection(),
                $this->projectsSection(),
                $this->journalsSection(),
                $this->sectionsGuide(),
                $this->contactSection(),
            ]);

            return implode("\n\n", $sections);
        });
    }

    private function councilsSection(): string
    {
        $lines = [
            '## ' . __('chatbot.councils_label'),
            '- ' . __('lan.institut_huzuridagi_kengashlar'),
            '- ' . __('lan.kriminologiya_kengashi'),
            '- ' . __('lan.xalqaro_ekspertlar_kengashi'),
            '- ' . __('lan.ilmiy_darajalar_beruvchi_kengashlar') . ': ' . implode(', ', [
                __('lan.kriminologiya_ixtisosligi_12_00_15'),
                __('lan.jinoyat_huquqi_12_00_08'),
                __('lan.huquqbuzarliklar_profilaktikasi_12_00_14'),
                __('lan.kiberxavfsizlik_05_01_12'),
            ]),
        ];

        return implode("\n", $lines);
    }

    private function leadershipSection(): string
    {
        $people = Rahbariyat::all();

        if ($people->isEmpty()) {
            return '';
        }

        $lines = ['## ' . __('chatbot.leadership_label')];

        foreach ($people as $person) {
            $lines[] = '- ' . $person->name . ' — ' . $person->post;
        }

        return implode("\n", $lines);
    }

    private function projectsSection(): string
    {
        $lines = ['## ' . __('chatbot.projects_label')];

        foreach (self::PROJECT_CATEGORIES as $category) {
            $projects = require resource_path("data/{$category['data']}.php");
            $completed = array_values(array_filter($projects, fn ($p) => $p['status'] === 'completed'));
            $ongoing = array_values(array_filter($projects, fn ($p) => $p['status'] === 'ongoing'));

            $lines[] = '### ' . __("{$category['lang']}.title") . ' (' . count($projects) . ')';
            $lines[] = __("{$category['lang']}.tab_completed") . ' (' . count($completed) . '):';
            foreach ($completed as $project) {
                $lines[] = '  - ' . __("{$category['lang']}.projects.{$project['key']}");
            }
            $lines[] = __("{$category['lang']}.tab_ongoing") . ' (' . count($ongoing) . '):';
            foreach ($ongoing as $project) {
                $lines[] = '  - ' . __("{$category['lang']}.projects.{$project['key']}");
            }
            $lines[] = __('lan.batafsil') . ': ' . route($category['route'], [], false);
            $lines[] = '';
        }

        return implode("\n", $lines);
    }

    private function journalsSection(): string
    {
        $journals = Journal::all();

        if ($journals->isEmpty()) {
            return '';
        }

        $lines = ['## ' . __('chatbot.journals_label')];

        foreach ($journals as $journal) {
            $lines[] = '- ' . $journal->name;
        }

        $lines[] = __('lan.batafsil') . ': ' . route('journals_index', [], false);

        return implode("\n", $lines);
    }

    private function sectionsGuide(): string
    {
        $lines = ['## ' . __('chatbot.sections_label')];

        foreach (self::SECTION_LINKS as [$labelKey, $routeName]) {
            $lines[] = '- ' . __($labelKey) . ': ' . route($routeName, [], false);
        }

        return implode("\n", $lines);
    }

    private function contactSection(): string
    {
        $contact = Contact::find(1);

        if (!$contact) {
            return '';
        }

        $lines = ['## ' . __('chatbot.contact_label')];

        if (!empty($contact->address)) {
            $lines[] = __('lan.address') . ': ' . $contact->address;
        }
        if (!empty($contact->phone)) {
            $lines[] = __('lan.telefon') . ': ' . $contact->phone;
        }
        if (!empty($contact->email)) {
            $lines[] = __('lan.email') . ': ' . $contact->email;
        }
        if (!empty($contact->worktime)) {
            $lines[] = __('lan.ish_jadvali') . ': ' . $contact->worktime;
        }

        return implode("\n", $lines);
    }
}
