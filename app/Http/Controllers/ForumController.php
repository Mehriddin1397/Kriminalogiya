<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::with('photos')->orderByDesc('event_start_date')->get();

        return view('admin.forums.index', compact('forums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'label_uz' => 'required|string|max:255',
            'label_ru' => 'required|string|max:255',
            'label_en' => 'required|string|max:255',
            'label_kr' => 'required|string|max:255',
            'theme_uz' => 'required|string|max:255',
            'theme_ru' => 'required|string|max:255',
            'theme_en' => 'required|string|max:255',
            'theme_kr' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_kr' => 'required|string',
            'stats_uz' => 'nullable|string',
            'stats_ru' => 'nullable|string',
            'stats_en' => 'nullable|string',
            'stats_kr' => 'nullable|string',
            'event_start_date' => 'required|date',
            'event_end_date' => 'nullable|date|after_or_equal:event_start_date',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $forum = Forum::create($request->only([
            'label_uz', 'label_ru', 'label_en', 'label_kr',
            'theme_uz', 'theme_ru', 'theme_en', 'theme_kr',
            'description_uz', 'description_ru', 'description_en', 'description_kr',
            'stats_uz', 'stats_ru', 'stats_en', 'stats_kr',
            'event_start_date', 'event_end_date',
        ]));

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('uploads/photos', 'public');
                $forum->photos()->create([
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('forums.index')->with('success', 'Forum muvaffaqiyatli yaratildi.');
    }

    public function update(Request $request, $id)
    {
        $forum = Forum::findOrFail($id);

        $request->validate([
            'label_uz' => 'required|string|max:255',
            'label_ru' => 'required|string|max:255',
            'label_en' => 'required|string|max:255',
            'label_kr' => 'required|string|max:255',
            'theme_uz' => 'required|string|max:255',
            'theme_ru' => 'required|string|max:255',
            'theme_en' => 'required|string|max:255',
            'theme_kr' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_kr' => 'required|string',
            'stats_uz' => 'nullable|string',
            'stats_ru' => 'nullable|string',
            'stats_en' => 'nullable|string',
            'stats_kr' => 'nullable|string',
            'event_start_date' => 'required|date',
            'event_end_date' => 'nullable|date|after_or_equal:event_start_date',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $forum->update($request->only([
            'label_uz', 'label_ru', 'label_en', 'label_kr',
            'theme_uz', 'theme_ru', 'theme_en', 'theme_kr',
            'description_uz', 'description_ru', 'description_en', 'description_kr',
            'stats_uz', 'stats_ru', 'stats_en', 'stats_kr',
            'event_start_date', 'event_end_date',
        ]));

        if ($request->hasFile('photos')) {
            foreach ($forum->photos as $photo) {
                Storage::disk('public')->delete($photo->file_path);
                $photo->delete();
            }
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('uploads/photos', 'public');
                $forum->photos()->create([
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('forums.index')->with('success', 'Forum muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $forum = Forum::findOrFail($id);

        foreach ($forum->photos as $photo) {
            Storage::disk('public')->delete($photo->file_path);
            $photo->delete();
        }

        $forum->delete();

        return redirect()->route('forums.index')->with('success', 'Forum muvaffaqiyatli o‘chirildi.');
    }
}
