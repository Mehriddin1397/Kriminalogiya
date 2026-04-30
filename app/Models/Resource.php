<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'name_kr',
        'link',
        'file',
    ];
}
