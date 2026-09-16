<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::ordered()->get();
        return view('admin.surveys.index', compact('surveys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_kr' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_kr' => 'required|string',
            'link' => 'required|url|max:2048',
            'sort_order' => 'nullable|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:22048',
        ]);

        $path = $request->file('image')->store('uploads/surveys', 'public');

        Survey::create([
            'title_uz'       => $request->title_uz,
            'title_ru'       => $request->title_ru,
            'title_en'       => $request->title_en,
            'title_kr'       => $request->title_kr,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'description_kr' => $request->description_kr,
            'link'           => $request->link,
            'image'          => $path,
            'is_active'      => $request->boolean('is_active'),
            'sort_order'     => $request->sort_order ?? 0,
        ]);

        return redirect()->route('surveys.index')->with('success', "So'rovnoma muvaffaqiyatli yaratildi.");
    }

    public function update(Request $request, $id)
    {
        $survey = Survey::findOrFail($id);

        $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_kr' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_kr' => 'required|string',
            'link' => 'required|url|max:2048',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:22048',
        ]);

        $data = [
            'title_uz'       => $request->title_uz,
            'title_ru'       => $request->title_ru,
            'title_en'       => $request->title_en,
            'title_kr'       => $request->title_kr,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'description_kr' => $request->description_kr,
            'link'           => $request->link,
            'is_active'      => $request->boolean('is_active'),
            'sort_order'     => $request->sort_order ?? 0,
        ];

        if ($request->hasFile('image')) {
            if ($survey->image) {
                Storage::disk('public')->delete($survey->image);
            }
            $data['image'] = $request->file('image')->store('uploads/surveys', 'public');
        }

        $survey->update($data);

        return redirect()->route('surveys.index')->with('success', "So'rovnoma muvaffaqiyatli yangilandi.");
    }

    public function destroy($id)
    {
        $survey = Survey::findOrFail($id);

        if ($survey->image) {
            Storage::disk('public')->delete($survey->image);
        }

        $survey->delete();

        return redirect()->route('surveys.index')->with('success', "So'rovnoma muvaffaqiyatli o'chirildi.");
    }

    public function publicIndex()
    {
        $surveys = Survey::active()->ordered()->get();
        return view('pages.surveys', compact('surveys'));
    }
}
