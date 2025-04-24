<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    //
    public function index()
    {
        $academia = Contact::all();
        return view('admin.contact.index', compact('academia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_uz'    => 'required|string|max:255',
            'address_ru'    => 'required|string|max:255',
            'address_en'    => 'required|string|max:255',
            'address_kr'    => 'required|string|max:255',
            'email'         => 'required|string|max:255',
            'phone'         => 'required|string|max:255',
            'worktime'      => 'required|string|max:255',
            'youtube_link'  => 'nullable|string|max:255',
            'telegram_link' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
        ]);


        Contact::create([
            'address_uz'   => $request-> address_uz,
            'address_ru'   => $request-> address_ru,
            'address_en'   => $request-> address_en,
            'address_kr'   => $request-> address_kr,
            'email'        => $request-> email,
            'phone'        =>$request-> phone,
            'worktime'     =>$request-> worktime ,
            'youtube_link' =>$request-> youtube_link ,
            'telegram_link'=>$request-> telegram_link,
            'facebook_link'=>$request-> facebook_link,
            'whatsapp_link'=>$request->whatsapp_link,
        ]);

        return redirect()->route('contact.index')->with('success', 'Academia muvaffaqiyatli yaratildi.');

    }

    public function update(Request $request, $id)
    {
        $academia = Contact::findOrFail($id);
        $request->validate([
            'address_uz'    => 'required|string|max:255',
            'address_ru'    => 'required|string|max:255',
            'address_en'    => 'required|string|max:255',
            'address_kr'    => 'required|string|max:255',
            'email'         => 'required|string|max:255',
            'phone'         => 'required|string|max:255',
            'worktime'      => 'required|string|max:255',
            'youtube_link'  => 'nullable|string|max:255',
            'telegram_link' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
        ]);


        // Ma'lumotlarni yangilash
        $academia->update($request->only([
            'address_uz'   ,
            'address_ru'   ,
            'address_en'   ,
            'address_kr'   ,
            'email'        ,
            'phone'        ,
            'worktime'     ,
            'youtube_link' ,
            'telegram_link',
            'facebook_link',
            'whatsapp_link',
        ]));


        return redirect()->route('contact.index')->with('success', 'Academia muvaffaqiyatli yangilandi.');
    }


    public function destroy($id)
    {
        $academia = Contact::findOrFail($id);

        $academia->delete();

        return redirect()->route('contact.index')->with('success', 'Akademiya muvaffaqiyatli o‘chirildi.');
    }
}
