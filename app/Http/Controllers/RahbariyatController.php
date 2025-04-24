<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rahbariyat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RahbariyatController extends Controller
{
    //

    public function index()
    {
        $academia = Rahbariyat::with(['photos'])->get();
        return view('admin.rahbariyat.index', compact('academia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'email'   => 'required|string|max:255',
            'phone'   => 'required|string|max:255',
            'worktime'=> 'required|string|max:255',
            'post_uz' => 'required|string',
            'post_ru' => 'required|string',
            'post_en' => 'required|string',
            'post_kr' => 'required|string',
            'photo'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Rasm yuklash qoidalari
        ]);


        $academia = Rahbariyat::create([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'name_kr' => $request->name_kr,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'worktime'=>$request->worktime,
            'post_uz' =>$request->post_uz,
            'post_ru' =>$request->post_ru,
            'post_en' =>$request->post_en,
            'post_kr' =>$request->post_kr,
        ]);

        // Agar rasm yuklangan bo'lsa, uni saqlash
        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('photos', 'public'); // Rasmni saqlash va yo‘lini olish

            // Rasm ma'lumotlarini Photo jadvaliga yozish
            $academia->photos()->create([
                'file_path' => $filePath,
            ]);
        }


        return redirect()->route('rahbariyat.index')->with('success', 'Academia muvaffaqiyatli yaratildi.');

    }

    public function update(Request $request, $id)
    {
        $academia = Rahbariyat::findOrFail($id);
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_kr' => 'required|string|max:255',
            'email'   => 'required|string|max:255',
            'phone'   => 'required|string|max:255',
            'worktime'=> 'required|string|max:255',
            'post_uz' => 'required|string',
            'post_ru' => 'required|string',
            'post_en' => 'required|string',
            'post_kr' => 'required|string',
            'photo'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Rasm yuklash qoidalari
        ]);


        // Ma'lumotlarni yangilash
        $academia->update($request->only([
            'name_uz' ,
            'name_ru' ,
            'name_en' ,
            'name_kr' ,
            'email'   ,
            'phone'   ,
            'worktime',
            'post_uz' ,
            'post_ru' ,
            'post_en' ,
            'post_kr' ,
        ]));

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

        return redirect()->route('rahbariyat.index')->with('success', 'Academia muvaffaqiyatli yangilandi.');
    }


    public function destroy($id)
    {
        $academia = Rahbariyat::findOrFail($id);
        // 1. Bog‘langan rasmni o‘chirish
        if ($academia->photos()->exists()) {
            foreach ($academia->photos as $photo) {
                Storage::disk('public')->delete($photo->file_path);
                $photo->delete();
            }
        }


        // 4. Asosiy obyektni o‘chirish
        $academia->delete();

        return redirect()->route('rahbariyat.index')->with('success', 'Akademiya muvaffaqiyatli o‘chirildi.');
    }
}
