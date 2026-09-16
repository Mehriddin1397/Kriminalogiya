<x-main title="{{ __('lan.tad_natij') }} — {{ __('lan.kriminalog') }}">
<div class="home-luxury">

    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
            'assets/img/bg1.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));

        // Blok 1: Tadqiqot loyihalari turlari
        $loyihaTurlari = [
            ['icon' => 'bulb',      'value' => 33, 'label' => __('lan.tashabbus_asosidagi_loyihalar')],
            ['icon' => 'clipboard', 'value' => 15, 'label' => __('lan.buyurtma_asosidagi_loyihalar')],
            ['icon' => 'shield',    'value' => 16, 'label' => __('lan.davlat_granti_asosidagi_loyihalar')],
            ['icon' => 'globe',     'value' => 9,  'label' => __('lan.rn_xalqaro_qoshma_loyiha')],
        ];

        // Blok 4: Ilmiy va amaliy mahsulotlar
        $mahsulotlar = [
            ['icon' => 'report',  'value' => 21, 'approx' => false, 'label' => __('lan.rn_hisobot_label')],
            ['icon' => 'book',    'value' => 10, 'approx' => true,  'label' => __('lan.rn_metodika_label')],
            ['icon' => 'chart',   'value' => 50, 'approx' => true,  'label' => __('lan.rn_tahliliy_label')],
            ['icon' => 'monitor', 'value' => 1,  'approx' => false, 'label' => __('lan.rn_dasturiy_label')],
        ];

        $yonalishlar = [
            __('lan.rn_yonalish_narkotik'),
            __('lan.rn_yonalish_dipfeyk'),
            __('lan.rn_yonalish_migratsiya'),
        ];

        $davlatlar = [
            __('lan.rn_davlat_korea'),
            __('lan.rn_davlat_xitoy'),
            __('lan.rn_davlat_uk'),
            __('lan.rn_davlat_qatar'),
            __('lan.rn_davlat_vengriya'),
            __('lan.rn_davlat_rossiya'),
            __('lan.rn_davlat_belarus'),
        ];
    @endphp

    {{-- ─────── Page hero ─────── --}}
    <section class="lx-page-hero">
        @if($heroBg)
            <div class="lx-page-hero-bg" aria-hidden="true">
                <img src="{{ asset('assets/img/kti_rasm.jpg') }}" alt="" loading="lazy">
            </div>
        @endif

        <div class="lx-page-hero-decor" aria-hidden="true">
            <img src="{{ asset('assets/img/kti-logo.png') }}" alt="">
        </div>

        <div class="container">
            <div class="lx-breadcrumb" data-aos="fade-up">
                <a href="{{ route('main') }}">{{ __('lan.bosh_sahifa') }}</a>
                <span class="sep">—</span>
                <span>{{ __('lan.tad_natij') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.rn_eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.tad_natij') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ __('lan.rn_subtitle') }}
            </p>
        </div>
    </section>

    {{-- ─────── Blok 1: Tadqiqot loyihalari ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('lan.tadqiqotlar') }}</span>
                <h2 class="lx-section-title">{{ __('lan.taq_loy') }}</h2>
            </div>

            <div class="lx-rn-metric-row" data-aos="fade-up">
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-num" data-lx-counter data-target="73" data-duration="1600">0</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_jami') }}</span>
                </div>
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-num" data-lx-counter data-target="22" data-duration="1600">0</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_yakunlangan') }}</span>
                </div>
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-num" data-lx-counter data-target="51" data-duration="1600">0</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_bajarilmoqda') }}</span>
                </div>
            </div>

            <h3 class="lx-rn-subhead" data-aos="fade-up">{{ __('lan.rn_loyiha_turlari') }}</h3>

            <div class="lx-rn-type-grid">
                @foreach($loyihaTurlari as $i => $t)
                    <div class="lx-rn-type-card" data-aos="fade-up" data-aos-delay="{{ $i * 90 }}">
                        <div class="lx-rn-type-icon" aria-hidden="true">
                            @switch($t['icon'])
                                @case('bulb')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M32 8a16 16 0 0 0-9 29c2 1.6 3 3.6 3 6v3h12v-3c0-2.4 1-4.4 3-6a16 16 0 0 0-9-29z"/>
                                        <line x1="26" y1="54" x2="38" y2="54"/>
                                        <line x1="28" y1="60" x2="36" y2="60"/>
                                    </svg>
                                    @break
                                @case('clipboard')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="14" y="12" width="36" height="46" rx="3"/>
                                        <rect x="24" y="8" width="16" height="8" rx="2"/>
                                        <path d="M21 30l7 7 15-15"/>
                                    </svg>
                                    @break
                                @case('shield')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M32 6l20 8v14c0 14-8 24-20 30-12-6-20-16-20-30V14z"/>
                                        <path d="M24 32l6 6 12-13"/>
                                    </svg>
                                    @break
                                @case('globe')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="32" cy="32" r="24"/>
                                        <ellipse cx="32" cy="32" rx="10" ry="24"/>
                                        <line x1="8" y1="32" x2="56" y2="32"/>
                                        <path d="M12 20h40M12 44h40"/>
                                    </svg>
                                    @break
                            @endswitch
                        </div>
                        <span class="lx-rn-type-num" data-lx-counter data-target="{{ $t['value'] }}" data-duration="1400">0</span>
                        <span class="lx-rn-type-label">{{ $t['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 2: Qamrov va respondentlar ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('lan.rn_hudud_label') }}</span>
                <h2 class="lx-section-title">{{ __('lan.rn_qamrov_title') }}</h2>
            </div>

            <div class="lx-rn-chain" data-aos="fade-up">
                <div class="lx-rn-chain-step">{{ __('lan.rn_zanjir_1') }}</div>
                <svg class="lx-rn-chain-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                <div class="lx-rn-chain-step">{{ __('lan.rn_zanjir_2') }}</div>
                <svg class="lx-rn-chain-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                <div class="lx-rn-chain-step">{{ __('lan.rn_zanjir_3') }}</div>
                <svg class="lx-rn-chain-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                <div class="lx-rn-chain-step">{{ __('lan.rn_zanjir_4') }}</div>
            </div>
            <p class="lx-rn-chain-caption" data-aos="fade-up">{{ __('lan.rn_hudud_label') }}</p>

            <div class="lx-rn-metric-row" data-aos="fade-up">
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-prefix">~</span><span class="lx-rn-metric-num" data-lx-counter data-target="100000" data-duration="2000" data-space="1">0</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_respondent_label') }}</span>
                </div>
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-prefix">~</span><span class="lx-rn-metric-num" data-lx-counter data-target="20" data-duration="1400">0</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_sotsiologik_label') }}</span>
                </div>
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-prefix">~</span><span class="lx-rn-metric-num" data-lx-counter data-target="100" data-duration="1600">0</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_ekspert_label') }}</span>
                </div>
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-prefix">~</span><span class="lx-rn-metric-num" data-lx-counter data-target="10" data-duration="1200">0</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_fokus_label') }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ─────── Blok 3: Natijadorlik ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('lan.rn_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('lan.rn_natijadorlik_title') }}</h2>
            </div>

            <div class="lx-rn-metric-row" data-aos="fade-up">
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-num" data-lx-counter data-target="300" data-duration="1800">0</span><span class="lx-rn-metric-suffix">+</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_taklif_label') }}</span>
                </div>
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-prefix">~</span><span class="lx-rn-metric-num" data-lx-counter data-target="100" data-duration="1600">0</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_joriy_label') }}</span>
                </div>
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-prefix">~</span><span class="lx-rn-metric-num" data-lx-counter data-target="50" data-duration="1400">0</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_qonun_label') }}</span>
                    <span class="lx-rn-metric-note">{{ __('lan.rn_nhh_note', ['count' => 5]) }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ─────── Blok 4: Ilmiy va amaliy mahsulotlar ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('lan.ilm_ishlanma') }}</span>
                <h2 class="lx-section-title">{{ __('lan.rn_mahsulot_title') }}</h2>
            </div>

            <div class="lx-rn-type-grid">
                @foreach($mahsulotlar as $i => $m)
                    <div class="lx-rn-type-card" data-aos="fade-up" data-aos-delay="{{ $i * 90 }}">
                        <div class="lx-rn-type-icon" aria-hidden="true">
                            @switch($m['icon'])
                                @case('report')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6h20l10 10v42a2 2 0 0 1-2 2H18a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z"/>
                                        <path d="M38 6v10h10"/>
                                        <line x1="22" y1="30" x2="42" y2="30"/>
                                        <line x1="22" y1="38" x2="42" y2="38"/>
                                        <line x1="22" y1="46" x2="34" y2="46"/>
                                    </svg>
                                    @break
                                @case('book')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10 12c6-4 14-4 20 0v40c-6-4-14-4-20 0z"/>
                                        <path d="M54 12c-6-4-14-4-20 0v40c6-4 14-4 20 0z"/>
                                    </svg>
                                    @break
                                @case('chart')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="10" y1="54" x2="54" y2="54"/>
                                        <rect x="16" y="36" width="8" height="18"/>
                                        <rect x="28" y="24" width="8" height="30"/>
                                        <rect x="40" y="14" width="8" height="40"/>
                                    </svg>
                                    @break
                                @case('monitor')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="8" y="12" width="48" height="32" rx="3"/>
                                        <line x1="24" y1="52" x2="40" y2="52"/>
                                        <line x1="32" y1="44" x2="32" y2="52"/>
                                        <path d="M18 24l6 6-6 6M30 36h8"/>
                                    </svg>
                                    @break
                            @endswitch
                        </div>
                        <span class="lx-rn-type-num">
                            @if($m['approx'])<span class="lx-rn-metric-prefix" style="font-size:22px;">~</span>@endif<span data-lx-counter data-target="{{ $m['value'] }}" data-duration="1400">0</span>
                        </span>
                        <span class="lx-rn-type-label">{{ $m['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 5: Xalqaro hamkorlik ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('lan.rn_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('lan.xalqaro_hamkorlik') }}</h2>
            </div>

            <div class="lx-rn-metric-row" data-aos="fade-up" style="max-width: 640px; margin-left: auto; margin-right: auto;">
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-num" data-lx-counter data-target="9" data-duration="1200">0</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_xalqaro_qoshma_loyiha') }}</span>
                </div>
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-num" data-lx-counter data-target="10" data-duration="1200">0</span><span class="lx-rn-metric-suffix">+</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('lan.rn_davlat_tajriba_label') }}</span>
                </div>
            </div>

            <div class="lx-rn-chips-block" data-aos="fade-up">
                <span class="lx-rn-chips-head">{{ __('lan.rn_yonalishlar_label') }}</span>
                <div class="lx-rn-chips">
                    @foreach($yonalishlar as $y)
                        <span class="lx-rn-chip">{{ $y }}</span>
                    @endforeach
                </div>
            </div>

            <div class="lx-rn-chips-block" data-aos="fade-up">
                <span class="lx-rn-chips-head">{{ __('lan.rn_davlat_tajriba_label') }}</span>
                <div class="lx-rn-chips">
                    @foreach($davlatlar as $d)
                        <span class="lx-rn-chip">{{ $d }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</div>

{{-- ─── Counter animation (IntersectionObserver) ─── --}}
<script>
(function () {
    var counters = document.querySelectorAll('[data-lx-counter]');
    if (!counters.length) return;

    var prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function easeOutCubic(t) { return 1 - Math.pow(1 - t, 3); }

    function format(v, spaced) {
        return spaced ? v.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ') : v.toString();
    }

    function run(el) {
        var target   = parseFloat(el.getAttribute('data-target')) || 0;
        var duration = parseInt(el.getAttribute('data-duration'), 10) || 1600;
        var spaced   = el.getAttribute('data-space') === '1';

        if (prefersReduced) {
            el.textContent = format(target, spaced);
            return;
        }

        var start = null;
        function tick(ts) {
            if (start === null) start = ts;
            var p = Math.min((ts - start) / duration, 1);
            var v = Math.round(target * easeOutCubic(p));
            el.textContent = format(v, spaced);
            if (p < 1) requestAnimationFrame(tick);
            else el.textContent = format(target, spaced);
        }
        requestAnimationFrame(tick);
    }

    if (!('IntersectionObserver' in window)) {
        counters.forEach(run);
        return;
    }

    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                run(entry.target);
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.35 });

    counters.forEach(function (el) { io.observe(el); });
})();
</script>
</x-main>
