<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\Journal;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::with('journal')->latest()->get();
        $journals = Journal::all();
        return view('issues.index', compact('issues','journals'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'journal_id' => 'required|exists:journals,id',
            'title' => 'required|string',
            'number' => 'required|integer',
            'year' => 'required|integer',
            'published_at' => 'nullable|date',
            'file_path' => 'nullable|image'
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

        $request->validate([
            'journal_id' => 'required|exists:journals,id',
            'title' => 'required|string',
            'number' => 'required|integer',
            'year' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('issues', 'public');
        }

        $issue->update($data);

        return redirect()->route('issues.index');
    }

    public function destroy($id)
    {
        Issue::findOrFail($id)->delete();
        return back();
    }
}
