<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaperController extends Controller
{
    public function index()
    {
        $papers = Paper::with('issue')->latest()->get();
        $issues = Issue::all();
        return view('admin.paper.index', compact('papers','issues'));
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
            'title_ru' => 'required|string',
            'title_en' => 'required|string',
            'title_kr' => 'required|string',
            'author' => 'required|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        $data = $request->all();

        // PDF faylni o'chirish
        if ($request->has('remove_pdf') && $request->remove_pdf == 1) {
            if ($paper->pdf_file && Storage::disk('public')->exists($paper->pdf_file)) {
                Storage::disk('public')->delete($paper->pdf_file);
            }
            $data['pdf_file'] = null;
        }

        // Yangi PDF yuklash
        if ($request->hasFile('pdf_file')) {
            // Eski PDF faylni o'chirish
            if ($paper->pdf_file && Storage::disk('public')->exists($paper->pdf_file)) {
                Storage::disk('public')->delete($paper->pdf_file);
            }

            $path = $request->file('pdf_file')->store('papers', 'public');
            $data['pdf_file'] = $path;
        }

        $paper->update($data);

        return redirect()->route('papers.index')->with('success', 'Maqola muvaffaqiyatli yangilandi');
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
