<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryRelation extends Model
{
    protected $fillable = ['category_id', 'categorizable_id', 'categorizable_type'];

    public function categorizable()
    {
        return $this->morphTo();
    }
}
