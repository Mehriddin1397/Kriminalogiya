<?php

// Davlat granti asosidagi loyihalar ro'yxati (til va matndan mustaqil manba).
// Har bir yozuv 'key' orqali lang/{locale}/davlat_granti.php dagi 'projects' tarjimasiga,
// 'client' (ixtiyoriy) esa o'sha faylning 'clients' xaritasiga bog'lanadi.
// Yangi loyiha qo'shish uchun: shu yerga bitta qator + har bir til faylida tarjima qo'shish kifoya.

return [
    // ── Yakunlangan (1) ──────────────────────────────────
    ['key' => 'elektron_braslet_nazorat', 'icon' => '⌚📡', 'client' => null, 'status' => 'completed'],

    // ── Bajarilayotgan (1) ───────────────────────────────
    ['key' => 'criminology_ai', 'icon' => '🤖🧠', 'client' => 'iiv_jied', 'status' => 'ongoing'],
];
