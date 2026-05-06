<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'slug_uz' => 'required|string|max:255',
            'slug_ru' => 'required|string|max:255',
            'slug_en' => 'required|string|max:255',
            'slug_kr' => 'required|string|max:255',
            'object_type' => 'required|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif', // rasm validatsiyasi
        ]);

        $category = Category::create([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'name_kr' => $request->name_kr,
            'slug_uz' => $request->slug_uz,
            'slug_ru' => $request->slug_ru,
            'slug_en' => $request->slug_en,
            'slug_kr' => $request->slug_kr,
            'object_type' => $request->object_type,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('uploads/photos', 'public');

                $category->photos()->create([
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('categories.index')->with('success', 'Kategoriya yaratildi!');
    }

    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'slug_uz' => 'required|string|max:255',
            'slug_ru' => 'required|string|max:255',
            'slug_en' => 'required|string|max:255',
            'slug_kr' => 'required|string|max:255',
            'object_type' => 'required|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // rasm validatsiyasi
        ]);

        $category->update($request->only([
            'name_uz',
            'name_ru',
            'name_en',
            'name_kr',
            'slug_uz',
            'slug_ru',
            'slug_en',
            'slug_kr',
            'object_type']));

        // Agar yangi rasm yuklangan bo‘lsa
        if ($request->hasFile('photos')) {
            // 1. Eski rasmlarni o'chirish
            foreach ($category->photos as $photo) {
                Storage::disk('public')->delete($photo->file_path);
                $photo->delete(); // Bazadan yozuvni o'chirish
            }
            // 2. Yangi rasmlarni yuklash
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('uploads/photos', 'public');
                    $category->photos()->create([
                        'file_path' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('categories.index')->with('success', 'Kategoriya yaratildi!');
    }

    public function destroy(Request $request, Category $category)
    {


        // 1. Bog‘langan rasmni o‘chirish
        if ($category->photos()->exists()) {
            foreach ($category->photos as $photo) {
                Storage::disk('public')->delete($photo->file_path);
                $photo->delete();
            }
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategoriya yaratildi!');
    }


}
