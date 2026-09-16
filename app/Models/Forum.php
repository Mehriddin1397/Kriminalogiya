<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = [
        'label_uz', 'label_ru', 'label_en', 'label_kr',
        'theme_uz', 'theme_ru', 'theme_en', 'theme_kr',
        'description_uz', 'description_ru', 'description_en', 'description_kr',
        'stats_uz', 'stats_ru', 'stats_en', 'stats_kr',
        'event_start_date', 'event_end_date',
    ];

    protected $casts = [
        'event_start_date' => 'date',
        'event_end_date' => 'date',
    ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'model');
    }

    public function datesLabel(): string
    {
        if (!$this->event_start_date) {
            return '';
        }

        if ($this->event_end_date && !$this->event_end_date->isSameDay($this->event_start_date)) {
            return $this->event_start_date->format('d.m.Y') . ' – ' . $this->event_end_date->format('d.m.Y');
        }

        return $this->event_start_date->format('d.m.Y');
    }

    public function statsList(): array
    {
        $raw = $this->stats;

        if (empty($raw)) {
            return [];
        }

        $stats = [];

        foreach (preg_split('/\r\n|\r|\n/', $raw) as $line) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }

            $parts = explode('|', $line, 2);
            $stats[] = [
                'num' => trim($parts[0]),
                'label' => trim($parts[1] ?? ''),
            ];
        }

        return $stats;
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
