@php
    $locale  = app()->getLocale();
    $iAttrs  = method_exists($issue, 'getAttributes') ? $issue->getAttributes() : [];
    $iTitle  = $iAttrs['title_' . $locale] ?? ($iAttrs['title_uz'] ?? '');
    $journal = $issue->journal ?? null;
    $jName   = '';
    if ($journal) {
        $jAttrs = $journal->getAttributes();
        $jName = $jAttrs['name_' . $locale] ?? ($jAttrs['name_uz'] ?? '');
    }
    $heroBg = collect([
        'assets/img/banner3.jpg',
        'assets/img/banner1.jpg',
        'assets/img/banner4.jpg',
        'assets/img/aa.jpg',
    ])->first(fn($p) => file_exists(public_path($p)));
@endphp

<x-main title="{{ '№ '.$issue->number.' · '.$issue->year }}">
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
                @if($journal)
                    <span class="sep">—</span>
                    <a href="{{ route('journals_show', $journal->id) }}">{{ \Illuminate\Support\Str::limit($jName, 40) }}</a>
                @endif
                <span class="sep">—</span>
                <span>№ {{ $issue->number }} · {{ $issue->year }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('Jurnal soni') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $iTitle }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">№ {{ $issue->number }} &middot; {{ $issue->year }}</p>
        </div>
    </section>

    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            <div class="lx-issue-hero" data-aos="fade-up">
                <div class="lx-issue-hero-num">
                    <span class="lx-issue-hero-hash">№</span>
                    <span class="lx-issue-hero-number">{{ $issue->number }}</span>
                </div>
                <div class="lx-issue-hero-info">
                    <span class="lx-eyebrow">{{ $issue->year }}@if($issue->published_at) &nbsp;·&nbsp; {{ \Carbon\Carbon::parse($issue->published_at)->translatedFormat('d M Y') }}@endif</span>
                    <h2 class="lx-issue-hero-title">{{ $iTitle }}</h2>
                    <p class="lx-issue-hero-meta">{{ $papers->count() }} {{ __('maqola') }}</p>
                </div>
            </div>

            <div class="lx-doc-section-head" data-aos="fade-up" style="margin-top: 56px;">
                <span class="lx-eyebrow">{{ __('Mundarija') }}</span>
                <h3 class="lx-section-title" style="text-align: left; margin: 14px 0 0;">
                    {{ __('Maqolalar') }}
                </h3>
                <div class="lx-page-divider" style="margin: 22px 0 0; transform: none;"></div>
            </div>

            @if($papers->count())
                <div class="lx-papers-list">
                    @foreach($papers as $i => $paper)
                        @php
                            $pAttrs = method_exists($paper, 'getAttributes') ? $paper->getAttributes() : [];
                            $pTitle = $pAttrs['title_' . $locale] ?? ($pAttrs['title_uz'] ?? '');
                        @endphp
                        <a href="{{ route('journals_paper', $paper->id) }}"
                           class="lx-paper-row is-in"
                           data-aos="fade-up"
                           data-aos-delay="{{ ($i % 5) * 60 }}">
                            <span class="lx-paper-row-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="lx-paper-row-body">
                                <h4 class="lx-paper-row-title">{{ $pTitle }}</h4>
                                <div class="lx-paper-row-meta">
                                    @if($paper->author)
                                        <span class="lx-paper-row-author">{{ $paper->author }}</span>
                                    @endif
                                    <span class="lx-paper-row-views">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                        {{ $paper->views }}
                                    </span>
                                </div>
                            </div>
                            <span class="lx-paper-row-cta" aria-hidden="true">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                    <polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </span>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="lx-empty-state" data-aos="fade-up">
                    {{ __('Bu sonda maqola topilmadi') }}
                </div>
            @endif

            <div class="lx-back-wrap" data-aos="fade-up">
                @if($journal)
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
