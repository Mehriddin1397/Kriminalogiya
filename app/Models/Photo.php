<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_path',
        'model_type',
        'model_id',
    ];

    public static function factory()
    {
    }

    public function model()
    {
        return $this->morphTo();
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
