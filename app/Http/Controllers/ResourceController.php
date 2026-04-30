<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::latest()->paginate(10);
        return view('admin.resourse.index', compact('resources'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'link' => 'nullable|url',
            'file' => 'nullable|file|max:2048',
        ]);

        $data = $request->all();

        // agar file bo‘lsa
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('resources', 'public');
            $data['file'] = $filePath;
            $data['link'] = null; // faqat bittasi ishlasin
        }

        // agar link bo‘lsa
        if ($request->link) {
            $data['file'] = null;
        }

        Resource::create($data);

        return redirect()->route('resources.index')->with('success', 'Qo‘shildi');
    }


    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'link' => 'nullable|url',
            'file' => 'nullable|file|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('resources', 'public');
            $data['file'] = $filePath;
            $data['link'] = null;
        }

        if ($request->link) {
            $data['file'] = null;
        }

        $resource->update($data);

        return redirect()->route('resources.index')->with('success', 'Yangilandi');
    }

    public function destroy(Resource $resource)
    {
        if ($resource->file && file_exists(storage_path('app/public/' . $resource->file))) {
            unlink(storage_path('app/public/' . $resource->file));
        }

        $resource->delete();

        return back()->with('success', 'O‘chirildi');
    }
}
