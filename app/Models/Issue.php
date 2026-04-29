<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'journal_id',
        'title_uz', 'title_ru', 'title_en', 'title_kr',
        'number',
        'year',
        'published_at',
        'file_path'
    ];

    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }

    public function papers()
    {
        return $this->hasMany(Paper::class);
    }
}

//journal_id → qaysi jurnalga tegishli
//title → ko‘rinadigan nom
//number → 1,2,3...
//year → yil
//file_path → cover rasm (ixtiyoriy)
