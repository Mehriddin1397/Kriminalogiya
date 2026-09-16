<?php

namespace App\Http\Controllers;

use App\Models\Memorandum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemorandumController extends Controller
{
    public function index()
    {
        $academia = Memorandum::with('photos')->orderByDesc('date')->get();
        return view('admin.memorandum.index', compact('academia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_uz' => 'required|string|max:255',
            'country_ru' => 'required|string|max:255',
            'country_en' => 'required|string|max:255',
            'country_kr' => 'required|string|max:255',
            'org_uz' => 'required|string|max:255',
            'org_ru' => 'required|string|max:255',
            'org_en' => 'required|string|max:255',
            'org_kr' => 'required|string|max:255',
            'flag' => 'required|string|max:10',
            'doc_type' => 'required|in:memorandum,protocol,protocol_program',
            'date' => 'required|date',
            'link' => 'nullable|string|max:255',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $academia = Memorandum::create([
            'country_uz' => $request->country_uz,
            'country_ru' => $request->country_ru,
            'country_en' => $request->country_en,
            'country_kr' => $request->country_kr,
            'org_uz' => $request->org_uz,
            'org_ru' => $request->org_ru,
            'org_en' => $request->org_en,
            'org_kr' => $request->org_kr,
            'flag' => $request->flag,
            'doc_type' => $request->doc_type,
            'date' => $request->date,
            'link' => $request->link,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('uploads/photos', 'public');
                $academia->photos()->create([
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('memorandum.index')->with('success', 'Memorandum muvaffaqiyatli yaratildi.');
    }

    public function update(Request $request, $id)
    {
        $academia = Memorandum::findOrFail($id);

        $request->validate([
            'country_uz' => 'required|string|max:255',
            'country_ru' => 'required|string|max:255',
            'country_en' => 'required|string|max:255',
            'country_kr' => 'required|string|max:255',
            'org_uz' => 'required|string|max:255',
            'org_ru' => 'required|string|max:255',
            'org_en' => 'required|string|max:255',
            'org_kr' => 'required|string|max:255',
            'flag' => 'required|string|max:10',
            'doc_type' => 'required|in:memorandum,protocol,protocol_program',
            'date' => 'required|date',
            'link' => 'nullable|string|max:255',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $academia->update($request->only([
            'country_uz', 'country_ru', 'country_en', 'country_kr',
            'org_uz', 'org_ru', 'org_en', 'org_kr',
            'flag', 'doc_type', 'date', 'link',
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

        return redirect()->route('memorandum.index')->with('success', 'Memorandum muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $academia = Memorandum::findOrFail($id);

        foreach ($academia->photos as $photo) {
            Storage::disk('public')->delete($photo->file_path);
            $photo->delete();
        }

        $academia->delete();

        return redirect()->route('memorandum.index')->with('success', 'Memorandum muvaffaqiyatli o‘chirildi.');
    }
}
