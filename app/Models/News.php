<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //Yangiliklar

    protected $fillable = [
        'title_uz',
        'title_ru',
        'title_en',
        'title_kr',
        'name_uz', 'name_ru', 'name_en','name_kr',
        'youtube_link',
        'telegram_link',
        'facebook_link',
        'whatsapp_link',
        'description_uz',
        'description_ru',
        'description_en',
        'description_kr',
    ];

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'category_relations', 'categorizable_id', 'category_id');
    }

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
