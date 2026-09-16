<?php

// Buyurtma asosidagi loyihalar ro'yxati (til va matndan mustaqil manba).
// Har bir yozuv 'key' orqali lang/{locale}/buyurtma.php dagi 'projects' tarjimasiga,
// 'client' esa o'sha faylning 'clients' xaritasiga bog'lanadi.
// Yangi loyiha qo'shish uchun: shu yerga bitta qator + har bir til faylida tarjima qo'shish kifoya.

return [
    // ── Yakunlangan (11) ─────────────────────────────────
    ['key' => 'tergov_tizimli_muammo',            'icon' => '🔎',   'client' => 'iiv_tergov',           'status' => 'completed'],
    ['key' => 'shafqatsiz_jinoyat_shaxs',          'icon' => '🧠',   'client' => 'iiv',                  'status' => 'completed'],
    ['key' => 'manzil_koloniya_masofaviy_nazorat', 'icon' => '📡',   'client' => 'iiv_jazoni_ijro',      'status' => 'completed'],
    ['key' => 'jizzax_viloyat',                    'icon' => '🗺️',  'client' => 'jizzax_iib',           'status' => 'completed'],
    ['key' => 'namangan_viloyat',                  'icon' => '🗺️',  'client' => 'namangan_iib',         'status' => 'completed'],
    ['key' => 'andijon_viloyat',                   'icon' => '🗺️',  'client' => 'andijon_iib',          'status' => 'completed'],
    ['key' => 'navoiy_viloyat',                    'icon' => '🗺️',  'client' => 'navoiy_iib',           'status' => 'completed'],
    ['key' => 'buxoro_firibgarlik',                'icon' => '🗺️🎭', 'client' => 'buxoro_iib',           'status' => 'completed'],
    ['key' => 'qoraqalpogiston_viloyat',           'icon' => '🗺️',  'client' => 'qoraqalpogiston_iiv',  'status' => 'completed'],
    ['key' => 'ogirlik_jinoyati',                  'icon' => '🔓',   'client' => 'iiv_tergov',           'status' => 'completed'],
    ['key' => 'ogir_tan_jarohat',                  'icon' => '⚖️',  'client' => 'navoiy_iib',           'status' => 'completed'],

    // ── Bajarilayotgan (4) ───────────────────────────────
    ['key' => 'korrupsiya_profilaktika',           'icon' => '🚫💰', 'client' => 'anticor_agentlik',     'status' => 'ongoing'],
    ['key' => 'iiv_korrupsiya_murosasizlik',       'icon' => '👮🚫', 'client' => 'iiv',                  'status' => 'ongoing'],
    ['key' => 'mahalla_jinoyatdan_holi',           'icon' => '🏘️🛡️', 'client' => 'mahalla_uyushmasi',    'status' => 'ongoing'],
    ['key' => 'jinsiy_erkinlik_jiem',              'icon' => '⚖️',  'client' => 'iiv_jazoni_ijro',      'status' => 'ongoing'],
];
