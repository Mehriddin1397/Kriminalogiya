<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteImage extends Model
{
    public const GROUP_HERO_SLIDER = 'hero_slider';
    public const GROUP_INSTITUTE_OLD = 'institute_old';
    public const GROUP_INSTITUTE_CURRENT = 'institute_current';

    public const GROUPS = [
        self::GROUP_HERO_SLIDER,
        self::GROUP_INSTITUTE_OLD,
        self::GROUP_INSTITUTE_CURRENT,
    ];

    protected $fillable = [
        'group',
        'file_path',
        'sort_order',
    ];

    public function scopeGroup($query, string $group)
    {
        return $query->where('group', $group)->orderBy('sort_order')->orderBy('id');
    }
}
