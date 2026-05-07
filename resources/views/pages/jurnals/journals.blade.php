<x-main title="{{ __('lan.ilm_jurnal') }}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    @php
        $heroBg = collect([
            'assets/img/banner3.jpg',
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
        ])->first(fn($p) => file_exists(public_path($p)));
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
                <span>{{ __('lan.ilm_jurnal') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.ilm_jurnal') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.ilm_jurnal') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ $journals->count() }}</p>
        </div>
    </section>

    {{-- ─────── Journals shelf ─────── --}}
    <section class="lx-section lx-journals-section">
        <div class="container">

            @if($journals->count())
                <div class="lx-journals-grid">
                    @foreach($journals as $i => $journal)
                        @php
                            $cover    = $journal->photos->first();
                            $attrs    = method_exists($journal, 'getAttributes') ? $journal->getAttributes() : [];
                            $locale   = app()->getLocale();
                            $name     = $attrs['name_' . $locale] ?? ($attrs['name_uz'] ?? '');
                            $descRaw  = $attrs['description_' . $locale] ?? ($attrs['description_uz'] ?? '');
                            $desc     = trim(strip_tags($descRaw));
                            $eIssn    = $journal->getAttributes()['e_issn'] ?? null;
                            $initial  = mb_strtoupper(mb_substr(trim($name) ?: '?', 0, 1));
                        @endphp

                        <a href="{{ route('journals_show', $journal->id) }}"
                           class="lx-journal-card"
                           data-aos="fade-up"
                           data-aos-delay="{{ ($i % 3) * 100 }}">

                            <div class="lx-journal-cover {{ $cover ? '' : 'no-cover' }}">
                                <span class="lx-journal-spine" aria-hidden="true"></span>
                                <span class="lx-journal-shine" aria-hidden="true"></span>

                                @if($cover)
                                    <img class="lx-journal-cover-img"
                                         src="{{ asset('storage/'.$cover->file_path) }}"
                                         alt="{{ $name }}"
                                         loading="lazy"
                                         onerror="this.style.display='none'; this.parentElement.classList.add('no-cover');">
                                @endif

                                <div class="lx-journal-cover-fallback">
                                    <span class="lx-journal-cover-mark">KTI</span>
                                    <span class="lx-journal-cover-letter">{{ $initial }}</span>
                                </div>

                                <div class="lx-journal-cover-overlay" aria-hidden="true"></div>

                                @if($eIssn)
                                    <span class="lx-journal-issn">e-ISSN&nbsp;{{ $eIssn }}</span>
                                @endif

                                <span class="lx-journal-cover-badge" aria-hidden="true">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                                    </svg>
                                </span>
                            </div>

                            <div class="lx-journal-meta">
                                <span class="lx-eyebrow">{{ __('lan.ilm_jurnal') }}</span>
                                <h3 class="lx-journal-title">{{ $name }}</h3>
                                @if($desc !== '')
                                    <p class="lx-journal-desc">{{ \Illuminate\Support\Str::limit($desc, 140) }}</p>
                                @endif

                                <span class="lx-journal-cta">
                                    <span>{{ __('lan.batafsil') }}</span>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"/>
                                        <polyline points="12 5 19 12 12 19"/>
                                    </svg>
                                </span>
                            </div>
                        </a>
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
