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
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);


        $data = $request->all();

        // rasm yuklash
        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('issues', 'public');
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
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        // File upload qismi
        if ($request->hasFile('file_path')) {
            // Eski faylni o'chirish (agar mavjud bo'lsa)
            if ($issue->file_path && Storage::disk('public')->exists($issue->file_path)) {
                Storage::disk('public')->delete($issue->file_path);
            }

            $path = $request->file('file_path')->store('issues', 'public');
            $validated['file_path'] = $path;
        }

        $issue->update($validated);

        return redirect()->route('issues.index')->with('success', 'Muvaffaqiyatli yangilandi');
    }

    public function destroy($id)
    {
        Issue::findOrFail($id)->delete();
        return back();
    }
}
