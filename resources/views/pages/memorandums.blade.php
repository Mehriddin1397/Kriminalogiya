<x-main title="{{ __('memorandums.title') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.xalqaro_hamkorlik') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.memorandumlar') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('memorandums.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('memorandums.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('memorandums.subtitle') }}</p>

            <x-intl-tabs active="memorandums" />
        </div>
    </section>

    {{-- ─────── Intro ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-bottom: 40px;">
        <div class="container">
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('memorandums.intro') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Hujjatlar grid ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-memo-grid">
                @foreach($items as $i => $item)
                    <div class="lx-memo-card" data-aos="fade-up" data-aos-delay="{{ ($i % 6) * 60 }}">
                        <div class="lx-memo-card-head">
                            <span class="lx-memo-card-flag" aria-hidden="true">
                                <x-flag-icon :code="$item['flag']" />
                            </span>
                            <span class="lx-memo-card-country">{{ $item['country'] }}</span>

                            @if($item['photos']->count())
                                <button type="button" class="lx-memo-card-gallery-btn"
                                        data-lx-memo-gallery="{{ $item['id'] }}"
                                        aria-label="{{ __('lan.fotogaler') ?? 'Rasmlar' }}">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                                        <circle cx="8.5" cy="8.5" r="1.5"/>
                                        <path d="m21 15-5-5L5 21"/>
                                    </svg>
                                </button>
                            @endif
                        </div>

                        @if($item['link'])
                            <a href="{{ $item['link'] }}" target="_blank" rel="noopener" class="lx-memo-card-org lx-memo-card-org-link">{{ $item['org'] }}</a>
                        @else
                            <p class="lx-memo-card-org">{{ $item['org'] }}</p>
                        @endif

                        <div class="lx-memo-card-footer">
                            <span class="lx-memo-badge lx-memo-badge-type is-{{ str_replace('_', '-', $item['doc_type']) }}">
                                {{ $item['doc_type_label'] }}
                            </span>
                            <span class="lx-memo-badge lx-memo-badge-date">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                                {{ $item['date_formatted'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Memorandum rasmlari — lightbox ─────── --}}
    <div class="lx-lightbox" id="lxMemoLightbox" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="lx-lightbox-backdrop" data-lx-gallery-close></div>

        <button type="button" class="lx-lightbox-close" data-lx-gallery-close aria-label="{{ __('lan.yopish') }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>

        <button type="button" class="lx-lightbox-nav prev" data-lx-gallery-prev aria-label="{{ __('Oldingi') }}">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
        </button>
        <button type="button" class="lx-lightbox-nav next" data-lx-gallery-next aria-label="{{ __('Keyingi') }}">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
        </button>

        <div class="lx-lightbox-counter" aria-live="polite">
            <span class="num current" data-lx-gallery-current>01</span>
            <span class="line"></span>
            <span class="num total" data-lx-gallery-total>01</span>
        </div>

        <div class="lx-lightbox-stage">
            <div class="lx-lightbox-spinner" data-lx-gallery-spinner aria-hidden="true">
                <span></span>
            </div>
            <img class="lx-lightbox-img" data-lx-gallery-img src="" alt="">
        </div>
    </div>

</div>
</x-main>

<script>
(function () {
    var sets = {!! json_encode(
        $items->mapWithKeys(function ($item) {
            return [$item['id'] => $item['photos']->map(function ($photo) {
                return asset('storage/' . $photo->file_path);
            })->values()];
        }),
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
    ) !!};

    var box     = document.getElementById('lxMemoLightbox');
    if (!box) return;
    var img     = box.querySelector('[data-lx-gallery-img]');
    var spinner = box.querySelector('[data-lx-gallery-spinner]');
    var currentEl = box.querySelector('[data-lx-gallery-current]');
    var totalEl   = box.querySelector('[data-lx-gallery-total]');
    var btnPrev   = box.querySelector('[data-lx-gallery-prev]');
    var btnNext   = box.querySelector('[data-lx-gallery-next]');
    var body      = document.body;

    var currentItems = [];
    var index = 0;

    function pad(n) { return n < 10 ? '0' + n : '' + n; }

    function render() {
        var src = currentItems[index];
        if (!src) return;
        spinner.classList.add('is-on');
        img.classList.remove('is-ready');
        var pre = new Image();
        pre.onload = function () {
            img.src = src;
            img.classList.add('is-ready');
            spinner.classList.remove('is-on');
        };
        pre.onerror = function () { spinner.classList.remove('is-on'); };
        pre.src = src;

        if (currentEl) currentEl.textContent = pad(index + 1);
        if (totalEl)   totalEl.textContent   = pad(currentItems.length);
    }

    function open(memoId) {
        currentItems = sets[memoId] || [];
        if (!currentItems.length) return;
        index = 0;
        box.classList.add('is-open');
        box.setAttribute('aria-hidden', 'false');
        body.classList.add('lx-no-scroll');
        render();
    }

    function close() {
        box.classList.remove('is-open');
        box.setAttribute('aria-hidden', 'true');
        body.classList.remove('lx-no-scroll');
    }

    function next() { index = (index + 1) % currentItems.length; render(); }
    function prev() { index = (index - 1 + currentItems.length) % currentItems.length; render(); }

    document.querySelectorAll('[data-lx-memo-gallery]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            open(btn.getAttribute('data-lx-memo-gallery'));
        });
    });

    box.querySelectorAll('[data-lx-gallery-close]').forEach(function (el) {
        el.addEventListener('click', close);
    });
    btnNext.addEventListener('click', next);
    btnPrev.addEventListener('click', prev);

    document.addEventListener('keydown', function (e) {
        if (!box.classList.contains('is-open')) return;
        if (e.key === 'Escape')     { e.preventDefault(); close(); }
        if (e.key === 'ArrowLeft')  { e.preventDefault(); prev(); }
        if (e.key === 'ArrowRight') { e.preventDefault(); next(); }
    });
})();
</script>
