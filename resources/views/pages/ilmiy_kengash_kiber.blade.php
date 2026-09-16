<x-main title="{{ __('lan.kiberxavfsizlik_05_01_12') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.kiberxavfsizlik_05_01_12') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('councils.seminar_eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.kiberxavfsizlik_05_01_12') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ __('councils.cyber_subtitle', ['specialty' => $cyber['specialty']]) }}
            </p>
        </div>
    </section>

    {{-- ─────── Ma'lumot ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>
                    {{ __('councils.cyber_text', [
                        'date' => $oakDecisionDate,
                        'decision' => $oakDecisionNumber,
                        'specialty' => $cyber['specialty'],
                        'number' => $cyber['council_number'],
                    ]) }}
                </p>
            </div>
        </div>
    </section>

</div>
</x-main>
