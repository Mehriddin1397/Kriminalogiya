<?php

// "Institut tuzilmasi" — tashkiliy tuzilma sxemasi (til va matndan mustaqil manba).
// Har bir yozuv 'key' orqali lang/{locale}/institute_structure.php dagi tarjimaga bog'lanadi.
// Manba: public/ofislar.pptx

return [
    'branches' => [
        [
            'key' => 'trends',
            'icon' => 'trend',
            'units' => ['cis_asia', 'economy', 'it_crime', 'public_order', 'person'],
        ],
        [
            'key' => 'factors',
            'icon' => 'globe',
            'units' => ['europe', 'social_tension', 'sectoral', 'special_persons', 'info_analysis', 'ratings', 'legislation', 'sociological'],
        ],
        [
            'key' => 'mahalla',
            'icon' => 'map',
            'units' => ['admin_territories', 'editorial', 'laboratory', 'info_resource', 'chancery'],
        ],
        [
            'key' => 'secretary',
            'icon' => 'badge',
            'units' => [],
        ],
        [
            'key' => 'management',
            'icon' => 'institution',
            'units' => ['organizational', 'legal', 'international', 'finance', 'personnel', 'digital'],
        ],
    ],
];
