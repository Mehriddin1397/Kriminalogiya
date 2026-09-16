<x-main title="{{ __('davlat_hisobotlari.seo_title') }}">
<div class="home-luxury">

    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
            'assets/img/bg1.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));
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
                <span>{{ __('lan.ilm_ishlanma') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.dav_hisob') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('davlat_hisobotlari.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('davlat_hisobotlari.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('davlat_hisobotlari.subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Kirish ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('davlat_hisobotlari.intro_p1') }}</p>
                <p>{{ __('davlat_hisobotlari.intro_p2') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Nima uchun muhim? ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('davlat_hisobotlari.why_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('davlat_hisobotlari.why_title') }}</h2>
            </div>

            <div class="lx-mission-grid" style="grid-template-columns: repeat(2, 1fr); margin-bottom: 40px;">
                <div class="lx-mission-card" data-aos="fade-up">
                    <h3 class="lx-mission-card-title" style="padding-right: 0;">{{ __('davlat_hisobotlari.why_trends_title') }}</h3>
                    <p class="lx-mission-card-text">{{ __('davlat_hisobotlari.why_trends_text') }}</p>
                </div>
                <div class="lx-mission-card" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="lx-mission-card-title" style="padding-right: 0;">{{ __('davlat_hisobotlari.why_factors_title') }}</h3>
                    <p class="lx-mission-card-text">{{ __('davlat_hisobotlari.why_factors_text') }}</p>
                </div>
            </div>

            <div style="max-width: 780px; margin: 0 auto;" data-aos="fade-up">
                <p class="lx-mission-card-text" style="margin-bottom: 16px;">{{ __('davlat_hisobotlari.why_p1') }}</p>
                <p class="lx-mission-card-text" style="margin-bottom: 16px;">{{ __('davlat_hisobotlari.why_p2') }}</p>
                <p class="lx-mission-card-text">{{ __('davlat_hisobotlari.why_p3') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Yangi amaliyot ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('davlat_hisobotlari.practice_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('davlat_hisobotlari.practice_title') }}</h2>
            </div>

            <div class="lx-tl-intro" data-aos="fade-up" style="margin-bottom: 40px;">
                <p>{{ __('davlat_hisobotlari.practice_intro') }}</p>
            </div>

            <h3 class="lx-rn-subhead">{{ __('davlat_hisobotlari.practice_list_title') }}</h3>

            <div class="lx-ab-disc-grid" data-aos="fade-up">
                @foreach(__('davlat_hisobotlari.practice_list') as $i => $item)
                    <div class="lx-ab-disc-card" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <span class="lx-ab-disc-icon" aria-hidden="true">&#10003;</span>
                        <span class="lx-ab-disc-label">{{ $item }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Raqamlarda ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('davlat_hisobotlari.numbers_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('davlat_hisobotlari.numbers_title') }}</h2>
                <p class="lx-section-sub">{{ __('davlat_hisobotlari.numbers_intro') }}</p>
            </div>

            <div class="lx-rn-metric-row" data-aos="fade-up" style="max-width: 640px; margin-left: auto; margin-right: auto;">
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-num">{{ __('davlat_hisobotlari.numbers_stat1_num') }}</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('davlat_hisobotlari.numbers_stat1_label') }}</span>
                    <span class="lx-rn-metric-note">{{ __('davlat_hisobotlari.numbers_stat1_note') }}</span>
                </div>
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-num">{{ __('davlat_hisobotlari.numbers_stat2_num') }}</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('davlat_hisobotlari.numbers_stat2_label') }}</span>
                    <span class="lx-rn-metric-note">{{ __('davlat_hisobotlari.numbers_stat2_note') }}</span>
                </div>
            </div>

            <h3 class="lx-rn-subhead" style="margin-top: 56px;">{{ __('davlat_hisobotlari.quarters_title') }}</h3>

            <div class="lx-timeline">
                @foreach(__('davlat_hisobotlari.quarters') as $i => $q)
                    <div class="lx-timeline-item" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                        <div class="lx-timeline-dot" aria-hidden="true">
                            <span class="lx-timeline-icon">&sect;</span>
                        </div>
                        <div class="lx-timeline-card">
                            <span class="lx-timeline-period">{{ $q['period'] }}</span>
                            <h3 class="lx-timeline-title">{{ $q['summary'] }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="lx-legal-note" data-aos="fade-up" style="text-align: center; max-width: 780px; margin: 32px auto 0;">
                {{ __('davlat_hisobotlari.numbers_footnote') }}
            </p>
        </div>
    </section>

    {{-- ─────── Foydalanish tartibi ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('davlat_hisobotlari.access_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('davlat_hisobotlari.access_title') }}</h2>
            </div>

            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('davlat_hisobotlari.access_p1') }}</p>
                <p>{{ __('davlat_hisobotlari.access_p2') }}</p>
                <p>{{ __('davlat_hisobotlari.access_p3') }}</p>
                <p>{{ __('davlat_hisobotlari.access_p4') }}</p>
            </div>

            <div class="lx-back-wrap" data-aos="fade-up">
                <p style="color: var(--lx-text-soft); font-size: 15px; margin: 0 0 20px;">
                    <strong style="color: var(--lx-text);">{{ __('davlat_hisobotlari.access_contact_label') }}:</strong>
                    {{ __('davlat_hisobotlari.access_contact_text') }}
                </p>
                <a href="{{ route('contact') }}" class="lx-btn lx-btn-dark">
                    <span>{{ __('davlat_hisobotlari.access_contact_cta') }}</span>
                    <span class="arrow">&rarr;</span>
                </a>
            </div>
        </div>
    </section>

</div>
</x-main>
