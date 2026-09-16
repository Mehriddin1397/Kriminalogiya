<?php

// "Hamkorlik uchun murojaat" — aloqa vositalari ro'yxati (til va matndan mustaqil manba).
// 'value'/'href' raqam va email uchun tildan mustaqil; 'address' qiymati esa
// lang/{locale}/cooperation_contact.php dagi 'address_value'dan olinadi (controller'da).
// Yangi aloqa vositasi qo'shish uchun: shu yerga bitta qator + har bir til faylida label qo'shish kifoya.

return [
    [
        'key' => 'phone',
        'icon' => 'phone',
        'value' => '+998 71 231-33-95',
        'href' => 'tel:+998712313395',
    ],
    [
        'key' => 'mobile',
        'icon' => 'mobile',
        'value' => '+998 93 507-34-56',
        'href' => 'tel:+998935073456',
    ],
    [
        'key' => 'whatsapp',
        'icon' => 'whatsapp',
        'value' => '+998 93 507-34-56',
        'href' => 'https://wa.me/998935073456',
    ],
    [
        'key' => 'email',
        'icon' => 'email',
        'value' => 'kti@iiv.uz',
        'href' => 'mailto:kti@iiv.uz',
    ],
];
