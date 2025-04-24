<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rahbariyat extends Model
{
    //

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en','name_kr',
        'email',
        'phone',
        'post_uz',//lavozim
        'post_ru',//lavozim
        'post_en',//lavozim
        'post_kr',//lavozim
        'worktime',
    ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'model');
    }

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
