<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::with(['photos'])->ordered()->get();
        return view('admin.announcements.index', compact('announcements'));
    }

    public function publicIndex()
    {
        $announcements = Announcement::with(['photos'])->active()->ordered()->get();
        return view('pages.announcements', compact('announcements'));
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
            'sort_order' => 'nullable|integer',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:22048',
        ]);

        $announcement = Announcement::create([
            'title_uz'       => $request->title_uz,
            'title_ru'       => $request->title_ru,
            'title_en'       => $request->title_en,
            'title_kr'       => $request->title_kr,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'description_kr' => $request->description_kr,
            'is_active'      => $request->boolean('is_active'),
            'sort_order'     => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('uploads/announcements', 'public');

                $announcement->photos()->create([
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('announcements.index')->with('success', "E'lon muvaffaqiyatli yaratildi.");
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);

        $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_kr' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_kr' => 'required|string',
            'sort_order' => 'nullable|integer',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:22048',
        ]);

        $announcement->update([
            'title_uz'       => $request->title_uz,
            'title_ru'       => $request->title_ru,
            'title_en'       => $request->title_en,
            'title_kr'       => $request->title_kr,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'description_kr' => $request->description_kr,
            'is_active'      => $request->boolean('is_active'),
            'sort_order'     => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($announcement->photos as $photo) {
                Storage::disk('public')->delete($photo->file_path);
                $photo->delete();
            }

            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('uploads/announcements', 'public');
                $announcement->photos()->create([
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('announcements.index')->with('success', "E'lon muvaffaqiyatli yangilandi.");
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);

        foreach ($announcement->photos as $photo) {
            Storage::disk('public')->delete($photo->file_path);
            $photo->delete();
        }

        $announcement->delete();

        return redirect()->route('announcements.index')->with('success', "E'lon muvaffaqiyatli o'chirildi.");
    }
}
