<?php

// "Memorandumlar" sahifasi — imzolangan hujjatlar ro'yxati (til va matndan mustaqil manba).
// Har bir yozuv 'key' orqali lang/{locale}/memorandums.php dagi 'items' tarjimasiga bog'lanadi.
// 'flag' — resources/views/components/flag-icon.blade.php dagi kod.
// 'doc_type' — lang faylidagi 'doc_types' xaritasiga mos: memorandum | protocol | protocol_program.
// Yangi hujjat qo'shish uchun: shu yerga bitta qator + har bir til faylida tarjima qo'shish kifoya.

return [
    ['key' => 'kicj', 'flag' => 'kr', 'doc_type' => 'memorandum', 'date' => '2024-06-12'],
    ['key' => 'okri', 'flag' => 'hu', 'doc_type' => 'memorandum', 'date' => '2024-09-17'],
    ['key' => 'ugolovnoe_pravo_markazi', 'flag' => 'ru', 'doc_type' => 'memorandum', 'date' => '2025-03-19'],
    ['key' => 'nfsu', 'flag' => 'in', 'doc_type' => 'memorandum', 'date' => '2025-04-15'],
    ['key' => 'belarus_akademiya', 'flag' => 'by', 'doc_type' => 'memorandum', 'date' => '2025-04-17'],
    ['key' => 'xeyfey_institut', 'flag' => 'cn', 'doc_type' => 'memorandum', 'date' => '2025-05-23'],
    ['key' => 'ural_universiteti', 'flag' => 'ru', 'doc_type' => 'protocol_program', 'date' => '2025-11-17'],
    ['key' => 'vniimvd', 'flag' => 'ru', 'doc_type' => 'protocol', 'date' => '2025-11-17'],
    ['key' => 'ludovika', 'flag' => 'hu', 'doc_type' => 'memorandum', 'date' => '2025-11-17'],
    ['key' => 'tojikiston_akademiya', 'flag' => 'tj', 'doc_type' => 'memorandum', 'date' => '2026-05-21'],
    ['key' => 'volgograd_akademiya', 'flag' => 'ru', 'doc_type' => 'protocol', 'date' => '2026-06-11'],
];
