<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
        ]);

        Category::create([
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

        return redirect()->route('categories.index')->with('success', 'Kategoriya yaratildi!');
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategoriya yaratildi!');
    }


}
