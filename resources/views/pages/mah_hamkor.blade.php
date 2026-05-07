<x-main title="{{ $category->slug ?? __('lan.hamkor') }}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner3.jpg',
            'assets/img/aa.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));

        $title = $category->slug ?? __('lan.hamkor');
    @endphp

    <section class="lx-page-hero">
        @if($heroBg)
            <div class="lx-page-hero-bg" aria-hidden="true">
                <img src="{{ asset($heroBg) }}" alt="" loading="lazy">
            </div>
        @endif

        <div class="lx-page-hero-decor" aria-hidden="true">
            <img src="{{ asset('assets/img/kti-logo.png') }}" alt="">
        </div>

        <div class="container">
            <div class="lx-breadcrumb" data-aos="fade-up">
                <a href="{{ route('main') }}">{{ __('lan.bosh_sahifa') ?? 'Bosh sahifa' }}</a>
                <span class="sep">—</span>
                <span>{{ $title }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.hamkor') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $title }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ $mah_hamkor->count() }}</p>
        </div>
    </section>

    {{-- ─────── Intro text (Institut #7 description) ─────── --}}
    @php
        $introHtml = '';
        if (isset($text)) {
            $localized = $text->{'description_' . app()->getLocale()} ?? null;
            $fallback  = $text->getAttributes()['description_uz'] ?? null;
            $introHtml = (string) ($localized ?: $fallback ?: '');
        }
    @endphp
    @if(trim(strip_tags($introHtml)) !== '')
        <section class="lx-section lx-partner-intro" style="background: #fff;">
            <div class="container">
                <div class="lx-partner-intro-card" data-aos="fade-up">
                    <span class="lx-partner-intro-mark" aria-hidden="true">&ldquo;</span>
                    <div class="lx-partner-intro-body">
                        {!! $introHtml !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- ─────── Partners grid ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            @if($mah_hamkor->count())
                <div class="lx-partners-list-grid">
                    @foreach($mah_hamkor as $i => $partner)
                        @php
                            $logo = $partner->photos->first();
                            $initial = mb_strtoupper(mb_substr(trim($partner->name ?? '?'), 0, 1));
                            $hasLink = !empty($partner->link);
                            $linkUrl = $hasLink
                                ? (preg_match('~^https?://~i', $partner->link) ? $partner->link : 'https://' . ltrim($partner->link, '/'))
                                : null;
                        @endphp

                        @if($hasLink)
                            <a href="{{ $linkUrl }}" target="_blank" rel="noopener noreferrer"
                               class="lx-partner-tile"
                               data-aos="fade-up"
                               data-aos-delay="{{ ($i % 4) * 80 }}">
                                <div class="lx-partner-tile-logo">
                                    @if($logo)
                                        <img src="{{ asset('storage/'.$logo->file_path) }}"
                                             alt="{{ $partner->name }}"
                                             loading="lazy"
                                             onerror="this.outerHTML='<div class=&quot;lx-partner-tile-empty&quot;>{{ $initial }}</div>'">
                                    @else
                                        <div class="lx-partner-tile-empty">{{ $initial }}</div>
                                    @endif
                                </div>
                                <div class="lx-partner-tile-body">
                                    <h3 class="lx-partner-tile-name">{{ $partner->name }}</h3>
                                    <span class="lx-partner-tile-cta">
                                        <span>{{ __('lan.batafsil') }}</span>
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M7 17L17 7"/>
                                            <polyline points="7 7 17 7 17 17"/>
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        @else
                            <div class="lx-partner-tile is-static"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ ($i % 4) * 80 }}">
                                <div class="lx-partner-tile-logo">
                                    @if($logo)
                                        <img src="{{ asset('storage/'.$logo->file_path) }}"
                                             alt="{{ $partner->name }}"
                                             loading="lazy"
                                             onerror="this.outerHTML='<div class=&quot;lx-partner-tile-empty&quot;>{{ $initial }}</div>'">
                                    @else
                                        <div class="lx-partner-tile-empty">{{ $initial }}</div>
                                    @endif
                                </div>
                                <div class="lx-partner-tile-body">
                                    <h3 class="lx-partner-tile-name">{{ $partner->name }}</h3>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="lx-empty-state" data-aos="fade-up">
                    {{ __('lan.malumot_yoq') ?? "Ma'lumot topilmadi." }}
                </div>
            @endif

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.ortga') }}</span>
                </a>
            </div>
        </div>
    </section>

</div>
</x-main>
