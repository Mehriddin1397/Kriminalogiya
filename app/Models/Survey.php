<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    // So'rovnomalar

    protected $fillable = [
        'title_uz', 'title_ru', 'title_en', 'title_kr',
        'description_uz', 'description_ru', 'description_en', 'description_kr',
        'image',
        'link',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('created_at');
    }

    public function __get($key)
    {
        $locale = app()->getLocale();
        $localizedField = $key . '_' . $locale;

        if (array_key_exists($localizedField, $this->attributes)) {
            return $this->attributes[$localizedField];
        }

        return parent::__get($key);
    }
}
