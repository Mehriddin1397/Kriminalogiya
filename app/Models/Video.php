<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'name_kr',
        'youtube_url',
    ];

    public function getYoutubeIdAttribute(): ?string
    {
        $url = $this->youtube_url;
        if (empty($url)) {
            return null;
        }

        $parts = parse_url($url);

        if (!empty($parts['query'])) {
            parse_str($parts['query'], $query);
            if (!empty($query['v'])) {
                return $query['v'];
            }
        }

        if (!empty($parts['host']) && str_contains($parts['host'], 'youtu.be')) {
            return ltrim($parts['path'] ?? '', '/');
        }

        if (!empty($parts['path']) && str_contains($parts['path'], '/embed/')) {
            return trim(substr($parts['path'], strpos($parts['path'], '/embed/') + 7), '/');
        }

        return null;
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        $id = $this->youtube_id;

        return $id ? "https://img.youtube.com/vi/{$id}/hqdefault.jpg" : null;
    }

    public function getEmbedUrlAttribute(): ?string
    {
        $id = $this->youtube_id;

        return $id ? "https://www.youtube.com/embed/{$id}" : null;
    }

    public function __get($key)
    {
        $locale = app()->getLocale();
        $localizedField = $key . '_' . $locale;

        if (array_key_exists($localizedField, $this->attributes)) {
            return $this->attributes[$localizedField] ?: ($this->attributes['name_uz'] ?? null);
        }

        return parent::__get($key);
    }
}
