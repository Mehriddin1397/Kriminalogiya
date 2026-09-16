<x-main title="{{ __('ilmiy_tadqiqot.title') }} — {{ __('lan.kriminalog') }}">
<div class="home-luxury">

    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
            'assets/img/bg1.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));
    @endphp

    {{-- ─────── Page hero (Blok 1: Kirish va mohiyat) ─────── --}}
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
                <span>{{ __('lan.tadqiqotlar') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.ilm_tad_nima') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('ilmiy_tadqiqot.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('ilmiy_tadqiqot.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('ilmiy_tadqiqot.subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Blok 1 (davomi): Kirish matni ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-bottom: 24px;">
        <div class="container">
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('ilmiy_tadqiqot.intro_p1') }}</p>
                <p>{{ __('ilmiy_tadqiqot.intro_p2') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Blok 2: Dalilga asoslangan xulosa (Highlight/Quote) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-top: 8px;">
        <div class="container">
            <div class="lx-mission-hero-text" data-aos="fade-up">
                <span class="lx-mission-hero-quote" aria-hidden="true">&ldquo;</span>
                <span class="lx-mission-hero-label">{{ __('ilmiy_tadqiqot.quote_label') }}</span>
                <p>{{ __('ilmiy_tadqiqot.quote_text') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Blok 3: Kriminologik tadqiqot nimani o'rganadi? (Grid Cards) ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('ilmiy_tadqiqot.grid_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('ilmiy_tadqiqot.grid_title') }}</h2>
                <p class="lx-section-sub">{{ __('ilmiy_tadqiqot.grid_intro') }}</p>
            </div>

            <div class="lx-mission-grid">
                @foreach($grid as $i => $g)
                    <div class="lx-mission-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 80 }}">
                        <span class="lx-mission-card-index">{{ sprintf('%02d', $i + 1) }}</span>
                        <div class="lx-mission-card-icon" aria-hidden="true">
                            @switch($g['icon'])
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
                            @endswitch
                        </div>
                        <h3 class="lx-mission-card-title">{{ $g['title'] }}</h3>
                        <p class="lx-mission-card-text">{{ $g['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 4: Bir ilmiy tadqiqot qanday yaratiladi? (Vertical Timeline) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('ilmiy_tadqiqot.timeline_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('ilmiy_tadqiqot.timeline_title') }}</h2>
                <p class="lx-section-sub">{{ __('ilmiy_tadqiqot.timeline_intro') }}</p>
            </div>

            <div class="lx-timeline">
                @foreach($timeline as $i => $step)
                    <div class="lx-timeline-item" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="lx-timeline-dot" aria-hidden="true">
                            <span class="lx-timeline-icon">{{ $step['icon'] }}</span>
                        </div>
                        <div class="lx-timeline-card">
                            <span class="lx-timeline-period">{{ $step['period'] }}</span>
                            <h3 class="lx-timeline-title">{{ $step['title'] }}</h3>
                            <p class="lx-timeline-text">{{ $step['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 5: Nega bu davlat uchun muhim? (Highlights) ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('ilmiy_tadqiqot.importance_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('ilmiy_tadqiqot.importance_title') }}</h2>
                <p class="lx-section-sub">{{ __('ilmiy_tadqiqot.importance_intro') }}</p>
            </div>

            <div class="lx-ab-highlights-grid">
                @foreach($importance as $i => $item)
                    <div class="lx-ab-highlight-card" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <span class="lx-ab-highlight-quote" aria-hidden="true">&ldquo;</span>
                        <span class="lx-ab-highlight-icon" aria-hidden="true">{{ $item['icon'] }}</span>
                        <p class="lx-ab-highlight-text">{{ $item['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 6: Institutdagi tadqiqot zanjiri (Process Flow) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('ilmiy_tadqiqot.process_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('ilmiy_tadqiqot.process_title') }}</h2>
                <p class="lx-section-sub">{{ __('ilmiy_tadqiqot.process_intro') }}</p>
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

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.bosh_sahifa') }}</span>
                </a>
            </div>
        </div>
    </section>

</div>
</x-main>
