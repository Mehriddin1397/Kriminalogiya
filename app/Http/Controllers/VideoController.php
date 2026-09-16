<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderByDesc('id')->get();

        return view('admin.videos.index', compact('videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_kr' => 'nullable|string|max:255',
            'youtube_url' => ['required', 'string', 'max:500', function ($attribute, $value, $fail) {
                if (!(new Video(['youtube_url' => $value]))->youtube_id) {
                    $fail('Havola YouTube video havolasi bo\'lishi kerak.');
                }
            }],
        ]);

        Video::create($request->only(['name_uz', 'name_ru', 'name_en', 'name_kr', 'youtube_url']));

        return redirect()->route('videos.index')->with('success', 'Video muvaffaqiyatli qo\'shildi.');
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_kr' => 'nullable|string|max:255',
            'youtube_url' => ['required', 'string', 'max:500', function ($attribute, $value, $fail) {
                if (!(new Video(['youtube_url' => $value]))->youtube_id) {
                    $fail('Havola YouTube video havolasi bo\'lishi kerak.');
                }
            }],
        ]);

        $video->update($request->only(['name_uz', 'name_ru', 'name_en', 'name_kr', 'youtube_url']));

        return redirect()->route('videos.index')->with('success', 'Video muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        Video::findOrFail($id)->delete();

        return redirect()->route('videos.index')->with('success', 'Video o\'chirildi.');
    }
}
