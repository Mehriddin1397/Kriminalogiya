<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'name_kr',
        'slug_uz',
        'slug_ru',
        'slug_en',
        'slug_kr',
        'object_type'
    ];

    public static function forObjectType($type)
    {
        return self::where('object_type', $type)->get();
    }

    public function academias()
    {
        return $this->morphedByMany(Academia::class, 'categorizable', 'category_relations', 'category_id', 'categorizable_id');

    }

    public function journals()
    {
        return $this->morphedByMany(Journal::class, 'categoryable');
    }

    public function bibliophilias()
    {
        return $this->morphedByMany(Bibliophilia::class, 'categoryable');
    }

    public function crimes()
    {
        return $this->morphedByMany(Crimes::class, 'categoryable');
    }

    public function instituts()
    {
        return $this->morphedByMany(Institut::class, 'categoryable');
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'categoryable');
    }

    public function research()
    {
        return $this->morphedByMany(Research::class, 'categoryable');
    }

    public function scholars()
    {
        return $this->morphedByMany(Scholars::class, 'categoryable');
    }

    public function expertice()
    {
        return $this->morphedByMany(Expertise::class, 'categoryable');
    }

    public function partner()
    {
        return $this->morphedByMany(Partner::class, 'categoryable');
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
