<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = [
        'issue_id',
        'title_uz', 'title_ru', 'title_en', 'title_kr',
        'author',
        'description_uz', 'description_ru', 'description_en', 'description_kr',
        'pdf_file',

    ];

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    // 🔥 til uchun (siznikiga o‘xshash)
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

//issue_id → qaysi son ichida
//title_* → maqola nomi
//author → muallif (oddiy string)
//description_* → qisqacha mazmun
//pdf_file → storage ichidagi yo‘l
//views → avtomatik oshadi (user yozmaydi)
