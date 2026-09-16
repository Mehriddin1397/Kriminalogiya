<x-main title="{{ __('international_partners.title') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.xalqaro_hamkorlar') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('international_partners.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('international_partners.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('international_partners.subtitle') }}</p>

            <x-intl-tabs active="partners" />
        </div>
    </section>

    {{-- ─────── Intro ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-bottom: 40px;">
        <div class="container">
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('international_partners.intro') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Highlights + Specialized + Agencies ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">

            {{-- MDH va BMT ─ katta highlight kartalar --}}
            <div class="lx-partner-highlights-grid">
                @foreach($highlights as $h)
                    <div class="lx-partner-highlight-card" data-aos="fade-up">
                        <span class="lx-partner-highlight-flag" aria-hidden="true">
                            @foreach($h['flags'] as $code)
                                <x-flag-icon :code="$code" />
                            @endforeach
                        </span>
                        <div class="lx-partner-highlight-body">
                            <h3 class="lx-partner-highlight-title">{{ $h['title'] }}</h3>
                            <p class="lx-partner-highlight-text">{{ $h['text'] }}</p>
                            <span class="lx-partner-highlight-badge">{{ $h['badge'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Maxsus yo'nalishlar bo'yicha hamkor davlatlar --}}
            <div class="lx-section-head" data-aos="fade-up" style="margin-top: 72px;">
                <span class="lx-eyebrow">{{ __('international_partners.specialized_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('international_partners.specialized_title') }}</h2>
                <p class="lx-section-sub">{{ __('international_partners.specialized_intro') }}</p>
            </div>

            <div class="lx-partner-grid">
                @foreach($specialized as $i => $s)
                    <div class="lx-partner-card" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <span class="lx-partner-card-flag" aria-hidden="true">
                            @foreach($s['flags'] as $code)
                                <x-flag-icon :code="$code" />
                            @endforeach
                        </span>
                        <h3 class="lx-partner-card-name">{{ $s['country'] }}</h3>
                        <p class="lx-partner-card-text">{{ $s['text'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Xalqaro hamkorlik agentliklari --}}
            <div class="lx-section-head" data-aos="fade-up" style="margin-top: 72px;">
                <span class="lx-eyebrow">{{ __('international_partners.agencies_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('international_partners.agencies_title') }}</h2>
                <p class="lx-section-sub">{{ __('international_partners.agencies_intro') }}</p>
            </div>

            <div class="lx-partner-grid">
                @foreach($agencies as $i => $a)
                    <div class="lx-partner-card" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <span class="lx-partner-card-flag" aria-hidden="true">
                            @foreach($a['flags'] as $code)
                                <x-flag-icon :code="$code" />
                            @endforeach
                        </span>
                        <h3 class="lx-partner-card-name">{{ $a['name'] }}</h3>
                        <p class="lx-partner-card-text">{{ $a['text'] }}</p>
                        <span class="lx-partner-card-badge">{{ __('international_partners.agencies_badge') }}</span>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

</div>
</x-main>
