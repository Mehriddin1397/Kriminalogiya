<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternationalMeeting extends Model
{
    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'name_kr',
        'description_uz', 'description_ru', 'description_en', 'description_kr',
        'event_date',
    ];

    protected $casts = [
        'event_date' => 'date',
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
