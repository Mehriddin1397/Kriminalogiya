<x-main title="{{ __('lan.xalqaro_ekspertlar_kengashi') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.xalqaro_ekspertlar_kengashi') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.kengash_maqsadi_va_vazifalari') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('xalqaro_ekspertlar_kengashi.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.xalqaro_ekspertlar_kengashi') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('xalqaro_ekspertlar_kengashi.subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Kirish ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-bottom: 40px;">
        <div class="container">
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('xalqaro_ekspertlar_kengashi.intro') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Kengash maqsadlari ─────── --}}
    <section class="lx-section charcoal" style="padding-top: 0;">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <h2 class="lx-section-title">{{ __('xalqaro_ekspertlar_kengashi.goals_title') }}</h2>
            </div>

            <div class="lx-mission-grid">
                @foreach(__('xalqaro_ekspertlar_kengashi.goals') as $i => $goal)
                    <div class="lx-mission-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 80 }}">
                        <span class="lx-mission-card-index">{{ sprintf('%02d', $i + 1) }}</span>
                        <p class="lx-mission-card-text">{{ $goal }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Hisobot va tasdiqlash tartibi ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('xalqaro_ekspertlar_kengashi.report_text') }}</p>
                <p>{{ __('xalqaro_ekspertlar_kengashi.approval_text') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Nomzodlarga qo'yiladigan talablar ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-top: 0;">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <h2 class="lx-section-title">{{ __('xalqaro_ekspertlar_kengashi.candidates_title') }}</h2>
            </div>
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('xalqaro_ekspertlar_kengashi.candidates_text') }}</p>
            </div>
        </div>
    </section>

</div>
</x-main>
