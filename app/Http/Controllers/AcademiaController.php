<?php

namespace App\Http\Controllers;

use App\Models\Academia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademiaController extends Controller
{
    public function index()
    {
        $academia = Academia::with(['photos'])->get();
        $categories = Category::forObjectType('academia');
        return view('admin.academia.index', compact('academia', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'file_path' => 'required|mimes:pdf,doc,docx|max:10240', // Fayl yuklash qoidalari (masalan, 10MB gacha)
            'categories' => 'array',  // Kategoriyalar array bo‘lishi kerak
            'categories.*' => 'exists:categories,id',// Kategoriyalar faqat mavjud IDlar bo‘lishi kerak
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Rasm yuklash qoidalari
        ]);

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('academia/files', 'public');
        }

        $academia = Academia::create([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'name_kr' => $request->name_kr,
            'file_path' => $filePath,
        ]);

        // Agar rasm yuklangan bo'lsa, uni saqlash
        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('photos', 'public'); // Rasmni saqlash va yo‘lini olish

            // Rasm ma'lumotlarini Photo jadvaliga yozish
            $academia->photos()->create([
                'file_path' => $filePath,
            ]);
        }

        if ($request->has('categories')) {
            $academia->categories()->attach($request->categories, ['categorizable_type' => Academia::class]);
        }
        return redirect()->route('academia.index')->with('success', 'Academia muvaffaqiyatli yaratildi.');

    }

    public function update(Request $request, $id)
    {
        $academia = Academia::findOrFail($id);
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'file_path' => 'mimes:pdf,doc,docx|max:10240', // Fayl yuklash qoidalari (masalan, 10MB gacha)
            'categories' => 'array',  // Kategoriyalar array bo‘lishi kerak
            'categories.*' => 'exists:categories,id', // Kategoriyalar faqat mavjud IDlar bo‘lishi kerak
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Rasm yuklash qoidalari
        ]);

        // Fayl yangilash
        if ($request->hasFile('file_path')) {
            $oldFile = $academia->file_path;
            if ($oldFile) {
                Storage::disk('public')->delete($oldFile); // Eski faylni o‘chirish
            }
            $filePath = $request->file('file_path')->store('academia/files', 'public');
        } else {
            $filePath = $academia->file_path;
        }

        // Ma'lumotlarni yangilash
        $academia->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'name_kr' => $request->name_kr,
            'file_path' => $filePath,
        ]);


        // Kategoriyalarni yangilash (eski kategoriyalarni o‘chirib, yangilarini qo‘shish)
        if ($request->has('categories') && !empty($request->categories)) {

            $academia->categories()->sync($request->categories);
        } else {
            // Agar hech narsa tanlanmasa, barcha bog‘lanishlarni olib tashlaydi
            $academia->categories()->detach();
        }

        // Agar yangi rasm yuklangan bo‘lsa
        if ($request->hasFile('photo')) {
            // Eski rasmni olish
            $oldPhoto = $academia->photos()->first();

            // Agar eski rasm mavjud bo‘lsa, uni o‘chirish
            if ($oldPhoto) {
                Storage::disk('public')->delete($oldPhoto->file_path);
                $oldPhoto->delete();
            }

            // Yangi rasmni saqlash
            $photoPath = $request->file('photo')->store('photos', 'public');

            // Yangi rasmni saqlash
            $academia->photos()->create([
                'file_path' => $photoPath,
            ]);
        }

        return redirect()->route('academia.index')->with('success', 'Academia muvaffaqiyatli yangilandi.');
    }


    public function destroy($id)
    {
        $academia = Academia::findOrFail($id);
        // 1. Bog‘langan rasmni o‘chirish
        if ($academia->photos()->exists()) {
            foreach ($academia->photos as $photo) {
                Storage::disk('public')->delete($photo->file_path);
                $photo->delete();
            }
        }

        // 2. Bog‘langan faylni o‘chirish
        if ($academia->file_path) {
            Storage::disk('public')->delete($academia->file_path);
        }

        // 3. Kategoriyalar bilan bog‘lanishni o‘chirish
        $academia->categories()->detach();

        // 4. Asosiy obyektni o‘chirish
        $academia->delete();

        return redirect()->route('academia.index')->with('success', 'Akademiya muvaffaqiyatli o‘chirildi.');
    }




}
