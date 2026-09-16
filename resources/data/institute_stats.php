<?php

// Institut faoliyati raqamlarda — Bento Grid ma'lumotlari (til va matndan mustaqil manba).
// Har bir yozuv 'key' orqali lang/{locale}/institute_stats.php dagi 'stats' tarjimasiga bog'lanadi.
// 'size': 'xl' (katta, 2x2, radial/gradient), 'wide' (butun qator, 1x4), 'sm' (ixcham, 1x1).
// Yangi statistika qo'shish uchun: shu yerga bitta qator + har bir til faylida tarjima qo'shish kifoya.

return [
    [
        'key' => 'takliflar',
        'icon' => 'lightbulb',
        'size' => 'xl',
        'value' => 200,
        'suffix' => '+',
        'decimals' => 0,
    ],
    [
        'key' => 'amaliy_tarkib',
        'icon' => 'target',
        'size' => 'xl',
        'value' => 93,
        'suffix' => '%',
        'decimals' => 0,
        'ring' => true,
    ],
    [
        'key' => 'loyihalar',
        'icon' => 'folder',
        'size' => 'sm',
        'value' => 21,
        'suffix' => '',
        'decimals' => 0,
    ],
    [
        'key' => 'hisobotlar',
        'icon' => 'document',
        'size' => 'sm',
        'value' => 7,
        'suffix' => '',
        'decimals' => 0,
    ],
    [
        'key' => 'ilmiy_daraja',
        'icon' => 'graduation',
        'size' => 'sm',
        'value' => 35.8,
        'suffix' => '%',
        'decimals' => 1,
    ],
    [
        'key' => 'innovatsion',
        'icon' => 'flask',
        'size' => 'sm',
        'value' => 9,
        'suffix' => '',
        'decimals' => 0,
    ],
    [
        'key' => 'hamkorlar',
        'icon' => 'handshake',
        'size' => 'wide',
        'value' => 33,
        'suffix' => '',
        'decimals' => 0,
        'breakdown' => [
            ['value' => 21, 'label_key' => 'hamkorlar_milliy'],
            ['value' => 12, 'label_key' => 'hamkorlar_xorijiy'],
        ],
    ],
];
