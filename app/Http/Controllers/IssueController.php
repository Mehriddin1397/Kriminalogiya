<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::with('journal')->latest()->get();
        $journals = Journal::all();
        return view('admin.issue.index', compact('issues','journals'));
    }


    public function store(Request $request)
    {


        $request->validate([
            'journal_id' => 'required|exists:journals,id',
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_kr' => 'required|string|max:255',
            'number' => 'required|integer|min:1',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'published_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'file_path' => 'nullable|file|mimes:pdf|max:204800'
        ]);


        $data = $request->except(['image', 'file_path']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('issues/covers', 'public');
        }

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('issues/files', 'public');
        }

        Issue::create($data);

        return redirect()->route('issues.index');
    }


    public function update(Request $request, $id)
    {
        $issue = Issue::findOrFail($id);

        $validated = $request->validate([
            'journal_id' => 'required|exists:journals,id',
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_kr' => 'required|string|max:255',
            'number' => 'required|integer|min:1',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'published_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'file_path' => 'nullable|file|mimes:pdf|max:204800'
        ]);

        // 'image' va 'file_path' faqat yangi fayl yuklanganda yoki o'chirish so'ralganda o'zgartiriladi,
        // aks holda mavjud faylni saqlab qolamiz.
        unset($validated['image'], $validated['file_path']);

        if ($request->boolean('remove_image')) {
            if ($issue->image && Storage::disk('public')->exists($issue->image)) {
                Storage::disk('public')->delete($issue->image);
            }
            $validated['image'] = null;
        } elseif ($request->hasFile('image')) {
            if ($issue->image && Storage::disk('public')->exists($issue->image)) {
                Storage::disk('public')->delete($issue->image);
            }
            $validated['image'] = $request->file('image')->store('issues/covers', 'public');
        }

        if ($request->boolean('remove_file')) {
            if ($issue->file_path && Storage::disk('public')->exists($issue->file_path)) {
                Storage::disk('public')->delete($issue->file_path);
            }
            $validated['file_path'] = null;
        } elseif ($request->hasFile('file_path')) {
            if ($issue->file_path && Storage::disk('public')->exists($issue->file_path)) {
                Storage::disk('public')->delete($issue->file_path);
            }
            $validated['file_path'] = $request->file('file_path')->store('issues/files', 'public');
        }

        $issue->update($validated);

        return redirect()->route('issues.index')->with('success', 'Muvaffaqiyatli yangilandi');
    }

    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);

        if ($issue->file_path && Storage::disk('public')->exists($issue->file_path)) {
            Storage::disk('public')->delete($issue->file_path);
        }

        if ($issue->image && Storage::disk('public')->exists($issue->image)) {
            Storage::disk('public')->delete($issue->image);
        }

        $issue->delete();

        return back()->with('success', "Muvaffaqiyatli o'chirildi");
    }
}
