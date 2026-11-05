# Kriminologiya Portali va Elektron Kutubxona uchun Dizayn & Integratsiya Qo'llanmasi

Ushbu qo'llanma **Elektron kutubxona** (`kutubxona.uzkti.uz` / `192.168.40.109`) loyihasini institutning **Asosiy portali** bilan bir xil ko'rinish, yagona shrift (`Inter`), ranglar uyg'unligi va **Test rejimi** bildirishnomasi bilan ta'minlash uchun ishlab chiqildi.

---

## 1. Shrift Standarti (Typography — Inter)

Asosiy portalda tartibsiz bo'lgan barcha shriftlar (Open Sans, Roboto, Cormorant Garamond, Georgia) tozalab tashlanib, xalqaro davlat va ilmiy muassasalar uchun eng maqbul bo'lgan **Inter** shriftiga to'liq o'tkazildi.

### Nega aynan Inter?
- **O'zbek kirill va lotin yozuvlarini 100% qo'llab-quvvatlaydi:** `ў`, `қ`, `ғ`, `ҳ` harflari va ruscha harflar buzilmasdan, bir xil kenglik va balandlikda chiqadi.
- **Yuqori o'qiluvchanlik:** Kitob, monografiya, ilmiy maqolalar va kataloglarni o'qishda ko'zni toliqtirmaydi.
- **Tez yuklanish:** Faqat bitta shrift oilasi yuklangani sababli sahifa yuklanishi 2-3 barobarga tezlashadi.

### A) HTML / Blade `<head>` ga ulash
Elektron kutubxona tartibidagi layout faylining (`resources/views/layouts/app.blade.php` yoki tegishli blade fayli) `<head>` qismiga quyidagini joylang (eski Cormorant Garamond / Cinzel o'rniga):

```html
<!-- Google Fonts: Yagona standart shrift (Inter) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
```

### B) Tailwind CSS loyihasida sozlash (`tailwind.config.js`)
Kutubxona Tailwind CSS asosida yaratilgan. Shriftni birlashtirish uchun:

```javascript
// tailwind.config.js
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                kti: {
                    navy: '#0a0e1a',
                    navySoft: '#17263c',
                    gold: '#c9a961',
                    goldDark: '#a8853b',
                    cream: '#fbf9f5',
                }
            }
        },
    },
};
```

### C) Global CSS qoidalari (`resources/css/app.css` yoki `public/css/style.css`)
```css
html, body {
    font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    letter-spacing: -0.015em;
    font-weight: 600;
}
```

---

## 2. "Test Rejimi" Bildirishnomasi (Top Notice Bar)

Elektron kutubxonaning eng yuqori qismiga (Navbar tepasiga) asosiy sayt bilan 100% bir xil uslubdagi xabarni joylashtirish kodi.

### A) Blade / HTML Markup
Uni `<body>` ning eng birinchi elementi qilib joylashtiring:

```blade
{{-- ─────── Test Rejimi Bildirishnomasi ─────── --}}
<div class="lx-test-notice-bar" id="lxTestNoticeBar">
    <div class="lx-test-container">
        <div class="lx-test-notice-inner">
            <div class="lx-test-notice-content">
                <span class="lx-test-badge">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <span>{{ __('lan.test_rejim_badge', [], app()->getLocale() ?? 'uz') ?? 'Test rejimi' }}</span>
                </span>
                <span class="lx-test-text">
                    {{ __('lan.test_rejim_xabari', [], app()->getLocale() ?? 'uz') ?? 'Elektron kutubxona test rejimida ishlamoqda. Ayrim kitoblar va resurslar to‘ldirilish jarayonida.' }}
                </span>
            </div>
            <button type="button" class="lx-test-close-btn" onclick="document.getElementById('lxTestNoticeBar').style.display='none'; try{sessionStorage.setItem('lx_test_dismissed','1');}catch(e){}" aria-label="Yopish" title="Yopish">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    try {
        if (sessionStorage.getItem('lx_test_dismissed') === '1') {
            var el = document.getElementById('lxTestNoticeBar');
            if (el) el.style.display = 'none';
        }
    } catch(e) {}
</script>
```

### B) CSS Uslubi (Asosiy sayt bilan bir xil)
```css
.lx-test-notice-bar {
    background: linear-gradient(90deg, #0b1728 0%, #17263c 50%, #0b1728 100%);
    border-bottom: 1px solid rgba(201, 169, 97, 0.4);
    color: #e2e8f0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    position: relative;
    z-index: 1001;
    width: 100%;
}
.lx-test-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 16px;
}
.lx-test-notice-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 6px 0;
}
.lx-test-notice-content {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
    justify-content: center;
    text-align: center;
}
.lx-test-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: linear-gradient(135deg, #c9a961 0%, #a8853b 100%);
    color: #0b1526;
    font-size: 10.5px;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    padding: 2.5px 8.5px;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(201, 169, 97, 0.25);
    white-space: nowrap;
    flex-shrink: 0;
}
.lx-test-badge svg {
    display: block;
}
.lx-test-text {
    color: #f1f5f9;
    font-size: 12.5px;
    font-weight: 500;
    letter-spacing: 0.01em;
}
.lx-test-close-btn {
    background: transparent;
    border: none;
    color: rgba(241, 245, 249, 0.65);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 4px;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s ease;
    flex-shrink: 0;
}
.lx-test-close-btn:hover {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.12);
}
@media (max-width: 768px) {
    .lx-test-notice-inner {
        padding: 5px 0;
    }
    .lx-test-notice-content {
        gap: 6px;
        flex-wrap: wrap;
        justify-content: flex-start;
        text-align: left;
    }
    .lx-test-text {
        font-size: 11px;
        line-height: 1.35;
    }
    .lx-test-badge {
        font-size: 9.5px;
        padding: 1.5px 6.5px;
    }
}
```

---

## 3. Ko'p Tillilik uchun Tarjimalar (`lang/`)

Elektron kutubxonada tillar bo'yicha mos so'zlar:

| Til | Fayl | Badge (`test_rejim_badge`) | Xabar matni (`test_rejim_xabari`) |
| :--- | :--- | :--- | :--- |
| **O'zbek (Lotin)** | `lang/uz/lan.php` | `Test rejimi` | *Elektron kutubxona test rejimida ishlamoqda. Ayrim kitoblar va resurslar to‘ldirilish jarayonida.* |
| **Ruscha** | `lang/ru/lan.php` | `Тестовый режим` | *Электронная библиотека работает в тестовом режиме. Некоторые ресурсы и данные находятся в процессе обновления.* |
| **Inglizcha** | `lang/en/lan.php` | `Test Mode` | *The digital library is operating in test mode. Some resources and information are currently being updated.* |
| **O'zbek (Kirill)** | `lang/kr/lan.php` | `Тест режими` | *Электрон кутубхона тест режимида ишламоқда. Айрим китобlar ва ресурслар тўлдирилиш жараёнида.* |

---

## 4. Asosiy Saytga Qaytish Havolasi (Portal Switcher)

Elektron kutubxona foydalanuvchilari institutning asosiy portaliga bemalol o'ta olishi uchun Kutubxona Navbar'ining yuqori yoki o'ng tomoniga qo'shilishi kerak bo'lgan tugma:

```html
<a href="https://kriminalogiya.uz" target="_blank" rel="noopener" class="kti-back-portal-btn">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M19 12H5M12 19l-7-7 7-7"/>
    </svg>
    <span>Asosiy portalga qaytish</span>
</a>

<style>
.kti-back-portal-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(201, 169, 97, 0.4);
    border-radius: 20px;
    color: #e2e8f0;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}
.kti-back-portal-btn:hover {
    background: #c9a961;
    color: #0a0e1a;
    border-color: #c9a961;
}
</style>
```

---

## 5. Ranglar Palitrasi (Brand Color Guide)

Elektron kutubxonada asosiy sayt bilan bir xil brend ranglari ishlatilishi shart:

```
Asosiy To'q Rang (Navy):   #0a0e1a  (Header, footer va asosiy fonlar uchun)
Yumshoq To'q Rang:         #17263c  (Gradientlar va panellar uchun)
Kriminologik Oltin/Bronza: #c9a961  (Tugmalar, badge'lar va ta'kidlar uchun)
Oltin to'qroq soya:        #a8853b  (Hover va soyalar uchun)
Qog'oz / Krem foni:        #fbf9f5  (Sahifa o'qish foni, ko'zni toliqtirmaydi)
Matn rangi:                #1a1f2e  (Kontrastli va aniq qora-ko'kimtir matn)
```

---

## 6. Kutubxona Loyihasida O'zgarishlarni Qo'llash Ketma-ketligi

1. Kutubxona kodidagi `<head>` tegiga yangi `Inter` Google Fonts ulanmasini qo'ying.
2. `tailwind.config.js` fayliga `fontFamily: { sans: ['Inter', ...defaultTheme.fontFamily.sans] }` ni qo'shing.
3. Navbar tepasiga `lx-test-notice-bar` blokini va CSS qoidalarini joylashtiring.
4. Terminalda frontendni build qiling:
   ```bash
   npm run build
   ```
5. Laravel keshini tozalang:
   ```bash
   php artisan optimize:clear && php artisan optimize
   ```
