<x-main title="{{ __('international_cooperation.title') }} — {{ __('lan.kriminalog') }}">
<div class="home-luxury">

    @php
        $heroBg = collect([
            'assets/img/banner3.jpg',
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
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
                <span>{{ __('lan.xalqaro_hamkorlik') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.xalqaro_hamkorlik_haqida') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('international_cooperation.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('international_cooperation.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('international_cooperation.subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Blok 1: Huquqiy asos ─────── --}}
    <section class="lx-section lx-intl-legal-section" style="background: var(--lx-cream); padding-bottom: 56px;">
        <svg class="lx-intl-globe-decor" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <circle cx="100" cy="100" r="90" stroke="currentColor" stroke-width="1"/>
            <ellipse cx="100" cy="100" rx="38" ry="90" stroke="currentColor" stroke-width="1"/>
            <ellipse cx="100" cy="100" rx="68" ry="90" stroke="currentColor" stroke-width="1"/>
            <line x1="10" y1="100" x2="190" y2="100" stroke="currentColor" stroke-width="1"/>
            <line x1="18" y1="55" x2="182" y2="55" stroke="currentColor" stroke-width="1"/>
            <line x1="18" y1="145" x2="182" y2="145" stroke="currentColor" stroke-width="1"/>
            <path d="M58 60 L140 70 L120 150 L70 130 Z" stroke="currentColor" stroke-width="1" stroke-dasharray="3 4"/>
            <circle cx="58" cy="60" r="3" fill="currentColor"/>
            <circle cx="140" cy="70" r="3" fill="currentColor"/>
            <circle cx="120" cy="150" r="3" fill="currentColor"/>
            <circle cx="70" cy="130" r="3" fill="currentColor"/>
            <circle cx="100" cy="100" r="3" fill="currentColor"/>
        </svg>

        <div class="container">
            <div class="lx-mission-hero-text" data-aos="fade-up">
                <span class="lx-mission-hero-quote" aria-hidden="true">&ldquo;</span>
                <span class="lx-mission-hero-label">{{ __('international_cooperation.legal_label') }}</span>
                <p>{{ __('international_cooperation.legal_p1') }}</p>
                <p>{{ __('international_cooperation.legal_p2') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Blok 2: Asosiy yo'nalishlar (Grid Cards) ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('international_cooperation.directions_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('international_cooperation.directions_title') }}</h2>
                <p class="lx-section-sub">{{ __('international_cooperation.directions_intro') }}</p>
            </div>

            <div class="lx-mission-grid">
                @foreach($directions as $i => $d)
                    <div class="lx-mission-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 80 }}">
                        <span class="lx-mission-card-index">{{ sprintf('%02d', $i + 1) }}</span>
                        <span class="lx-mission-card-icon lx-mission-card-icon-emoji" aria-hidden="true">{{ $d['icon'] }}</span>
                        <h3 class="lx-mission-card-title">{{ $d['title'] }}</h3>
                        <p class="lx-mission-card-text">{{ $d['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 3: Kutilayotgan natija (Highlight banner) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <span class="lx-eyebrow" data-aos="fade-up" style="display:flex; justify-content:center; margin-bottom:22px;">
                {{ __('international_cooperation.conclusion_eyebrow') }}
            </span>

            <div class="lx-intl-banner" data-aos="fade-up">
                <span class="lx-intl-banner-icon" aria-hidden="true">🌍</span>
                <p class="lx-intl-banner-text">{{ __('international_cooperation.conclusion_text') }}</p>
            </div>
        </div>
    </section>

</div>
</x-main>
