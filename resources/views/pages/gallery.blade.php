@php
    $heroBg = collect([
        'assets/img/banner2.jpg',
        'assets/img/banner4.jpg',
        'assets/img/banner1.jpg',
        'assets/img/bg1.jpg',
    ])->first(fn ($p) => file_exists(public_path($p)));
    $locale = app()->getLocale();

    $galleryItems = $photos->map(function ($photo) use ($locale) {
        $news     = $photo->model;
        $newsName = '';
        $newsId   = null;
        if ($news) {
            $attrs    = method_exists($news, 'getAttributes') ? $news->getAttributes() : [];
            $newsName = $attrs['name_' . $locale] ?? ($attrs['name_uz'] ?? '');
            $newsId   = $news->id ?? null;
        }
        return [
            'src'   => asset('storage/' . $photo->file_path),
            'name'  => $newsName,
            'newsId'=> $newsId,
        ];
    })->values();
@endphp

<x-main title="{{ __('lan.fotogaler') ?? __('Fotogaleriya') }}">
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
                <span>{{ __('lan.fotogaler') ?? __('Fotogaleriya') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('Galereya') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.fotogaler') ?? __('Fotogaleriya') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ $photos->total() }}
                @if($photos->lastPage() > 1)
                    &middot; {{ $photos->currentPage() }} / {{ $photos->lastPage() }}
                @endif
            </p>
        </div>
    </section>

    {{-- ─────── Gallery grid ─────── --}}
    <section class="lx-section lx-gallery-section">
        <div class="container">

            @if($galleryItems->count())
                <div class="lx-gallery-grid" data-lx-gallery-grid>
                    @foreach($galleryItems as $i => $item)
                        <button type="button"
                                class="lx-gallery-tile"
                                data-lx-gallery-open="{{ $i }}"
                                data-aos="fade-up"
                                data-aos-delay="{{ ($i % 6) * 60 }}"
                                aria-label="{{ $item['name'] ?: 'Photo' }}">
                            <img src="{{ $item['src'] }}"
                                 alt="{{ $item['name'] }}"
                                 loading="lazy"
                                 onerror="this.parentElement.classList.add('is-broken')">
                            <span class="lx-gallery-tile-overlay" aria-hidden="true"></span>
                            <span class="lx-gallery-tile-zoom" aria-hidden="true">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"/>
                                    <path d="m21 21-4.3-4.3"/>
                                    <line x1="11" y1="8" x2="11" y2="14"/>
                                    <line x1="8" y1="11" x2="14" y2="11"/>
                                </svg>
                            </span>
                            @if($item['name'])
                                <span class="lx-gallery-tile-caption">
                                    {{ \Illuminate\Support\Str::limit($item['name'], 60) }}
                                </span>
                            @endif
                        </button>
                    @endforeach
                </div>

                @if($photos->lastPage() > 1)
                    <div class="lx-pagination" data-aos="fade-up">
                        {{ $photos->links('pagination::bootstrap-4') }}
                    </div>
                @endif
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

    {{-- ─────── Lightbox modal ─────── --}}
    <div class="lx-lightbox" id="lxLightbox" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="lx-lightbox-backdrop" data-lx-gallery-close></div>

        <button type="button" class="lx-lightbox-close" data-lx-gallery-close aria-label="{{ __('Yopish') }}">
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
            <span class="num total" data-lx-gallery-total>{{ str_pad($galleryItems->count(), 2, '0', STR_PAD_LEFT) }}</span>
        </div>

        <div class="lx-lightbox-stage">
            <div class="lx-lightbox-spinner" data-lx-gallery-spinner aria-hidden="true">
                <span></span>
            </div>
            <img class="lx-lightbox-img" data-lx-gallery-img src="" alt="">
        </div>

        <div class="lx-lightbox-foot">
            <span class="lx-lightbox-caption" data-lx-gallery-caption></span>
        </div>
    </div>

</div>

<script>
(function () {
    var items = {!! json_encode($galleryItems, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!};
    if (!items.length) return;

    var box       = document.getElementById('lxLightbox');
    var img       = box.querySelector('[data-lx-gallery-img]');
    var spinner   = box.querySelector('[data-lx-gallery-spinner]');
    var captionEl = box.querySelector('[data-lx-gallery-caption]');
    var currentEl = box.querySelector('[data-lx-gallery-current]');
    var totalEl   = box.querySelector('[data-lx-gallery-total]');
    var btnPrev   = box.querySelector('[data-lx-gallery-prev]');
    var btnNext   = box.querySelector('[data-lx-gallery-next]');
    var body      = document.body;

    var index = 0;

    function pad(n) { return n < 10 ? '0' + n : '' + n; }

    function render() {
        var item = items[index];
        if (!item) return;
        spinner.classList.add('is-on');
        img.classList.remove('is-ready');
        img.alt = item.name || '';
        var pre = new Image();
        pre.onload = function () {
            img.src = item.src;
            img.classList.add('is-ready');
            spinner.classList.remove('is-on');
        };
        pre.onerror = function () {
            spinner.classList.remove('is-on');
        };
        pre.src = item.src;

        if (captionEl) captionEl.textContent = item.name || '';
        if (currentEl) currentEl.textContent = pad(index + 1);
        if (totalEl)   totalEl.textContent   = pad(items.length);
    }

    function open(i) {
        index = ((i % items.length) + items.length) % items.length;
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

    function next() { index = (index + 1) % items.length; render(); }
    function prev() { index = (index - 1 + items.length) % items.length; render(); }

    document.querySelectorAll('[data-lx-gallery-open]').forEach(function (tile) {
        tile.addEventListener('click', function () {
            var i = parseInt(tile.getAttribute('data-lx-gallery-open'), 10) || 0;
            open(i);
        });
    });

    box.querySelectorAll('[data-lx-gallery-close]').forEach(function (el) {
        el.addEventListener('click', close);
    });
    btnNext.addEventListener('click', next);
    btnPrev.addEventListener('click', prev);

    document.addEventListener('keydown', function (e) {
        if (!box.classList.contains('is-open')) return;
        if (e.key === 'Escape')    { e.preventDefault(); close(); }
        if (e.key === 'ArrowLeft') { e.preventDefault(); prev(); }
        if (e.key === 'ArrowRight'){ e.preventDefault(); next(); }
    });

    // Touch swipe
    var startX = null;
    var stage  = box.querySelector('.lx-lightbox-stage');
    if (stage) {
        stage.addEventListener('touchstart', function (e) {
            if (e.touches.length === 1) startX = e.touches[0].clientX;
        }, { passive: true });
        stage.addEventListener('touchend', function (e) {
            if (startX === null) return;
            var endX = (e.changedTouches[0] || {}).clientX;
            var dx = endX - startX;
            startX = null;
            if (Math.abs(dx) < 40) return;
            if (dx < 0) next(); else prev();
        });
    }
})();
</script>

</x-main>
