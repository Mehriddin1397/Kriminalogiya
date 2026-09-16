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
        $validated = $request->validate([
            'issue_id' => 'required|exists:issues,id',
            'title_uz' => 'required|string',
            'title_ru' => 'required|string',
            'title_en' => 'required|string',
            'title_kr' => 'required|string',
            'author' => 'required|string',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_kr' => 'nullable|string',
            'pdf_file' => 'required|file|mimes:pdf|max:20480'
        ]);

        $validated['pdf_file'] = $request->file('pdf_file')->store('papers', 'public');

        Paper::create($validated);

        return redirect()->route('papers.index')->with('success', 'Maqola muvaffaqiyatli yaratildi.');
    }


    public function update(Request $request, $id)
    {
        $paper = Paper::findOrFail($id);

        $validated = $request->validate([
            'issue_id' => 'required|exists:issues,id',
            'title_uz' => 'required|string',
            'title_ru' => 'required|string',
            'title_en' => 'required|string',
            'title_kr' => 'required|string',
            'author' => 'required|string',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_kr' => 'nullable|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:20480'
        ]);

        // 'pdf_file' faqat yangi fayl yuklanganda yoki o'chirish so'ralganda o'zgartiriladi,
        // aks holda mavjud faylni saqlab qolamiz (aks holda NOT NULL bo'lmagan ustunni bo'sh qilib qo'yish xavfi bor edi).
        unset($validated['pdf_file']);

        if ($request->boolean('remove_pdf')) {
            if ($paper->pdf_file && Storage::disk('public')->exists($paper->pdf_file)) {
                Storage::disk('public')->delete($paper->pdf_file);
            }
            $validated['pdf_file'] = null;
        } elseif ($request->hasFile('pdf_file')) {
            if ($paper->pdf_file && Storage::disk('public')->exists($paper->pdf_file)) {
                Storage::disk('public')->delete($paper->pdf_file);
            }
            $validated['pdf_file'] = $request->file('pdf_file')->store('papers', 'public');
        }

        $paper->update($validated);

        return redirect()->route('papers.index')->with('success', 'Maqola muvaffaqiyatli yangilandi');
    }

    public function destroy($id)
    {
        $paper = Paper::findOrFail($id);

        if ($paper->pdf_file && Storage::disk('public')->exists($paper->pdf_file)) {
            Storage::disk('public')->delete($paper->pdf_file);
        }

        $paper->delete();

        return back()->with('success', "Muvaffaqiyatli o'chirildi");
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
