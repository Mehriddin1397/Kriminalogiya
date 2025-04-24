<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'address_uz',
        'address_ru',
        'address_en',
        'address_kr',
        'phone',
        'email',
        'worktime',
        'youtube_link',
        'telegram_link',
        'facebook_link',
        'whatsapp_link',
    ];

    public function __get($key)
    {
        $locale = app()->getLocale(); // Foydalanuvchi tanlagan tilni olamiz
        $localizedField = $key . '_' . $locale; // Masalan, 'name_uz', 'description_ru' kabi

        // Agar shu tilga mos maydon mavjud bo'lsa, shu qiymatni qaytaramiz
        if (array_key_exists($localizedField, $this->attributes)) {
            return $this->attributes[$localizedField];
        }

        // Agar maydon topilmasa yoki boshqa maydonlar bo'lsa, default sifatida asl qiymatini qaytaramiz
        return parent::__get($key);
    }
}
