<x-main title="{{ __('lan.dissertatsiya_mavzulari') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.institut') }}</span>
                <span class="sep">—</span>
                <a href="{{ route('institut_kengashlari') }}">{{ __('lan.ilmiy_darajalar_beruvchi_kengashlar') }}</a>
                <span class="sep">—</span>
                <span>{{ __('lan.dissertatsiya_mavzulari') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('councils.topics_eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.dissertatsiya_mavzulari') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('councils.topics_subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── PhD mavzulari ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <h2 class="lx-section-title">{{ __('councils.topics_phd_title') }}</h2>
            </div>

            <div class="lx-topics-grid" data-aos="fade-up">
                @foreach($phd as $i => $topic)
                    <div class="lx-topics-item">
                        <span class="lx-topics-num">{{ $i + 1 }}.</span>
                        <span>{{ $topic }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── DSc mavzulari ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <h2 class="lx-section-title">{{ __('councils.topics_dsc_title') }}</h2>
            </div>

            <div class="lx-topics-grid" data-aos="fade-up">
                @foreach($dsc as $i => $topic)
                    <div class="lx-topics-item">
                        <span class="lx-topics-num">{{ $i + 1 }}.</span>
                        <span>{{ $topic }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
</x-main>
