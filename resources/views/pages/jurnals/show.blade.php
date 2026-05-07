@php
    $jAttrs   = method_exists($journal, 'getAttributes') ? $journal->getAttributes() : [];
    $locale   = app()->getLocale();
    $jName    = $jAttrs['name_' . $locale] ?? ($jAttrs['name_uz'] ?? '');
    $jDescRaw = $jAttrs['description_' . $locale] ?? ($jAttrs['description_uz'] ?? '');
    $jDesc    = trim($jDescRaw);
    $eIssn    = $jAttrs['e_issn'] ?? null;
    $cover    = $journal->photos->first();
    $initial  = mb_strtoupper(mb_substr(trim($jName) ?: '?', 0, 1));
    $heroBg   = collect([
        'assets/img/banner3.jpg',
        'assets/img/banner1.jpg',
        'assets/img/banner4.jpg',
        'assets/img/aa.jpg',
    ])->first(fn($p) => file_exists(public_path($p)));
@endphp

<x-main title="{{ $jName }}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
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
                <span class="sep">—</span>
                <span>{{ \Illuminate\Support\Str::limit($jName, 60) }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.ilm_jurnal') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $jName }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ $journal->issues->count() }}</p>
        </div>
    </section>

    {{-- ─────── Journal hero (cover + info) ─────── --}}
    <section class="lx-section lx-journal-detail-section">
        <div class="container">
            <div class="lx-journal-detail">

                <div class="lx-journal-detail-cover" data-aos="fade-right">
                    <div class="lx-journal-cover {{ $cover ? '' : 'no-cover' }} is-detail">
                        <span class="lx-journal-spine" aria-hidden="true"></span>
                        <span class="lx-journal-shine" aria-hidden="true"></span>

                        @if($cover)
                            <img class="lx-journal-cover-img"
                                 src="{{ asset('storage/'.$cover->file_path) }}"
                                 alt="{{ $jName }}"
                                 loading="eager"
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
                    </div>
                </div>

                <div class="lx-journal-detail-info" data-aos="fade-left">
                    <span class="lx-eyebrow">{{ __('lan.ilm_jurnal') }}</span>
                    <h2 class="lx-journal-detail-title">{{ $jName }}</h2>

                    <div class="lx-journal-detail-divider"></div>

                    @if($jDesc !== '')
                        <div class="lx-journal-detail-desc">
                            {!! $jDesc !!}
                        </div>
                    @endif

                    <div class="lx-journal-detail-stats">
                        @if($eIssn)
                            <div class="lx-journal-stat">
                                <span class="lx-journal-stat-label">e-ISSN</span>
                                <span class="lx-journal-stat-value">{{ $eIssn }}</span>
                            </div>
                        @endif
                        <div class="lx-journal-stat">
                            <span class="lx-journal-stat-label">{{ __('lan.ilm_jurnal') }} {{ __('Sonlar') }}</span>
                            <span class="lx-journal-stat-value">{{ $journal->issues->count() }}</span>
                        </div>
                    </div>

                    <div class="lx-journal-detail-actions">
                        @if(!empty($jAttrs['file_path']))
                            <a href="{{ asset('storage/'.$jAttrs['file_path']) }}"
                               target="_blank" rel="noopener"
                               class="lx-btn lx-btn-dark">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="7 10 12 15 17 10"/>
                                    <line x1="12" y1="15" x2="12" y2="3"/>
                                </svg>
                                <span>{{ __('PDF') }}</span>
                            </a>
                        @endif
                        @if($journal->issues->count())
                            <a href="#issuesGrid" class="lx-btn lx-btn-outline">
                                <span>{{ __('Sonlarni ko‘rish') }}</span>
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <polyline points="19 12 12 19 5 12"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ─────── Issues grid ─────── --}}
    @if($journal->issues->count())
        <section class="lx-section lx-journal-issues-section" id="issuesGrid">
            <div class="container">
                <div class="lx-doc-section-head" data-aos="fade-up">
                    <span class="lx-eyebrow">{{ __('Arxiv') }}</span>
                    <h2 class="lx-section-title" style="text-align: left; margin: 14px 0 0;">
                        {{ __('Jurnal sonlari') }}
                    </h2>
                    <div class="lx-page-divider" style="margin: 22px 0 0; transform: none;"></div>
                </div>

                <div class="lx-issue-grid">
                    @foreach($journal->issues as $i => $issue)
                        @php
                            $iAttrs = method_exists($issue, 'getAttributes') ? $issue->getAttributes() : [];
                            $iTitle = $iAttrs['title_' . $locale] ?? ($iAttrs['title_uz'] ?? '');
                            $papersCount = $issue->papers->count();
                        @endphp

                        <button type="button"
                                class="lx-issue-card"
                                data-issue-id="{{ $issue->id }}"
                                data-aos="fade-up"
                                data-aos-delay="{{ ($i % 4) * 80 }}">
                            <div class="lx-issue-card-num">
                                <span class="lx-issue-card-hash">№</span>
                                <span class="lx-issue-card-number">{{ $issue->number }}</span>
                            </div>
                            <div class="lx-issue-card-body">
                                <span class="lx-issue-card-year">{{ $issue->year }}</span>
                                <h4 class="lx-issue-card-title">{{ $iTitle }}</h4>
                                <span class="lx-issue-card-meta">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                        <polyline points="14 2 14 8 20 8"/>
                                    </svg>
                                    {{ $papersCount }} {{ __('maqola') }}
                                </span>
                            </div>
                            <span class="lx-issue-card-arrow" aria-hidden="true">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                    <polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </span>
                        </button>
                    @endforeach
                </div>

                <div id="papersPanel" class="lx-papers-panel" data-aos="fade-up">
                    <div class="lx-papers-panel-empty">
                        <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                        </svg>
                        <p>{{ __('Maqolalarni ko‘rish uchun yuqoridan jurnal sonini tanlang') }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <div class="lx-section" style="padding-top: 0; background: var(--lx-cream);">
        <div class="container">
            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('journals_index') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.ortga') }}</span>
                </a>
            </div>
        </div>
    </div>

</div>

@php
    $issuesPayload = $journal->issues->load('papers')->map(function ($i) use ($locale) {
        $iAttrs = $i->getAttributes();
        return [
            'id'     => $i->id,
            'number' => $i->number,
            'year'   => $i->year,
            'title'  => $iAttrs['title_' . $locale] ?? ($iAttrs['title_uz'] ?? ''),
            'papers' => $i->papers->map(function ($p) use ($locale) {
                $pAttrs = $p->getAttributes();
                return [
                    'id'     => $p->id,
                    'title'  => $pAttrs['title_' . $locale] ?? ($pAttrs['title_uz'] ?? ''),
                    'author' => $p->author,
                    'views'  => $p->views,
                ];
            })->values()->all(),
        ];
    })->values()->all();
    $paperRouteTpl = route('journals_paper', ['paper' => '__ID__']);
@endphp
<script>
(function () {
    var issues = {!! json_encode($issuesPayload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!};

    var panel  = document.getElementById('papersPanel');
    var cards  = document.querySelectorAll('.lx-issue-card');
    var paperRoute = {!! json_encode($paperRouteTpl) !!};

    function renderPapers(issue) {
        if (!issue || !issue.papers.length) {
            panel.innerHTML = '<div class="lx-empty-state">{{ __('Bu sonda maqola topilmadi') }}</div>';
            return;
        }

        var head = '<div class="lx-papers-head">' +
                       '<span class="lx-eyebrow">№ ' + issue.number + ' · ' + issue.year + '</span>' +
                       '<h3 class="lx-papers-head-title">' + (issue.title || '') + '</h3>' +
                       '<span class="lx-papers-head-count">' + issue.papers.length + ' {{ __('maqola') }}</span>' +
                   '</div>';

        var list = '<div class="lx-papers-list">';
        issue.papers.forEach(function (paper, idx) {
            var url = paperRoute.replace('__ID__', paper.id);
            list += '<a href="' + url + '" class="lx-paper-row" style="--d:' + (idx * 60) + 'ms">' +
                        '<span class="lx-paper-row-num">' + String(idx + 1).padStart(2, '0') + '</span>' +
                        '<div class="lx-paper-row-body">' +
                            '<h4 class="lx-paper-row-title">' + (paper.title || '') + '</h4>' +
                            '<div class="lx-paper-row-meta">' +
                                (paper.author ? '<span class="lx-paper-row-author">' + paper.author + '</span>' : '') +
                                '<span class="lx-paper-row-views">' +
                                    '<svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>' +
                                    paper.views +
                                '</span>' +
                            '</div>' +
                        '</div>' +
                        '<span class="lx-paper-row-cta" aria-hidden="true">' +
                            '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>' +
                        '</span>' +
                    '</a>';
        });
        list += '</div>';

        panel.innerHTML = head + list;

        // Trigger reveal animation
        requestAnimationFrame(function () {
            panel.querySelectorAll('.lx-paper-row').forEach(function (el) {
                el.classList.add('is-in');
            });
        });
    }

    cards.forEach(function (card) {
        card.addEventListener('click', function () {
            cards.forEach(function (c) { c.classList.remove('is-active'); });
            card.classList.add('is-active');
            var id = parseInt(card.getAttribute('data-issue-id'), 10);
            var issue = issues.find(function (x) { return x.id === id; });
            renderPapers(issue);
            // Smooth scroll to panel
            setTimeout(function () {
                panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 80);
        });
    });
})();
</script>

</x-main>
