<x-main title="{{ __('sulaymonova.seo_title') }}">
<div class="home-luxury">

    @php
        $heroBg = collect([
            'assets/img/banner2.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner1.jpg',
            'assets/img/bg1.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));

        $photo1 = 'olim/photo_2026-08-22_12-17-37.jpg';
        $photo2 = 'olim/photo_2026-08-22_12-21-12.jpg';
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
                <span>{{ __('lan.institut') }}</span>
                <span class="sep">—</span>
                <a href="{{ route('institute_scholars') }}">{{ __('lan.kriminologik_olimlar') }}</a>
                <span class="sep">—</span>
                <span>{{ __('sulaymonova.hero_name') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.kriminologik_olimlar') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('sulaymonova.hero_name') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ __('sulaymonova.hero_degree') }} &middot; {{ __('sulaymonova.hero_years') }}
            </p>
        </div>
    </section>

    {{-- ─────── Profil: rasm + qisqa tavsif ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-about-grid">

                <div class="lx-about-image" data-aos="fade-right">
                    <div class="lx-image-frame">
                        @if(file_exists(public_path($photo1)))
                            <img src="{{ asset($photo1) }}"
                                 alt="{{ __('sulaymonova.hero_name') }}"
                                 loading="lazy"
                                 onerror="this.style.display='none'">
                        @else
                            <div class="lx-leader-photo-empty" aria-hidden="true">
                                <span>{{ mb_strtoupper(mb_substr(__('sulaymonova.hero_name'), 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="lx-image-badge">
                        <span class="lx-eyebrow">{{ __('sulaymonova.hero_years') }}</span>
                    </div>
                </div>

                <div class="lx-about-text" data-aos="fade-left">
                    <span class="lx-eyebrow">{{ __('sulaymonova.hero_degree') }}</span>
                    <h2 class="lx-section-title">{{ __('sulaymonova.hero_name') }}</h2>

                    <div class="lx-rich-text">
                        <p>{{ __('sulaymonova.intro_lead') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ─────── Ta'lim va ilmiy faoliyat boshlanishi ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-top: 0;">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('sulaymonova.edu_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('sulaymonova.edu_title') }}</h2>
            </div>

            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('sulaymonova.edu_p1') }}</p>
                <p>{{ __('sulaymonova.edu_p2') }}</p>
                <p>{{ __('sulaymonova.edu_p3') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Ilmiy darajalar (timeline) ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('sulaymonova.degrees_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('sulaymonova.degrees_title') }}</h2>
                <p class="lx-section-sub">{{ __('sulaymonova.degrees_intro') }}</p>
            </div>

            <div class="lx-timeline">
                @foreach(__('sulaymonova.degrees') as $i => $d)
                    <div class="lx-timeline-item" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <div class="lx-timeline-dot" aria-hidden="true">
                            <span class="lx-timeline-icon">&sect;</span>
                        </div>
                        <div class="lx-timeline-card">
                            <span class="lx-timeline-period">{{ $d['year'] }}</span>
                            <h3 class="lx-timeline-title">&ldquo;{{ $d['title'] }}&rdquo;</h3>
                            <p class="lx-timeline-text">{{ $d['note'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Rahbarlik lavozimlari ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('sulaymonova.positions_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('sulaymonova.positions_title') }}</h2>
                <p class="lx-section-sub">{{ __('sulaymonova.positions_intro') }}</p>
            </div>

            <div class="lx-ab-disc-grid">
                @foreach(__('sulaymonova.positions') as $i => $position)
                    <div class="lx-ab-disc-card" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <span class="lx-ab-disc-icon" aria-hidden="true">&#9878;</span>
                        <span class="lx-ab-disc-label">{{ $position }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Akademik unvon va davlat mukofotlari ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-top: 0;">
        <div class="container">
            <div class="lx-about-grid">

                <div class="lx-about-image" data-aos="fade-right">
                    <div class="lx-image-frame">
                        @if(file_exists(public_path($photo2)))
                            <img src="{{ asset($photo2) }}"
                                 alt="{{ __('sulaymonova.hero_name') }}"
                                 loading="lazy"
                                 onerror="this.style.display='none'">
                        @else
                            <div class="lx-leader-photo-empty" aria-hidden="true">
                                <span>{{ mb_strtoupper(mb_substr(__('sulaymonova.hero_name'), 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="lx-image-badge">
                        <span class="lx-eyebrow">{{ __('sulaymonova.honors_badge') }}</span>
                    </div>
                </div>

                <div class="lx-about-text" data-aos="fade-left">
                    <span class="lx-eyebrow">{{ __('sulaymonova.honors_eyebrow') }}</span>
                    <h2 class="lx-section-title">{{ __('sulaymonova.honors_title') }}</h2>

                    <div class="lx-rich-text">
                        <p>{{ __('sulaymonova.honors_p1') }}</p>
                        <p>{{ __('sulaymonova.honors_p2') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ─────── Ilmiy meros (statistika) ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('sulaymonova.legacy_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('sulaymonova.legacy_title') }}</h2>
                <p class="lx-section-sub">{{ __('sulaymonova.legacy_intro') }}</p>
            </div>

            <div class="lx-rn-metric-row" data-aos="fade-up">
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-num">{{ __('sulaymonova.legacy_stat1_num') }}</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('sulaymonova.legacy_stat1_label') }}</span>
                    <span class="lx-rn-metric-note">{{ __('sulaymonova.legacy_stat1_note') }}</span>
                </div>
                <div class="lx-rn-metric">
                    <div class="lx-rn-metric-value">
                        <span class="lx-rn-metric-num">{{ __('sulaymonova.legacy_stat2_num') }}</span>
                    </div>
                    <span class="lx-rn-metric-label">{{ __('sulaymonova.legacy_stat2_label') }}</span>
                    <span class="lx-rn-metric-note">{{ __('sulaymonova.legacy_stat2_note') }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ─────── Xotira ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <h2 class="lx-section-title">{{ __('sulaymonova.closing_title') }}</h2>
            </div>

            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('sulaymonova.closing_text') }}</p>
            </div>

            <div class="lx-back-wrap" data-aos="fade-up" data-aos-delay="250">
                <a href="{{ route('institute_scholars') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.ortga') }}</span>
                </a>
            </div>
        </div>
    </section>

</div>
</x-main>
