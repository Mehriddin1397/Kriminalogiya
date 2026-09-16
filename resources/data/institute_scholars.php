<?php

// "Kriminologik olimlar" — olimlar ro'yxati (til va matndan mustaqil manba).
// Har bir yozuv o'zining alohida profil sahifasiga ega: resources/views/pages/{view}.blade.php
// Yangi olim qo'shish uchun: shu yerga bitta yozuv + shu olimning lang faylini va profil sahifasini qo'shish kifoya.

return [
    [
        'slug' => 'sulaymonova',
        'name_key' => 'sulaymonova.hero_name',
        'title_key' => 'sulaymonova.hero_degree',
        'years_key' => 'sulaymonova.hero_years',
        'photo' => 'olim/photo_2026-08-22_12-17-37.jpg',
        'view' => 'scholar_sulaymonova',
    ],
    [
        'slug' => 'usmonaliyev',
        'name_key' => 'usmonaliyev.hero_name',
        'title_key' => 'usmonaliyev.hero_degree',
        'years_key' => 'usmonaliyev.hero_years',
        'photo' => 'img/olim.jpg',
        'view' => 'scholar_usmonaliyev',
    ],
];
