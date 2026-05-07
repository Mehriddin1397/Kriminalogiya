@php
    $locale = app()->getLocale();
    $pAttrs = method_exists($paper, 'getAttributes') ? $paper->getAttributes() : [];
    $pTitle = $pAttrs['title_' . $locale] ?? ($pAttrs['title_uz'] ?? '');
    $pDescRaw = $pAttrs['description_' . $locale] ?? ($pAttrs['description_uz'] ?? '');
    $pDesc  = trim(strip_tags($pDescRaw));
    $jName  = '';
    if (!empty($journal)) {
        $jAttrs = $journal->getAttributes();
        $jName  = $jAttrs['name_' . $locale] ?? ($jAttrs['name_uz'] ?? '');
    }
    $issue  = $paper->issue ?? null;
    $heroBg = collect([
        'assets/img/banner3.jpg',
        'assets/img/banner1.jpg',
        'assets/img/banner4.jpg',
        'assets/img/aa.jpg',
    ])->first(fn($p) => file_exists(public_path($p)));
    $pdfUrl = $paper->pdf_file ? asset('storage/'.$paper->pdf_file) : null;
@endphp

<x-main title="{{ $pTitle }}">
<div class="home-luxury">

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
                <a href="{{ route('journals_index') }}">{{ __('lan.ilm_jurnal') }}</a>
                @if(!empty($journal))
                    <span class="sep">—</span>
                    <a href="{{ route('journals_show', $journal->id) }}">{{ \Illuminate\Support\Str::limit($jName, 30) }}</a>
                @endif
                @if($issue)
                    <span class="sep">—</span>
                    <span>№ {{ $issue->number }} · {{ $issue->year }}</span>
                @endif
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('Maqola') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $pTitle }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>

            <div class="lx-paper-hero-meta" data-aos="fade-up">
                @if($paper->author)
                    <span class="lx-paper-hero-meta-item">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        {{ $paper->author }}
                    </span>
                @endif
                <span class="lx-paper-hero-meta-item">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                    {{ $paper->views }} {{ __('ko‘rishlar') }}
                </span>
                @if($issue)
                    <span class="lx-paper-hero-meta-item">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        № {{ $issue->number }} · {{ $issue->year }}
                    </span>
                @endif
            </div>
        </div>
    </section>

    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            @if($pDesc !== '')
                <div class="lx-paper-abstract" data-aos="fade-up">
                    <span class="lx-paper-abstract-mark" aria-hidden="true">&ldquo;</span>
                    <span class="lx-eyebrow">{{ __('Annotatsiya') }}</span>
                    <div class="lx-paper-abstract-body">
                        {!! $pDescRaw !!}
                    </div>
                </div>
            @endif

            <div class="lx-paper-toolbar" data-aos="fade-up">
                <div class="lx-paper-toolbar-info">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                    </svg>
                    <span>{{ __('PDF hujjat') }}</span>
                </div>
                @if($pdfUrl)
                    <div class="lx-paper-toolbar-actions">
                        <a href="{{ $pdfUrl }}" target="_blank" rel="noopener" class="lx-btn lx-btn-outline">
                            <span>{{ __('Yangi oynada') }}</span>
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                <polyline points="15 3 21 3 21 9"/>
                                <line x1="10" y1="14" x2="21" y2="3"/>
                            </svg>
                        </a>
                        <a href="{{ $pdfUrl }}" download class="lx-btn lx-btn-dark">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="7 10 12 15 17 10"/>
                                <line x1="12" y1="15" x2="12" y2="3"/>
                            </svg>
                            <span>{{ __('Yuklab olish') }}</span>
                        </a>
                    </div>
                @endif
            </div>

            @if($pdfUrl)
                <div class="lx-paper-pdf-frame" data-aos="fade-up">
                    <iframe src="{{ $pdfUrl }}" loading="lazy" title="{{ $pTitle }}"></iframe>
                </div>
            @else
                <div class="lx-empty-state" data-aos="fade-up">
                    {{ __('PDF hujjat mavjud emas') }}
                </div>
            @endif

            <div class="lx-back-wrap" data-aos="fade-up">
                @if($issue)
                    <a href="{{ route('journals_issue', $issue->id) }}" class="lx-btn lx-btn-dark">
                        <span class="arrow-back">&larr;</span>
                        <span>{{ __('lan.ortga') }}</span>
                    </a>
                @elseif(!empty($journal))
                    <a href="{{ route('journals_show', $journal->id) }}" class="lx-btn lx-btn-dark">
                        <span class="arrow-back">&larr;</span>
                        <span>{{ __('lan.ortga') }}</span>
                    </a>
                @else
                    <a href="{{ route('journals_index') }}" class="lx-btn lx-btn-dark">
                        <span class="arrow-back">&larr;</span>
                        <span>{{ __('lan.ortga') }}</span>
                    </a>
                @endif
            </div>
        </div>
    </section>

</div>
</x-main>
