<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Institut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstitutController extends Controller
{
    //

    public function index()
    {
        $academia = Institut::with(['photos'])->get();
        $categories = Category::forObjectType('institut');
        return view('admin.institut.index', compact('academia', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_kr' => 'required|string',
            'categories' => 'array',  // Kategoriyalar array bo‘lishi kerak
            'categories.*' => 'exists:categories,id',// Kategoriyalar faqat mavjud IDlar bo‘lishi kerak
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Rasm yuklash qoidalari
        ]);


        $academia = Institut::create([
            'name_uz'       => $request->name_uz,
            'name_ru'       => $request->name_ru,
            'name_en'       => $request->name_en,
            'name_kr'       => $request->name_kr,
            'description_uz'=>$request->description_uz,
            'description_ru'=>$request->description_ru,
            'description_en'=>$request->description_en,
            'description_kr'=>$request->description_kr
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
            $academia->categories()->attach($request->categories, ['categorizable_type' => Institut::class]);
        }
        return redirect()->route('institut.index')->with('success', 'Academia muvaffaqiyatli yaratildi.');

    }

    public function update(Request $request, $id)
    {
        $academia = Institut::findOrFail($id);
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_kr' => 'required|string',
            'categories' => 'array',  // Kategoriyalar array bo‘lishi kerak
            'categories.*' => 'exists:categories,id',// Kategoriyalar faqat mavjud IDlar bo‘lishi kerak
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Rasm yuklash qoidalari
        ]);


        // Ma'lumotlarni yangilash
        $academia->update($request->only([
            'name_uz' ,
            'name_ru' ,
            'name_en' ,
            'name_kr' ,
            'description_uz',
            'description_ru',
            'description_en',
            'description_kr',
        ]));


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

        return redirect()->route('institut.index')->with('success', 'Academia muvaffaqiyatli yangilandi.');
    }


    public function destroy($id)
    {
        $academia = Institut::findOrFail($id);
        // 1. Bog‘langan rasmni o‘chirish
        if ($academia->photos()->exists()) {
            foreach ($academia->photos as $photo) {
                Storage::disk('public')->delete($photo->file_path);
                $photo->delete();
            }
        }


        // 3. Kategoriyalar bilan bog‘lanishni o‘chirish
        $academia->categories()->detach();

        // 4. Asosiy obyektni o‘chirish
        $academia->delete();

        return redirect()->route('institut.index')->with('success', 'Akademiya muvaffaqiyatli o‘chirildi.');
    }
}
