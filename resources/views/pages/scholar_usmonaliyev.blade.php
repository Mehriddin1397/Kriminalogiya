<x-main title="{{ __('usmonaliyev.seo_title') }}">
<div class="home-luxury">

    @php
        $heroBg = collect([
            'assets/img/banner2.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner1.jpg',
            'assets/img/bg1.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));

        $olimPhoto = file_exists(public_path('img/olim.jpg')) ? asset('img/olim.jpg') : null;
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
                <span>{{ __('usmonaliyev.hero_name') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.kriminologik_olimlar') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('usmonaliyev.hero_name') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ __('usmonaliyev.hero_degree') }} &middot; {{ __('usmonaliyev.hero_years') }}
            </p>
        </div>
    </section>

    {{-- ─────── Profil: rasm + qisqa tavsif + yo'nalishlar ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-about-grid">

                <div class="lx-about-image" data-aos="fade-right">
                    <div class="lx-image-frame">
                        @if($olimPhoto)
                            <img src="{{ $olimPhoto }}"
                                 alt="{{ __('usmonaliyev.hero_name') }}"
                                 loading="lazy"
                                 onerror="this.style.display='none'">
                        @else
                            <div class="lx-leader-photo-empty" aria-hidden="true">
                                <span>{{ mb_strtoupper(mb_substr(__('usmonaliyev.hero_name'), 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="lx-image-badge">
                        <span class="lx-eyebrow">{{ __('usmonaliyev.hero_years') }}</span>
                    </div>
                </div>

                <div class="lx-about-text" data-aos="fade-left">
                    <span class="lx-eyebrow">{{ __('usmonaliyev.hero_degree') }}</span>
                    <h2 class="lx-section-title">{{ __('usmonaliyev.hero_name') }}</h2>

                    <div class="lx-rich-text">
                        <p>{{ __('usmonaliyev.intro_lead') }}</p>
                    </div>
                </div>

            </div>

            <div class="lx-section-head" style="margin-top: 56px;" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('usmonaliyev.directions_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('usmonaliyev.directions_title') }}</h2>
            </div>

            <div class="lx-ab-disc-grid">
                @foreach(__('usmonaliyev.directions') as $i => $direction)
                    <div class="lx-ab-disc-card" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <span class="lx-ab-disc-icon" aria-hidden="true">&#9878;</span>
                        <span class="lx-ab-disc-label">{{ $direction }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Biografiya ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-top: 0;">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('usmonaliyev.bio_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('usmonaliyev.bio_title') }}</h2>
            </div>

            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('usmonaliyev.bio_p1') }}</p>
                <p>{{ __('usmonaliyev.bio_p2') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Kriminologiya adabiyotiga qo'shgan hissasi ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-top: 0;">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('usmonaliyev.lit_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('usmonaliyev.lit_title') }}</h2>
            </div>

            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('usmonaliyev.lit_p1') }}</p>
                <p>{{ __('usmonaliyev.lit_p2') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Jinoyat huquqiga bag'ishlangan fundamental asarlar ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('usmonaliyev.crimlaw_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('usmonaliyev.crimlaw_title') }}</h2>
            </div>

            <div style="max-width: 780px; margin: 0 auto;">
                <div class="lx-mission-card" data-aos="fade-up">
                    <h3 class="lx-mission-card-title">{{ __('usmonaliyev.crimlaw_work_title') }}</h3>
                    <div class="lx-rich-text">
                        <p>{{ __('usmonaliyev.crimlaw_lead') }}</p>
                        <ul>
                            @foreach(__('usmonaliyev.crimlaw_topics') as $topic)
                                <li>{{ $topic }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ─────── Asosiy ilmiy asarlari (timeline) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('usmonaliyev.works_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('usmonaliyev.works_title') }}</h2>
                <p class="lx-section-sub">{{ __('usmonaliyev.works_intro') }}</p>
            </div>

            <div class="lx-timeline">
                @foreach(__('usmonaliyev.works') as $i => $work)
                    <div class="lx-timeline-item" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <div class="lx-timeline-dot" aria-hidden="true">
                            <span class="lx-timeline-icon">&sect;</span>
                        </div>
                        <div class="lx-timeline-card">
                            @if(!empty($work['year']))
                                <span class="lx-timeline-period">{{ $work['year'] }}</span>
                            @endif
                            <h3 class="lx-timeline-title">&ldquo;{{ $work['title'] }}&rdquo;</h3>
                            @if(!empty($work['note']))
                                <p class="lx-timeline-text">{{ ucfirst($work['note']) }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Alohida ajratilgan asar ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('usmonaliyev.featured_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('usmonaliyev.featured_title') }}</h2>
            </div>

            <div style="max-width: 780px; margin: 0 auto;">
                <div class="lx-mission-card" data-aos="fade-up">
                    <div class="lx-rich-text">
                        <p>{{ __('usmonaliyev.featured_text') }}</p>
                    </div>
                    <p class="lx-page-meta">
                        {{ __('usmonaliyev.featured_meta_year') }}
                        &middot; {{ __('usmonaliyev.featured_meta_publisher') }}
                        &middot; {{ __('usmonaliyev.featured_meta_pages') }}
                        &middot; {{ __('usmonaliyev.featured_meta_audience') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ─────── Ilmiy qarashlari ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-bottom: 56px;">
        <div class="container">
            <div class="lx-mission-hero-text" data-aos="fade-up">
                <span class="lx-mission-hero-quote" aria-hidden="true">&ldquo;</span>
                <span class="lx-mission-hero-label">{{ __('usmonaliyev.views_eyebrow') }}</span>
                <p>{{ __('usmonaliyev.views_quote') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Qat'iyat va insonparvarlik o'rtasidagi muvozanat ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-top: 0;">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('usmonaliyev.balance_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('usmonaliyev.balance_title') }}</h2>
            </div>

            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('usmonaliyev.balance_p1') }}</p>
                <p>{{ __('usmonaliyev.balance_p2') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Ustoz va ilmiy rahbar ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('usmonaliyev.mentor_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('usmonaliyev.mentor_title') }}</h2>
            </div>

            <div class="lx-ab-highlights-grid" style="max-width: 780px; margin: 0 auto;">
                <div class="lx-ab-highlight-card" data-aos="fade-up">
                    <span class="lx-ab-highlight-quote" aria-hidden="true">&ldquo;</span>
                    <p class="lx-ab-highlight-text">{{ __('usmonaliyev.mentor_text') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ─────── Ilmiy merosi ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('usmonaliyev.legacy_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('usmonaliyev.legacy_title') }}</h2>
            </div>

            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('usmonaliyev.legacy_p1') }}</p>
                <p>{{ __('usmonaliyev.legacy_p2') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Yakuniy ilmiy xulosa ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-top: 0;">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <h2 class="lx-section-title">{{ __('usmonaliyev.conclusion_title') }}</h2>
            </div>

            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('usmonaliyev.conclusion_text') }}</p>
            </div>

            <div class="lx-quote" data-aos="fade-up" data-aos-delay="150">
                <span class="lx-quote-mark" aria-hidden="true">&ldquo;</span>
                <p class="lx-quote-text">{{ __('usmonaliyev.conclusion_quote') }}</p>
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
