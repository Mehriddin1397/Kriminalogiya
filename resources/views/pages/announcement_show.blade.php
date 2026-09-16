<x-main title="{{ $announcement->title }}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    @php
        $heroBg = collect([
            'assets/img/banner3.jpg',
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));
    @endphp

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
                <a href="{{ route('main') }}">{{ __('lan.bosh_sahifa') ?? 'Bosh sahifa' }}</a>
                <span class="sep">—</span>
                <span>{{ \Illuminate\Support\Str::limit($announcement->title, 50) }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.elonlar') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $announcement->title }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ $announcement->created_at?->format('d.m.Y') }}
            </p>
        </div>
    </section>

    {{-- ─────── Announcement body ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <article class="lx-article">

                {{-- Gallery --}}
                <div class="lx-article-gallery" data-aos="fade-up" data-lx-gallery>
                    <div class="lx-gallery-track">
                        @if($announcement->photos->count())
                            @foreach($announcement->photos as $i => $photo)
                                <div class="lx-gallery-slide {{ $i === 0 ? 'is-active' : '' }}" data-index="{{ $i }}">
                                    <img src="{{ asset('storage/'.$photo->file_path) }}"
                                         alt="{{ $announcement->title }}"
                                         loading="{{ $i === 0 ? 'eager' : 'lazy' }}"
                                         onerror="this.style.display='none'">
                                </div>
                            @endforeach
                        @else
                            <div class="lx-gallery-empty"><span>KTI</span></div>
                        @endif
                    </div>

                    @if($announcement->photos->count() > 1)
                        <button type="button" class="lx-gallery-nav prev" data-lx-gallery-prev aria-label="Oldingi rasm">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path d="M15 18l-6-6 6-6"/>
                            </svg>
                        </button>
                        <button type="button" class="lx-gallery-nav next" data-lx-gallery-next aria-label="Keyingi rasm">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path d="M9 18l6-6-6-6"/>
                            </svg>
                        </button>
                        <div class="lx-gallery-dots">
                            @foreach($announcement->photos as $i => $photo)
                                <button type="button"
                                        class="lx-gallery-dot {{ $i === 0 ? 'is-active' : '' }}"
                                        data-lx-gallery-dot="{{ $i }}"
                                        aria-label="{{ $i + 1 }} / {{ $announcement->photos->count() }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Body --}}
                <div class="lx-article-body" data-aos="fade-up">
                    {!! nl2br(e($announcement->description)) !!}
                </div>

                {{-- Foot CTAs --}}
                <div class="lx-article-foot" data-aos="fade-up">
                    <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                        <span class="arrow-back">&larr;</span>
                        <span>{{ __('lan.bosh_sahifa') }}</span>
                    </a>
                </div>

            </article>
        </div>
    </section>

</div>

{{-- Gallery JS --}}
<script>
(function () {
    document.querySelectorAll('[data-lx-gallery]').forEach(function (gallery) {
        var slides = gallery.querySelectorAll('.lx-gallery-slide');
        var dots   = gallery.querySelectorAll('.lx-gallery-dot');
        if (slides.length < 2) return;

        var current = 0;
        var timer = null;
        var AUTO_DELAY = 6000;

        function setActive(idx) {
            current = (idx + slides.length) % slides.length;
            slides.forEach(function (s, i) { s.classList.toggle('is-active', i === current); });
            dots.forEach(function (d, i) { d.classList.toggle('is-active', i === current); });
        }
        function next() { setActive(current + 1); }
        function prev() { setActive(current - 1); }

        function startAuto() {
            stopAuto();
            timer = setInterval(next, AUTO_DELAY);
        }
        function stopAuto() {
            if (timer) { clearInterval(timer); timer = null; }
        }

        var pBtn = gallery.querySelector('[data-lx-gallery-prev]');
        var nBtn = gallery.querySelector('[data-lx-gallery-next]');
        if (pBtn) pBtn.addEventListener('click', function () { prev(); startAuto(); });
        if (nBtn) nBtn.addEventListener('click', function () { next(); startAuto(); });

        dots.forEach(function (d) {
            d.addEventListener('click', function () {
                setActive(parseInt(d.getAttribute('data-lx-gallery-dot'), 10) || 0);
                startAuto();
            });
        });

        gallery.addEventListener('mouseenter', stopAuto);
        gallery.addEventListener('mouseleave', startAuto);

        gallery.setAttribute('tabindex', '0');
        gallery.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowLeft')  { prev(); startAuto(); }
            if (e.key === 'ArrowRight') { next(); startAuto(); }
        });

        startAuto();
    });
})();
</script>

</x-main>
