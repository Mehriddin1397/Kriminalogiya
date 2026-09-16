@props(['code'])

{{-- Kichik, sodda (emblemasiz) davlat bayroqchalari — SVG, barcha OS/brauzerda bir xil ko'rinadi.
     Unicode bayroq-emoji Windows'da ko'pincha ko'rinmaydi, shuning uchun shu komponent ishlatiladi. --}}
<span {{ $attributes->merge(['class' => 'lx-flag-icon']) }} title="{{ $code }}">
    @switch($code)
        @case('uz')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#fff"/>
                <rect width="30" height="6" y="0" fill="#0099B5"/>
                <rect width="30" height="1" y="6" fill="#CE1126"/>
                <rect width="30" height="6" y="14" fill="#1EB53A"/>
                <rect width="30" height="1" y="13" fill="#CE1126"/>
            </svg>
            @break
        @case('hu')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#fff"/>
                <rect width="30" height="6.67" y="0" fill="#CE2939"/>
                <rect width="30" height="6.67" y="13.33" fill="#477050"/>
            </svg>
            @break
        @case('in')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#fff"/>
                <rect width="30" height="6.67" y="0" fill="#FF9933"/>
                <rect width="30" height="6.67" y="13.33" fill="#138808"/>
                <circle cx="15" cy="10" r="2.2" fill="none" stroke="#0000BF" stroke-width="0.5"/>
                <circle cx="15" cy="10" r="0.5" fill="#0000BF"/>
            </svg>
            @break
        @case('kr')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#fff"/>
                <path d="M15,4 A6,6 0 0,1 15,16 A3,3 0 0,1 15,10 A3,3 0 0,0 15,4 Z" fill="#CD2E3A"/>
                <path d="M15,16 A6,6 0 0,1 15,4 A3,3 0 0,1 15,10 A3,3 0 0,0 15,16 Z" fill="#0047A0"/>
            </svg>
            @break
        @case('intl')
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="12" r="9"/>
                <ellipse cx="12" cy="12" rx="4" ry="9"/>
                <line x1="3" y1="12" x2="21" y2="12"/>
                <path d="M5 7h14M5 17h14"/>
            </svg>
            @break
        @case('qa')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#8A1538"/>
                <polygon points="0,0 9,0 11.5,2 9,4 11.5,6 9,8 11.5,10 9,12 11.5,14 9,16 11.5,18 9,20 0,20" fill="#fff"/>
            </svg>
            @break
        @case('tr')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#E30A17"/>
                <circle cx="12.5" cy="10" r="5" fill="#fff"/>
                <circle cx="13.8" cy="10" r="4" fill="#E30A17"/>
                <polygon points="18,7.8 18.8,9.6 20.7,9.8 19.2,11 19.7,12.8 18,11.8 16.3,12.8 16.8,11 15.3,9.8 17.2,9.6" fill="#fff"/>
            </svg>
            @break
        @case('de')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#FFCE00"/>
                <rect width="30" height="6.67" y="0" fill="#000"/>
                <rect width="30" height="6.67" y="6.67" fill="#DD0000"/>
            </svg>
            @break
        @case('ru')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#fff"/>
                <rect width="30" height="6.67" y="6.67" fill="#0039A6"/>
                <rect width="30" height="6.67" y="13.33" fill="#D52B1E"/>
            </svg>
            @break
        @case('by')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#D22730"/>
                <rect width="30" height="6.67" y="13.33" fill="#007A3D"/>
            </svg>
            @break
        @case('cn')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#DE2910"/>
                <polygon points="7,4.5 7.9,7.1 10.7,7.1 8.5,8.8 9.3,11.4 7,9.8 4.7,11.4 5.5,8.8 3.3,7.1 6.1,7.1" fill="#FFDE00"/>
                <circle cx="12" cy="3" r="0.7" fill="#FFDE00"/>
                <circle cx="13.5" cy="5.5" r="0.7" fill="#FFDE00"/>
                <circle cx="13.5" cy="8.5" r="0.7" fill="#FFDE00"/>
                <circle cx="12" cy="11" r="0.7" fill="#FFDE00"/>
            </svg>
            @break
        @case('tj')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#fff"/>
                <rect width="30" height="5.7" y="0" fill="#CC0000"/>
                <rect width="30" height="5.7" y="14.3" fill="#006600"/>
                <circle cx="15" cy="10" r="1.6" fill="#F8C300"/>
            </svg>
            @break
        @case('un')
            <svg viewBox="0 0 30 20" width="20" height="14" aria-hidden="true">
                <rect width="30" height="20" fill="#5B92E5"/>
                <circle cx="15" cy="10" r="5" fill="none" stroke="#fff" stroke-width="1"/>
                <circle cx="15" cy="10" r="1.3" fill="#fff"/>
            </svg>
            @break
    @endswitch
</span>
