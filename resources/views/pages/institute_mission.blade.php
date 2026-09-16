<x-main title="{{ __('lan.ins_vaz') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.institut') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.ins_vaz') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('institute_mission.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('institute_mission.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('institute_mission.subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Blok 1: Bizning missiyamiz ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-bottom: 56px;">
        <div class="container">
            <div class="lx-mission-hero-text" data-aos="fade-up">
                <span class="lx-mission-hero-quote" aria-hidden="true">&ldquo;</span>
                <span class="lx-mission-hero-label">{{ __('institute_mission.mission_title') }}</span>
                <p>{{ __('institute_mission.mission_p1') }}</p>
                <p>{{ __('institute_mission.mission_p2') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Blok 2: Asosiy vazifalarimiz (Grid Cards) ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('institute_mission.tasks_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('institute_mission.tasks_title') }}</h2>
                <p class="lx-section-sub">{{ __('institute_mission.tasks_intro') }}</p>
            </div>

            <div class="lx-mission-list">
                @foreach($tasks as $i => $t)
                    <div class="lx-mission-row" data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 60 }}">
                        <span class="lx-mission-row-index">{{ sprintf('%02d', $i + 1) }}</span>
                        <div class="lx-mission-row-icon" aria-hidden="true">
                            @switch($t['icon'])
                                @case('trend')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 46 22 32l10 8 22-24"/>
                                        <path d="M48 12h10v10"/>
                                    </svg>
                                    @break
                                @case('search')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="26" cy="26" r="16"/>
                                        <line x1="38" y1="38" x2="56" y2="56"/>
                                    </svg>
                                    @break
                                @case('radar')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="32" cy="32" r="4" fill="currentColor" stroke="none"/>
                                        <circle cx="32" cy="32" r="15"/>
                                        <circle cx="32" cy="32" r="26"/>
                                        <line x1="32" y1="32" x2="49" y2="15"/>
                                    </svg>
                                    @break
                                @case('map')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M32 58s18-17 18-32a18 18 0 1 0-36 0c0 15 18 32 18 32z"/>
                                        <circle cx="32" cy="26" r="7"/>
                                    </svg>
                                    @break
                                @case('institution')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 24 32 8l26 16"/>
                                        <rect x="10" y="24" width="44" height="28"/>
                                        <line x1="20" y1="30" x2="20" y2="46"/>
                                        <line x1="32" y1="30" x2="32" y2="46"/>
                                        <line x1="44" y1="30" x2="44" y2="46"/>
                                        <line x1="5" y1="52" x2="59" y2="52"/>
                                    </svg>
                                    @break
                                @case('balance')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="32" y1="8" x2="32" y2="50"/>
                                        <line x1="14" y1="18" x2="50" y2="18"/>
                                        <path d="M14 18 6 34a8 8 0 0 0 16 0z"/>
                                        <path d="M50 18 42 34a8 8 0 0 0 16 0z"/>
                                        <line x1="20" y1="56" x2="44" y2="56"/>
                                    </svg>
                                    @break
                                @case('gauge')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 42a24 24 0 1 1 48 0"/>
                                        <line x1="32" y1="42" x2="44" y2="27"/>
                                        <circle cx="32" cy="42" r="3" fill="currentColor" stroke="none"/>
                                    </svg>
                                    @break
                                @case('rocket')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M32 6c8 6 12 16 12 26 0 6-2 12-6 16l-6 6-6-6c-4-4-6-10-6-16 0-10 4-20 12-26z"/>
                                        <circle cx="32" cy="26" r="5"/>
                                        <path d="M22 40 12 50M42 40l10 10"/>
                                        <path d="M26 48l-2 10M38 48l2 10"/>
                                    </svg>
                                    @break
                                @case('cpu')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="18" y="18" width="28" height="28" rx="3"/>
                                        <rect x="27" y="27" width="10" height="10"/>
                                        <line x1="32" y1="4" x2="32" y2="18"/>
                                        <line x1="32" y1="46" x2="32" y2="60"/>
                                        <line x1="4" y1="32" x2="18" y2="32"/>
                                        <line x1="46" y1="32" x2="60" y2="32"/>
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
                        <div class="lx-mission-row-body">
                            <h3 class="lx-mission-row-title">{{ $t['title'] }}</h3>
                            <p class="lx-mission-row-text">{{ $t['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 3: Yagona ilmiy-amaliy zanjir (Process Flow) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('institute_mission.process_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('institute_mission.process_title') }}</h2>
                <p class="lx-section-sub">{{ __('institute_mission.process_intro') }}</p>
            </div>

            <div class="lx-ab-process" data-aos="fade-up">
                @foreach($process as $i => $p)
                    <div class="lx-ab-step">
                        <span class="lx-ab-step-num">{{ $i + 1 }}</span>
                        <span class="lx-ab-step-icon" aria-hidden="true">{{ $p['icon'] }}</span>
                        <span class="lx-ab-step-label">{{ $p['label'] }}</span>
                    </div>
                    @if(!$loop->last)
                        <svg class="lx-ab-step-arrow" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

</div>
</x-main>
