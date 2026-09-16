<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memorandum extends Model
{
    protected $table = 'memorandums';

    protected $fillable = [
        'country_uz', 'country_ru', 'country_en', 'country_kr',
        'org_uz', 'org_ru', 'org_en', 'org_kr',
        'flag', 'doc_type', 'date', 'link',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'model');
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
