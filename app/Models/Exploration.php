<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exploration extends Model
{
    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'name_kr',

        'purpose_uz',
        'purpose_ru',
        'purpose_en',
        'purpose_kr',

        'tasks_uz',
        'tasks_ru',
        'tasks_en',
        'tasks_kr',

        'expected_results_uz',
        'expected_results_ru',
        'expected_results_en',
        'expected_results_kr',

        'leader_uz',
        'leader_ru',
        'leader_en',
        'leader_kr',
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
