@php
    if (!function_exists('toEmbedLink')) {
        function toEmbedLink($url) {
            if (empty($url)) return null;
            $parts = parse_url($url);
            if (isset($parts['query'])) {
                parse_str($parts['query'], $query);
                if (isset($query['v'])) {
                    return 'https://www.youtube.com/embed/' . $query['v'];
                }
            }
            if (isset($parts['host']) && $parts['host'] === 'youtu.be') {
                return 'https://www.youtube.com/embed' . $parts['path'];
            }
            return null;
        }
    }
    $embedLink = toEmbedLink($new->youtube_link ?? null);
@endphp

<x-main title="{{$category->slug}}">
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
                <a href="{{ route('categoryId', $category->id) }}">{{ $category->slug }}</a>
                <span class="sep">—</span>
                <span>{{ \Illuminate\Support\Str::limit($new->name, 50) }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ $category->slug }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $new->name }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ $new->created_at?->format('d.m.Y') }}
            </p>
        </div>
    </section>

    {{-- ─────── Article body ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <article class="lx-article">

                {{-- Gallery --}}
                <div class="lx-article-gallery" data-aos="fade-up" data-lx-gallery>
                    <div class="lx-gallery-track">
                        @if($new->photos->count())
                            @foreach($new->photos as $i => $photo)
                                <div class="lx-gallery-slide {{ $i === 0 ? 'is-active' : '' }}" data-index="{{ $i }}">
                                    <img src="{{ asset('storage/'.$photo->file_path) }}"
                                         alt="{{ $new->name }}"
                                         loading="{{ $i === 0 ? 'eager' : 'lazy' }}"
                                         onerror="this.style.display='none'">
                                </div>
                            @endforeach
                        @else
                            <div class="lx-gallery-empty"><span>Kriminalogiya</span></div>
                        @endif
                    </div>

                    @if($new->photos->count() > 1)
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
                            @foreach($new->photos as $i => $photo)
                                <button type="button"
                                        class="lx-gallery-dot {{ $i === 0 ? 'is-active' : '' }}"
                                        data-lx-gallery-dot="{{ $i }}"
                                        aria-label="{{ $i + 1 }} / {{ $new->photos->count() }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Lead paragraph --}}
                @if(!empty($new->name_uz))
                    <p class="lx-article-lead" data-aos="fade-up">
                        {{ $new->name }}
                    </p>
                @endif
                <p class="lx-article-lead" data-aos="fade-up">
                    {{ $new->purpose }}
                </p>
                <p class="lx-article-lead" data-aos="fade-up">
                    {{ $new->tasks }}
                </p>
                <p class="lx-article-lead" data-aos="fade-up">
                    {{ $new->expected_results }}
                </p>
                <p class="lx-article-lead" data-aos="fade-up">
                    {{ $new->leader }}
                </p>

                {{-- Body (rich text) --}}
                <div class="lx-article-body" data-aos="fade-up">
                    {!! $new->description !!}
                </div>

                {{-- YouTube embed --}}
                @if($embedLink)
                    <div class="lx-article-video" data-aos="fade-up">
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="{{ $embedLink }}"
                                title="YouTube video"
                                allowfullscreen
                                loading="lazy"></iframe>
                        </div>
                    </div>
                @endif

                {{-- Share strip --}}
                @isset($contact)
                    <div class="lx-article-share" data-aos="fade-up">
                        <span class="lx-article-share-label">{{ __('lan.boglanish') ?? 'Bog\'lanish' }}</span>
                        @if(!empty($contact->telegram_link))
                            <a href="{{ $contact->telegram_link }}" target="_blank" rel="noopener" class="lx-social-link" aria-label="Telegram">
                                <i class="fab fa-telegram"></i>
                            </a>
                        @endif
                        @if(!empty($contact->facebook_link))
                            <a href="{{ $contact->facebook_link }}" target="_blank" rel="noopener" class="lx-social-link" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(!empty($contact->youtube_link))
                            <a href="{{ $contact->youtube_link }}" target="_blank" rel="noopener" class="lx-social-link" aria-label="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        @endif
                        @if(!empty($contact->whatsapp_link))
                            <a href="{{ $contact->whatsapp_link }}" target="_blank" rel="noopener" class="lx-social-link" aria-label="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        @endif
                    </div>
                @endisset

                {{-- Foot CTAs --}}
                <div class="lx-article-foot" data-aos="fade-up">
                    <a href="{{ route('categoryId', $category->id) }}" class="lx-btn lx-btn-dark">
                        <span class="arrow-back">&larr;</span>
                        <span>{{ __('lan.ortga') }}</span>
                    </a>
                    <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                        <span>{{ __('lan.bosh') }}</span>
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
