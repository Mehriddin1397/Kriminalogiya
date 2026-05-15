@php
    $lxMenu = [
        [
            'title' => __('lan.institut'),
            'children' => [
                ['url' => route('test', ['category_id' => 10, 'id' => 1]), 'title' => __('lan.ins_haq')],
                ['url' => route('test', ['category_id' => 37, 'id' => 3]), 'title' => __('lan.ins_vaz')],
                ['url' => route('boss'), 'title' => __('lan.rahbariyat')],
                ['url' => route('boss'), 'title' => __('lan.off_bulim')],
                ['url' => route('hujjat'),                                  'title' => __('lan.ins_nor')],
                ['url' => route('categoryId', 40)                           ,'title' => __('lan.hamkor')],
            ],
        ],
        [
            'title' => __('lan.tadqiqotlar'),
            'children' => [
                ['url' => route('test', ['category_id' => 10, 'id' => 4]), 'title' => __('lan.ilm_tad_nima')],
                [
                    'title' => __('lan.taq_loy'),
                    'children' => [
                        ['url' => route('categoryId', 41), 'title' => __('lan.tashabbus_asosidagi_loyihalar')],
                        ['url' => route('categoryId', 42), 'title' => __('lan.buyurtma_asosidagi_loyihalar')],
                        ['url' => route('categoryId', 43), 'title' => __('lan.davlat_granti_asosidagi_loyihalar')],
                    ],
                ],
                ['url' => route('categoryId', 44), 'title' => __('lan.dav_hisob')],
                ['url' => route('boss'), 'title' => __('lan.tad_natij')],
            ],
        ],
        [
            'title' => __('lan.ilm_ishlanma'),
            'children' => [
                ['url' => route('journals_index'),                          'title' => __('lan.ilm_jurnal')],
                ['url' => route('categoryId', 18),                          'title' => __('lan.qullanma')],
                ['url' => route('categoryId', 14),                          'title' => __('lan.darsliklar')],
                ['url' => route('categoryId', 14),                          'title' => __('lan.monograf')],
                ['url' => route('categoryId', 14),                          'title' => __('lan.ilm_vak_tad')],
                ['url' => route('categoryId', 14),                          'title' => __('lan.buklet')],
                ['url' => route('categoryId', 14),                          'title' => __('lan.taqdimot')],
            ],
        ],
        [
            'title' => __('lan.ilmiy_kengashlar'),
            'children' => [
                ['url' => route('show', ['category_id' => 2, 'id' => 1]), 'title' => __('lan.institut_huzuridagi_kengashlar')],
                [
                    'title' => __('lan.kriminologiya_kengashi'),
                    'children' => [
                        ['url' => route('categoryId', 41), 'title' => __('lan.kengash_maqsadi_va_vazifalari')],
                        ['url' => route('categoryId', 42), 'title' => __('lan.kengash_azolari')],
                    ],
                ],
                [
                    'title' => __('lan.xalqaro_ekspertlar_kengashi'),
                    'children' => [
                        ['url' => route('categoryId', 41), 'title' => __('lan.kengash_maqsadi_va_vazifalari')],
                        ['url' => route('categoryId', 42), 'title' => __('lan.kengash_azolari')],
                    ],
                ],
                [
                    'title' => __('lan.ilmiy_darajalar_beruvchi_kengashlar'),
                    'children' => [
                        ['url' => route('categoryId', 41), 'title' => __('lan.kriminologiya_ixtisosligi_12_00_15')],
                        ['url' => route('categoryId', 42), 'title' => __('lan.jinoyat_huquqi_12_00_08')],
                        ['url' => route('categoryId', 42), 'title' => __('lan.huquqbuzarliklar_profilaktikasi_12_00_14')],
                        ['url' => route('categoryId', 42), 'title' => __('lan.kiberxavfsizlik_05_01_12')],
                        ['url' => route('categoryId', 42), 'title' => __('lan.dissertatsiya_mavzulari')],
                    ],
                ],

            ],
        ],
        [
            'title' => __('lan.xalqaro_hamkorlar'),
            'children' => [
                ['url' => route('categoryId', 34),                          'title' => __('lan.xalqaro_hamkorlik_haqida')],
                ['url' => route('show', ['category_id' => 30, 'id' => 3]), 'title' => __('lan.xalqaro_hamkorlar')],
                ['url' => route('categoryId', 31),                          'title' => __('lan.memorandumlar')],
                ['url' => route('show', ['category_id' => 35, 'id' => 1]), 'title' => __('lan.xalqaro_tadbirlar')],
                ['url' => route('show', ['category_id' => 35, 'id' => 1]), 'title' => __('lan.xorijiy_tajribalar')],
                ['url' => route('show', ['category_id' => 35, 'id' => 1]), 'title' => __('lan.hamkorlik_uchun_murojaat')],
            ],
        ],
        [
            'title' => __('lan.yangilik'),
            'children' => [
                ['url' => route('categoryId', 22), 'title' => __('lan.yangilik')],
                ['url' => route('categoryId', 8),  'title' => __('lan.ommabop_maqolalar')],
                ['url' => route('gallery'), 'title' => __('lan.fotogaleriya')],
                ['url' => route('categoryId', 24), 'title' => __('lan.videotasvirlar')],
                ['url' => route('categoryId', 32), 'title' => __('lan.ochiq_malumotlar')],
            ],
        ],
        [
            'title' => __('lan.boglanish'),
            'children' => [
                ['url' => route('contact'),         'title' => __('lan.boglanish')],
            ],
        ],
    ];

    $lxLangs = [
        'uz' => "O'z",
        'kr' => 'Ўз',
        'ru' => 'Ру',
        'en' => 'En',
    ];
    $lxCurrentLang = App::getLocale();
@endphp

{{-- ─────── Topbar ─────── --}}
<div class="lx-topbar">
    <div class="container">
        <div class="lx-topbar-inner">
            <div class="lx-topbar-left">
                @isset($contact)
                    @if(!empty($contact->address))
                        <span class="lx-topbar-item">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            {{ $contact->address }}
                        </span>
                        <span class="lx-topbar-divider"></span>
                    @endif
                @endisset
                <span class="lx-topbar-item">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                    {{ __('lan.ish_vaqt') }}
                </span>
            </div>

            <div class="lx-topbar-right">
                @isset($contact)
                    @if(!empty($contact->phone))
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contact->phone) }}" class="lx-topbar-item">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.94.36 1.86.7 2.74a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.34-1.34a2 2 0 0 1 2.11-.45c.88.34 1.8.57 2.74.7a2 2 0 0 1 1.72 2z"/>
                            </svg>
                            {{ $contact->phone }}
                        </a>
                        <span class="lx-topbar-divider"></span>
                    @endif
                    @if(!empty($contact->email))
                        <a href="mailto:{{ $contact->email }}" class="lx-topbar-item">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <rect x="2" y="4" width="20" height="16" rx="2"/>
                                <path d="m22 6-10 7L2 6"/>
                            </svg>
                            {{ $contact->email }}
                        </a>
                    @endif
                @endisset
            </div>
        </div>
    </div>
</div>

{{-- ─────── Main navbar ─────── --}}
<header class="lx-nav" id="lxNav">
    <div class="container">
        <div class="lx-nav-inner">

            <a class="lx-nav-brand" href="{{ route('main') }}">
                <img src="{{ asset('assets/img/kti-logo.png') }}" alt="KTI">
                <span class="lx-nav-brand-text">
                    <span class="lx-nav-brand-small">{{__('lan.kriminologiya')}}</span>
                    <span class="lx-nav-brand-big">{{ __('lan.kriminalog') }}</span>
                </span>
            </a>

            <ul class="lx-nav-menu">
                @foreach($lxMenu as $item)
                    <li class="lx-nav-item">
                        @if(!empty($item['children']))
                            <button type="button" class="lx-nav-link">
                                {{ $item['title'] }}
                                <svg class="caret" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m6 9 6 6 6-6"/>
                                </svg>
                            </button>
                            <ul class="lx-dropdown">
                                @foreach($item['children'] as $child)
                                    @if(!empty($child['children']))
                                        <li class="lx-dropdown-item has-sub">
                                            <span class="lx-dropdown-trigger">
                                                {{ $child['title'] }}
                                                <svg class="caret" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="m9 6 6 6-6 6"/>
                                                </svg>
                                            </span>
                                            <ul class="lx-dropdown-sub">
                                                @foreach($child['children'] as $grand)
                                                    <li><a href="{{ $grand['url'] }}">{{ $grand['title'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="{{ $child['url'] }}">{{ $child['title'] }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <a href="{{ $item['url'] }}" class="lx-nav-link">{{ $item['title'] }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>

            <div class="lx-nav-actions">
                <button type="button" class="lx-nav-icon-btn" data-lx="open-search" aria-label="{{ __('lan.qidirish') }}">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                </button>

                <div class="lx-nav-lang">
                    @foreach($lxLangs as $code => $label)
                        <a href="{{ route('setLocale', $code) }}"
                           class="{{ $lxCurrentLang === $code ? 'is-active' : '' }}">{{ $label }}</a>
                    @endforeach
                </div>

                <button type="button" class="lx-nav-hamburger" data-lx="open-drawer" aria-label="Menu" aria-controls="lxDrawer">
                    <span></span><span></span><span></span>
                </button>
            </div>

        </div>
    </div>
</header>

{{-- ─────── Search overlay ─────── --}}
<div class="lx-nav-search-overlay" id="lxSearchOverlay" role="dialog" aria-modal="true" aria-hidden="true">
    <button type="button" class="lx-nav-search-close" data-lx="close-search" aria-label="Yopish">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
            <path d="M18 6 6 18M6 6l12 12"/>
        </svg>
    </button>
    <form action="{{ route('search') }}" method="get">
        <input type="text" name="query" placeholder="{{ __('lan.qidirish') }}..." required autocomplete="off">
        <button type="submit" class="submit" aria-label="{{ __('lan.qidirish') }}">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.3-4.3"/>
            </svg>
        </button>
    </form>
</div>

{{-- ─────── Mobile drawer ─────── --}}
<div class="lx-drawer-backdrop" data-lx="close-drawer" aria-hidden="true"></div>

<aside class="lx-drawer" id="lxDrawer" aria-hidden="true">
    <div class="lx-drawer-head">
        <a href="{{ route('main') }}" class="lx-drawer-brand">
            <img src="{{ asset('assets/img/kti-logo.png') }}" alt="">
            <span>KTI</span>
        </a>
        <button type="button" class="lx-drawer-close" data-lx="close-drawer" aria-label="Yopish">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                <path d="M18 6 6 18M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <div class="lx-drawer-body">
        <div class="lx-drawer-search">
            <form action="{{ route('search') }}" method="get">
                <input type="text" name="query" placeholder="{{ __('lan.qidirish') }}..." required>
                <button type="submit" aria-label="{{ __('lan.qidirish') }}">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                </button>
            </form>
        </div>

        <ul class="lx-drawer-menu">
            @foreach($lxMenu as $item)
                <li>
                    @if(!empty($item['children']))
                        <button type="button" class="lx-drawer-toggle">
                            {{ $item['title'] }}
                            <svg class="caret" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </button>
                        <ul class="lx-drawer-submenu">
                            @foreach($item['children'] as $child)
                                @if(!empty($child['children']))
                                    <li class="has-sub">
                                        <button type="button" class="lx-drawer-toggle lx-drawer-toggle-sub">
                                            {{ $child['title'] }}
                                            <svg class="caret" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="m6 9 6 6 6-6"/>
                                            </svg>
                                        </button>
                                        <ul class="lx-drawer-subsubmenu">
                                            @foreach($child['children'] as $grand)
                                                <li><a href="{{ $grand['url'] }}">{{ $grand['title'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ $child['url'] }}">{{ $child['title'] }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <div class="lx-drawer-foot">
        <div class="lx-drawer-lang">
            @foreach($lxLangs as $code => $label)
                <a href="{{ route('setLocale', $code) }}"
                   class="{{ $lxCurrentLang === $code ? 'is-active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>

        @isset($contact)
            <div class="lx-drawer-contact">
                @if(!empty($contact->phone))
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contact->phone) }}">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.94.36 1.86.7 2.74a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.34-1.34a2 2 0 0 1 2.11-.45c.88.34 1.8.57 2.74.7a2 2 0 0 1 1.72 2z"/>
                        </svg>
                        {{ $contact->phone }}
                    </a>
                @endif
                @if(!empty($contact->email))
                    <a href="mailto:{{ $contact->email }}">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="m22 6-10 7L2 6"/>
                        </svg>
                        {{ $contact->email }}
                    </a>
                @endif
            </div>
        @endisset
    </div>
</aside>

{{-- ─────── JS ─────── --}}
<script>
(function () {
    var nav        = document.getElementById('lxNav');
    var drawer     = document.getElementById('lxDrawer');
    var backdrop   = document.querySelector('.lx-drawer-backdrop');
    var hamburger  = document.querySelector('.lx-nav-hamburger');
    var searchOver = document.getElementById('lxSearchOverlay');
    var body       = document.body;

    // ─ Sticky shadow on scroll ─
    var lastScroll = -1;
    var scrollHandler = function () {
        var sy = window.scrollY || window.pageYOffset;
        if (Math.abs(sy - lastScroll) < 4) return;
        lastScroll = sy;
        if (nav) nav.classList.toggle('is-scrolled', sy > 30);
    };
    window.addEventListener('scroll', scrollHandler, { passive: true });
    scrollHandler();

    // ─ Drawer open/close ─
    var openDrawer = function () {
        if (!drawer) return;
        drawer.classList.add('is-open');
        if (backdrop) backdrop.classList.add('is-open');
        if (hamburger) hamburger.classList.add('is-open');
        body.classList.add('lx-no-scroll');
        drawer.setAttribute('aria-hidden', 'false');
    };
    var closeDrawer = function () {
        if (!drawer) return;
        drawer.classList.remove('is-open');
        if (backdrop) backdrop.classList.remove('is-open');
        if (hamburger) hamburger.classList.remove('is-open');
        body.classList.remove('lx-no-scroll');
        drawer.setAttribute('aria-hidden', 'true');
    };

    // ─ Search overlay ─
    var openSearch = function () {
        if (!searchOver) return;
        searchOver.classList.add('is-open');
        body.classList.add('lx-no-scroll');
        searchOver.setAttribute('aria-hidden', 'false');
        var inp = searchOver.querySelector('input[type="text"]');
        if (inp) setTimeout(function () { inp.focus(); }, 280);
    };
    var closeSearch = function () {
        if (!searchOver) return;
        searchOver.classList.remove('is-open');
        body.classList.remove('lx-no-scroll');
        searchOver.setAttribute('aria-hidden', 'true');
    };

    // ─ Click delegation ─
    document.addEventListener('click', function (e) {
        var trigger = e.target.closest('[data-lx]');
        if (trigger) {
            var action = trigger.getAttribute('data-lx');
            if (action === 'open-drawer')  { openDrawer();  return; }
            if (action === 'close-drawer') { closeDrawer(); return; }
            if (action === 'open-search')  { openSearch();  return; }
            if (action === 'close-search') { closeSearch(); return; }
        }

        // Drawer accordion
        var toggle = e.target.closest('.lx-drawer-toggle');
        if (toggle) {
            var li = toggle.closest('li');
            if (li) li.classList.toggle('is-open');
            return;
        }

        // Drawerdagi link bosilganda yopish
        if (drawer && drawer.classList.contains('is-open')) {
            var lnk = e.target.closest('.lx-drawer-subsubmenu a, .lx-drawer-submenu > li > a, .lx-drawer-menu > li > a, .lx-drawer-brand');
            if (lnk) closeDrawer();
        }
    });

    // ─ ESC: close any open overlay ─
    document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') return;
        if (drawer && drawer.classList.contains('is-open')) closeDrawer();
        if (searchOver && searchOver.classList.contains('is-open')) closeSearch();
    });

    // ─ Desktop dropdown click-toggle (touch devices, where :hover doesn't work) ─
    document.querySelectorAll('.lx-nav-menu .lx-nav-link').forEach(function (link) {
        if (link.tagName !== 'BUTTON') return;
        link.addEventListener('click', function (e) {
            var item = link.parentElement;
            var wasOpen = item.classList.contains('is-open');
            // Boshqa ochiqlarini yopamiz
            document.querySelectorAll('.lx-nav-item.is-open').forEach(function (li) {
                li.classList.remove('is-open');
            });
            if (!wasOpen) item.classList.add('is-open');
            e.stopPropagation();
        });
    });

    // Tashqaridan bosilganda dropdown'ni yopamiz
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.lx-nav-menu')) {
            document.querySelectorAll('.lx-nav-item.is-open').forEach(function (li) {
                li.classList.remove('is-open');
            });
        }
    });
})();
</script>
