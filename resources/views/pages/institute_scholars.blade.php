<x-main title="{{ __('lan.kriminologik_olimlar') }} — {{ __('lan.kriminalog') }}">
<div class="home-luxury">

    @php
        $heroBg = collect([
            'assets/img/banner2.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner1.jpg',
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
                <span>{{ __('lan.institut') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.kriminologik_olimlar') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.institut') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.kriminologik_olimlar') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
        </div>
    </section>

    {{-- ─────── Olimlar ro'yxati ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            @if(count($scholars) === 1)
                @php $featured = $scholars[0]; @endphp
                <a href="{{ route('scholar_profile', $featured['slug']) }}" class="lx-leader-chief" data-aos="fade-up">
                    <div class="lx-leader-chief-photo">
                        <div class="lx-leader-photo-empty" aria-hidden="true">
                            <span>{{ mb_strtoupper(mb_substr(__($featured['name_key']), 0, 1)) }}</span>
                        </div>
                        @if(!empty($featured['photo']) && file_exists(public_path($featured['photo'])))
                            <img src="{{ asset($featured['photo']) }}"
                                 alt="{{ __($featured['name_key']) }}"
                                 loading="lazy"
                                 onerror="this.style.display='none'">
                        @endif
                    </div>
                    <div class="lx-leader-chief-body">
                        <span class="lx-leader-chief-badge">{{ __($featured['title_key']) }}</span>
                        <h3 class="lx-leader-chief-name">{{ __($featured['name_key']) }}</h3>
                        <div class="lx-leader-chief-post">{{ __($featured['years_key']) }}</div>
                        <span class="lx-leader-chief-cta">
                            {{ __('lan.batafsil') }} &rarr;
                        </span>
                    </div>
                </a>
            @else
                <div class="lx-leaders-grid">
                    @foreach($scholars as $i => $s)
                        <a href="{{ route('scholar_profile', $s['slug']) }}" class="lx-leader-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 120 }}">
                            <div class="lx-leader-photo">
                                <div class="lx-leader-photo-empty" aria-hidden="true">
                                    <span>{{ mb_strtoupper(mb_substr(__($s['name_key']), 0, 1)) }}</span>
                                </div>
                                @if(!empty($s['photo']) && file_exists(public_path($s['photo'])))
                                    <img src="{{ asset($s['photo']) }}"
                                         alt="{{ __($s['name_key']) }}"
                                         loading="lazy"
                                         onerror="this.style.display='none'">
                                @endif
                                <div class="lx-leader-overlay">
                                    <span class="lx-leader-view">
                                        {{ __('lan.batafsil') }} &rarr;
                                    </span>
                                </div>
                            </div>
                            <div class="lx-leader-info">
                                <h3 class="lx-leader-name">{{ __($s['name_key']) }}</h3>
                                <div class="lx-leader-eyebrow">{{ __($s['title_key']) }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

</div>
</x-main>
