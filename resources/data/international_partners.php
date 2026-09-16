<?php

// "Xalqaro hamkorlar" sahifasi ma'lumotlari (til va matndan mustaqil manba).
// Har bir yozuv 'key' orqali lang/{locale}/international_partners.php dagi tegishli
// bo'limga bog'lanadi. 'flags' — resources/views/components/flag-icon.blade.php dagi kodlar.
// Yangi hamkor qo'shish uchun: shu yerga bitta qator + har bir til faylida tarjima qo'shish kifoya.

return [
    'highlights' => [
        ['key' => 'mdh_kengash', 'flags' => ['intl']],
        ['key' => 'bmt', 'flags' => ['un']],
    ],

    'specialized' => [
        ['key' => 'giyohvandlik', 'flags' => ['hu']],
        ['key' => 'sun_iy_intellekt', 'flags' => ['in']],
        ['key' => 'kadrlar_tayyorlash', 'flags' => ['qa']],
    ],

    'agencies' => [
        ['key' => 'koica', 'flags' => ['kr']],
        ['key' => 'tika', 'flags' => ['tr']],
        ['key' => 'giz', 'flags' => ['de']],
    ],
];
