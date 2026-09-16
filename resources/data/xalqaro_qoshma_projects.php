<?php

// Xalqaro qo'shma loyihalar ro'yxati (til va matndan mustaqil manba).
// Har bir yozuv 'key' orqali lang/{locale}/xalqaro_qoshma.php dagi 'projects' tarjimasiga,
// 'partner' esa o'sha faylning 'partners' xaritasiga (nomi + bayroq) bog'lanadi.
// Yangi loyiha qo'shish uchun: shu yerga bitta qator + har bir til faylida tarjima qo'shish kifoya.

return [
    // ── Yakunlangan (1) ──────────────────────────────────
    ['key' => 'narko_transmilliy', 'icon' => '💊🌍', 'partner' => 'uz_hu_completed', 'status' => 'completed'],

    // ── Bajarilayotgan (8) ───────────────────────────────
    ['key' => 'narko_uz_hu',                'icon' => '💊',   'partner' => 'uz_hu_joint',   'status' => 'ongoing'],
    ['key' => 'jinoyatchilik_uz_hu',        'icon' => '📊',   'partner' => 'hu_institute',  'status' => 'ongoing'],
    ['key' => 'jinoyatchilik_uz_in',        'icon' => '📊',   'partner' => 'in_institute',  'status' => 'ongoing'],
    ['key' => 'giyohvand_salohiyat_kr',     'icon' => '🎓',   'partner' => 'kr_koica',      'status' => 'ongoing'],
    ['key' => 'dipfeyk_huquqbuzarlik',      'icon' => '🎭🤖', 'partner' => 'cis_council',   'status' => 'ongoing'],
    ['key' => 'ijtimoiy_profilaktika_mks',  'icon' => '🛡️',  'partner' => 'cis_council',   'status' => 'ongoing'],
    ['key' => 'profiling_rf_uz',            'icon' => '🕵️',  'partner' => 'cis_council',   'status' => 'ongoing'],
    ['key' => 'mehnat_migratsiya_uz_rf',    'icon' => '🧳',   'partner' => 'cis_council',   'status' => 'ongoing'],
];
