<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //

    public function index()
    {
        $academia = News::with(['photos'])->get();
        $categories = Category::forObjectType('news');
        return view('admin.news.index', compact('academia', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'title_uz' => 'required|string|max:10000',
            'title_ru' => 'required|string|max:10000',
            'title_en' => 'required|string|max:10000',
            'title_kr' => 'required|string|max:10000',
            'description_uz' => 'required|string|max:10000',
            'description_ru' => 'required|string|max:10000',
            'description_en' => 'required|string|max:10000',
            'description_kr' => 'required|string|max:10000',
            'youtube_link' => 'nullable|string|max:255',
            'telegram_link' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'categories' => 'array',  // Kategoriyalar array bo‘lishi kerak
            'categories.*' => 'exists:categories,id',// Kategoriyalar faqat mavjud IDlar bo‘lishi kerak
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:22048', // rasm validatsiyasi
        ]);


        $academia = News::create([
            'name_uz'       => $request->name_uz,
            'name_ru'       => $request->name_ru,
            'name_en'       => $request->name_en,
            'name_kr'       => $request->name_kr,
            'title_uz'      => $request->title_uz,
            'title_ru'      => $request->title_ru,
            'title_en'      =>$request->title_en,
            'title_kr'      => $request->title_kr,
            'description_uz'=>$request->description_uz,
            'description_ru'=>$request->description_ru,
            'description_en'=>$request->description_en,
            'description_kr'=>$request->description_kr,
            'youtube_link'  => $request->youtube_link,
            'telegram_link' =>$request->telegram_link,
            'facebook_link' =>$request->facebook_link,
            'whatsapp_link' =>$request->whatsapp_link,
        ]);

        // Rasmlarni saqlash
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('uploads/photos', 'public');

                $academia->photos()->create([
                    'file_path' => $path,
                ]);
            }
        }

        if ($request->has('categories')) {
            $academia->categories()->attach($request->categories, ['categorizable_type' => News::class]);
        }
        return redirect()->route('news.index')->with('success', 'Academia muvaffaqiyatli yaratildi.');

    }

    public function update(Request $request, $id)
    {
        $academia = News::findOrFail($id);
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_kr' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_kr' => 'required|string',
            'youtube_link' => 'nullable|string|max:255',
            'telegram_link' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'categories' => 'array',  // Kategoriyalar array bo‘lishi kerak
            'categories.*' => 'exists:categories,id',// Kategoriyalar faqat mavjud IDlar bo‘lishi kerak
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // rasm validatsiyasi
        ]);


        // Ma'lumotlarni yangilash
        $academia->update($request->only([
            'name_uz' ,
            'name_ru' ,
            'name_en' ,
            'name_kr' ,
            'title_uz',
            'title_ru',
            'title_en',
            'title_kr',
            'description_uz',
            'description_ru',
            'description_en',
            'description_kr',
            'youtube_link' ,
            'telegram_link',
            'facebook_link',
            'whatsapp_link',
        ]));


        // Kategoriyalarni yangilash (eski kategoriyalarni o‘chirib, yangilarini qo‘shish)
        if ($request->has('categories') && !empty($request->categories)) {

            $academia->categories()->sync($request->categories);
        } else {
            // Agar hech narsa tanlanmasa, barcha bog‘lanishlarni olib tashlaydi
            $academia->categories()->detach();
        }

        // Agar yangi rasm yuklangan bo‘lsa
        if ($request->hasFile('photos')) {
            // 1. Eski rasmlarni o'chirish
            foreach ($academia->photos as $photo) {
                Storage::disk('public')->delete($photo->file_path);
                $photo->delete(); // Bazadan yozuvni o'chirish
            }
            // 2. Yangi rasmlarni yuklash
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('uploads/photos', 'public');
                    $academia->photos()->create([
                        'file_path' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('news.index')->with('success', 'Academia muvaffaqiyatli yangilandi.');
    }


    public function destroy($id)
    {
        $academia = News::findOrFail($id);
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

        return redirect()->route('news.index')->with('success', 'Akademiya muvaffaqiyatli o‘chirildi.');
    }
}
