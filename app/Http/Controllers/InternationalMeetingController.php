<?php

namespace App\Http\Controllers;

use App\Models\InternationalMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InternationalMeetingController extends Controller
{
    public function index()
    {
        $academia = InternationalMeeting::with('photos')->orderByDesc('event_date')->get();
        return view('admin.international_meeting.index', compact('academia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_kr' => 'required|string',
            'event_date' => 'required|date',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $academia = InternationalMeeting::create([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'name_kr' => $request->name_kr,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'description_kr' => $request->description_kr,
            'event_date' => $request->event_date,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('uploads/photos', 'public');
                $academia->photos()->create([
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('international-meeting.index')->with('success', 'Xalqaro uchrashuv muvaffaqiyatli yaratildi.');
    }

    public function update(Request $request, $id)
    {
        $academia = InternationalMeeting::findOrFail($id);

        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_kr' => 'required|string',
            'event_date' => 'required|date',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $academia->update($request->only([
            'name_uz', 'name_ru', 'name_en', 'name_kr',
            'description_uz', 'description_ru', 'description_en', 'description_kr',
            'event_date',
        ]));

        if ($request->hasFile('photos')) {
            foreach ($academia->photos as $photo) {
                Storage::disk('public')->delete($photo->file_path);
                $photo->delete();
            }
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('uploads/photos', 'public');
                $academia->photos()->create([
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('international-meeting.index')->with('success', 'Xalqaro uchrashuv muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $academia = InternationalMeeting::findOrFail($id);

        foreach ($academia->photos as $photo) {
            Storage::disk('public')->delete($photo->file_path);
            $photo->delete();
        }

        $academia->delete();

        return redirect()->route('international-meeting.index')->with('success', 'Xalqaro uchrashuv muvaffaqiyatli o‘chirildi.');
    }
}
