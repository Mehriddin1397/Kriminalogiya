<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function index()
    {
        $papers = Paper::with('issue')->latest()->get();
        $issues = Issue::all();
        return view('papers.index', compact('papers','issues'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'issue_id' => 'required|exists:issues,id',
            'title_uz' => 'required|string',
            'title_ru' => 'required|string',
            'title_en' => 'required|string',
            'title_kr' => 'required|string',
            'author' => 'required|string',
            'pdf_file' => 'required|file|mimes:pdf'
        ]);

        $data = $request->all();

        // pdf yuklash
        if ($request->hasFile('pdf_file')) {
            $data['pdf_file'] = $request->file('pdf_file')->store('papers', 'public');
        }

        Paper::create($data);

        return redirect()->route('papers.index');
    }


    public function update(Request $request, $id)
    {
        $paper = Paper::findOrFail($id);

        $request->validate([
            'issue_id' => 'required|exists:issues,id',
            'title_uz' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('pdf_file')) {
            $data['pdf_file'] = $request->file('pdf_file')->store('papers', 'public');
        }

        $paper->update($data);

        return redirect()->route('papers.index');
    }

    public function destroy($id)
    {
        Paper::findOrFail($id)->delete();
        return back();
    }

    // 👇 download
    public function download($id)
    {
        $paper = Paper::findOrFail($id);

        return response()->download(
            storage_path('app/public/' . $paper->pdf_file)
        );
    }
}
