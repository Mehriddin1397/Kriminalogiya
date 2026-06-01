@php
    $heroBg = collect([
        'assets/img/banner1.jpg',
        'assets/img/banner4.jpg',
        'assets/img/banner3.jpg',
        'assets/img/aa.jpg',
    ])->first(fn ($p) => file_exists(public_path($p)));

    $locale = app()->getLocale();

    $resolveName = function ($model) use ($locale) {
        if (!$model) return '';
        $attrs = method_exists($model, 'getAttributes') ? $model->getAttributes() : [];
        return $attrs['name_' . $locale] ?? ($attrs['name_uz'] ?? '');
    };

    $groups = [
        [
            'key'    => 'news',
            'label'  => __('lan.yangilik'),
            'items'  => $news ?? collect(),
            'route'  => fn($it) => route('news_show', $it->id),
            'icon'   => '<path d="M19 20H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="14 2 14 9 21 9"/><line x1="8" y1="13" x2="16" y2="13"/><line x1="8" y1="17" x2="14" y2="17"/>',
        ],
        [
            'key'    => 'articles',
            'label'  => __('lan.maqolalar') ?? 'Maqolalar',
            'items'  => $articles ?? collect(),
            'route'  => fn($it) => route('article_show', $it->id),
            'icon'   => '<path d="M4 4h12a2 2 0 0 1 2 2v14l-7-4-7 4V6a2 2 0 0 1 2-2z"/>',
        ],
        [
            'key'    => 'journals',
            'label'  => __('lan.jurnallar') ?? __('lan.ilm_jurnal') ?? 'Jurnallar',
            'items'  => $journals ?? collect(),
            'route'  => fn($it) => route('journal_show', $it->id),
            'icon'   => '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
        ],
        [
            'key'    => 'scholars',
            'label'  => __('lan.tadqiq') ?? __('lan.tadqiqotlar') ?? 'Tadqiqotlar',
            'items'  => $scholars ?? collect(),
            'route'  => fn($it) => route('scholar_show', $it->id),
            'icon'   => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
        ],
        [
            'key'    => 'researchs',
            'label'  => __('lan.ijti_ama_tad') ?? 'Tadqiqot loyihalari',
            'items'  => $researchs ?? collect(),
            'route'  => fn($it) => route('research_show', $it->id),
            'icon'   => '<circle cx="11" cy="11" r="8"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/><path d="m21 21-4.3-4.3"/>',
        ],
        [
            'key'    => 'bibliophilias',
            'label'  => __('lan.kitobxonlik') ?? "Kitoblar",
            'items'  => $bibliophilias ?? collect(),
            'route'  => fn($it) => route('bibliophilia_show', $it->id),
            'icon'   => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>',
        ],
        [
            'key'    => 'crimes',
            'label'  => __('lan.jinoyatlar') ?? 'Jinoyatlar',
            'items'  => $crimes ?? collect(),
            'route'  => fn($it) => route('crimes_show', $it->id),
            'icon'   => '<path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>',
        ],
        [
            'key'    => 'academias',
            'label'  => __('lan.ilm_dar_ber') ?? 'Akademik kengashlar',
            'items'  => $academias ?? collect(),
            'route'  => fn($it) => route('academia_show', $it->id),
            'icon'   => '<path d="M3 21h18M5 21V8l7-5 7 5v13M9 14h6M9 18h6"/>',
        ],
        [
            'key'    => 'rahbariyats',
            'label'  => __('lan.rahbariyat'),
            'items'  => $rahbariyats ?? collect(),
            'route'  => null, // modal-based
            'icon'   => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
        ],
    ];

    $totalCount = collect($groups)->sum(fn($g) => $g['items']->count());
@endphp

<x-main title="{{ __('lan.qidirish') }}: {{ $q }}">
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
                <span>{{ __('lan.qidirish') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.qidirish') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">
                {{ __('lan.seatch1') ?? 'Qidiruv natijalari' }}
            </h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ $totalCount }} {{ __('natija') }} &middot;
                <em>&ldquo;{{ $q }}&rdquo;</em>
            </p>
        </div>
    </section>

    {{-- ─────── Search bar (re-query) ─────── --}}
    <section class="lx-search-toolbar-section">
        <div class="container">
            <form class="lx-search-toolbar" action="{{ route('search') }}" method="get" data-aos="fade-up">
                <svg class="lx-search-toolbar-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.3-4.3"/>
                </svg>
                <input type="text" name="query"
                       class="lx-search-toolbar-input"
                       value="{{ $q }}"
                       placeholder="{{ __('lan.qidirish') }}…"
                       autocomplete="off"
                       required>
                <button type="submit" class="lx-search-toolbar-submit">
                    <span>{{ __('lan.qidirish') }}</span>
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </button>
            </form>
        </div>
    </section>

    {{-- ─────── Filter chips + results ─────── --}}
    <section class="lx-section lx-search-section">
        <div class="container">

            @if($totalCount > 0)
                <div class="lx-search-chips" data-aos="fade-up" data-lx-search-chips>
                    <button type="button" class="lx-search-chip is-active" data-lx-search-filter="all">
                        <span>{{ __('Hammasi') }}</span>
                        <span class="lx-search-chip-count">{{ $totalCount }}</span>
                    </button>
                    @foreach($groups as $group)
                        @if($group['items']->count())
                            <button type="button"
                                    class="lx-search-chip"
                                    data-lx-search-filter="{{ $group['key'] }}">
                                <span>{{ $group['label'] }}</span>
                                <span class="lx-search-chip-count">{{ $group['items']->count() }}</span>
                            </button>
                        @endif
                    @endforeach
                </div>

                <div class="lx-search-results">
                    @foreach($groups as $group)
                        @if($group['items']->count())
                            <div class="lx-search-group"
                                 data-lx-search-group="{{ $group['key'] }}"
                                 data-aos="fade-up">
                                <div class="lx-search-group-head">
                                    <span class="lx-search-group-icon" aria-hidden="true">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                            {!! $group['icon'] !!}
                                        </svg>
                                    </span>
                                    <h2 class="lx-search-group-title">{{ $group['label'] }}</h2>
                                    <span class="lx-search-group-count">{{ $group['items']->count() }}</span>
                                </div>

                                <div class="lx-search-list">
                                    @foreach($group['items'] as $i => $item)
                                        @php
                                            $photo  = $item->photos->first();
                                            $name   = $resolveName($item);
                                            $initial = mb_strtoupper(mb_substr(trim($name) ?: '?', 0, 1));
                                            $isRahbar = $group['key'] === 'rahbariyats';
                                            $url = $isRahbar ? '#' : ($group['route'] ? ($group['route'])($item) : '#');
                                        @endphp

                                        @if($isRahbar)
                                            <button type="button"
                                                    class="lx-search-row"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#bossModal{{ $item->id }}"
                                                    style="--d:{{ ($i % 5) * 50 }}ms">
                                                <span class="lx-search-row-thumb">
                                                    @if($photo)
                                                        <img src="{{ asset('storage/'.$photo->file_path) }}"
                                                             alt="{{ $name }}"
                                                             loading="lazy"
                                                             onerror="this.style.display='none'">
                                                    @else
                                                        <span class="lx-search-row-thumb-empty">{{ $initial }}</span>
                                                    @endif
                                                </span>
                                                <span class="lx-search-row-body">
                                                    <span class="lx-search-row-title">{{ $name }}</span>
                                                    @if(!empty($item->post))
                                                        <span class="lx-search-row-meta">{{ __('lan.lavozim') }}: {{ $item->post }}</span>
                                                    @endif
                                                </span>
                                                <span class="lx-search-row-cta" aria-hidden="true">
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <line x1="5" y1="12" x2="19" y2="12"/>
                                                        <polyline points="12 5 19 12 12 19"/>
                                                    </svg>
                                                </span>
                                            </button>

                                            {{-- Rahbar modal --}}
                                            <div class="modal fade" id="bossModal{{ $item->id }}" tabindex="-1" aria-labelledby="bossModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content rounded-3 shadow">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="bossModalLabel{{ $item->id }}">{{ $name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Yopish"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>{{ __('lan.telefon') }}:</strong> {{ $item->phone }}</p>
                                                            <p><strong>{{ __('lan.ish_jadvali') }}:</strong> {{ $item->worktime }}</p>
                                                            <p><strong>{{ __('lan.email') }}:</strong> {{ $item->email }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('lan.yopish') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{ $url }}"
                                               class="lx-search-row"
                                               style="--d:{{ ($i % 5) * 50 }}ms">
                                                <span class="lx-search-row-thumb">
                                                    @if($photo)
                                                        <img src="{{ asset('storage/'.$photo->file_path) }}"
                                                             alt="{{ $name }}"
                                                             loading="lazy"
                                                             onerror="this.style.display='none'">
                                                    @else
                                                        <span class="lx-search-row-thumb-empty">{{ $initial }}</span>
                                                    @endif
                                                </span>
                                                <span class="lx-search-row-body">
                                                    <span class="lx-search-row-title">{{ $name }}</span>
                                                    <span class="lx-search-row-meta">{{ $group['label'] }}</span>
                                                </span>
                                                <span class="lx-search-row-cta" aria-hidden="true">
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <line x1="5" y1="12" x2="19" y2="12"/>
                                                        <polyline points="12 5 19 12 12 19"/>
                                                    </svg>
                                                </span>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="lx-search-empty" data-aos="fade-up">
                    <span class="lx-search-empty-icon" aria-hidden="true">
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"/>
                            <path d="m21 21-4.3-4.3"/>
                            <line x1="8" y1="11" x2="14" y2="11"/>
                        </svg>
                    </span>
                    <h3 class="lx-search-empty-title">{{ __('Hech narsa topilmadi') }}</h3>
                    <p class="lx-search-empty-text">
                        &ldquo;<em>{{ $q }}</em>&rdquo; {{ __('bo‘yicha hech qanday natija topilmadi. Boshqa kalit so‘zlarni sinab ko‘ring.') }}
                    </p>
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

<script>
(function () {
    var chips  = document.querySelectorAll('[data-lx-search-filter]');
    var groups = document.querySelectorAll('[data-lx-search-group]');
    if (!chips.length) return;

    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            var filter = chip.getAttribute('data-lx-search-filter');
            chips.forEach(function (c) { c.classList.remove('is-active'); });
            chip.classList.add('is-active');

            groups.forEach(function (g) {
                var key = g.getAttribute('data-lx-search-group');
                if (filter === 'all' || filter === key) {
                    g.classList.remove('is-hidden');
                } else {
                    g.classList.add('is-hidden');
                }
            });
        });
    });
})();
</script>

</x-main>
