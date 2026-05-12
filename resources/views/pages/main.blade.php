<x-main title="Bosh sahifa">
<div class="home-luxury">

    {{-- ─────── Hero / Custom luxury slider ─────── --}}
    @php
        $lxHeroSlides = ['1.6.png','1.2.png','1.4.png','1.3.png','1.1.png','1.5.png'];
        $lxHeroTotal = count($lxHeroSlides);
    @endphp

    <section class="lx-hero" data-lx-hero>

        <div class="lx-hero-slider">
            @foreach ($lxHeroSlides as $i => $img)
                <div class="lx-hero-slide {{ $i === 0 ? 'is-active' : '' }}"
                     style="background-image: url('{{ asset('img/'.$img) }}');"
                     data-index="{{ $i }}"
                     aria-hidden="{{ $i === 0 ? 'false' : 'true' }}"></div>
            @endforeach
        </div>

        {{-- Slide counter (yuqori chap) --}}
        <div class="lx-hero-counter" aria-hidden="true">
            <span class="num current" data-lx-hero-current>01</span>
            <span class="line"></span>
            <span class="num total">{{ str_pad($lxHeroTotal, 2, '0', STR_PAD_LEFT) }}</span>
        </div>

        {{-- Vertikal indikatorlar (o'ng tomon) --}}
        <div class="lx-hero-indicators" role="tablist" aria-label="Hero slider">
            @foreach ($lxHeroSlides as $i => $img)
                <button type="button"
                        class="lx-hero-indicator {{ $i === 0 ? 'is-active' : '' }}"
                        role="tab"
                        aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $i + 1 }}"
                        data-lx-hero-go="{{ $i }}"></button>
            @endforeach
        </div>

        {{-- Prev / Next arrows --}}
        <button type="button" class="lx-hero-arrow prev" data-lx-hero-prev aria-label="Oldingi">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
        </button>
        <button type="button" class="lx-hero-arrow next" data-lx-hero-next aria-label="Keyingi">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                <path d="M9 18l6-6-6-6"/>
            </svg>
        </button>

        {{-- Markazda kontent --}}
        <div class="lx-hero-content">
            <div class="lx-hero-divider">
                <span>{{ __('lan.kriminalog') }}</span>
            </div>

            <h1 class="lx-hero-title">
                {{ __('lan.kriminalog') }}
                <br>
                <em>{{ __('lan.ins_haq') }}</em>
            </h1>

            <p class="lx-hero-sub">
                @if(!empty($contact?->address)) {{ $contact->address }} @endif
            </p>

            <div class="lx-hero-cta">
                <a href="{{ route('boss') }}" class="lx-btn">
                    <span>{{ __('lan.batafsil') }}</span>
                    <span class="arrow">&rarr;</span>
                </a>
            </div>
        </div>

        {{-- Pastki progress bar --}}
        <div class="lx-hero-progress" aria-hidden="true">
            <div class="bar" data-lx-hero-progress></div>
        </div>

        {{-- Scroll hint --}}
        <div class="lx-scroll-hint">
            <span>Pastga</span>
            <div class="lx-line"></div>
        </div>
    </section>

    {{-- ─────── Ilmiy salohiyat (statistika) ─────── --}}
    @php
        $lxStats = [
            [
                'value' => 56, 'suffix' => '',
                'label' => __('Fan doktori (DSc)'),
                'icon'  => 'dsc',
            ],
            [
                'value' => 117, 'suffix' => '',
                'label' => __('Falsafa doktori (PhD)'),
                'icon'  => 'phd',
            ],
            [
                'value' => 75, 'suffix' => '%',
                'label' => __('Ilmiy darajaga ega'),
                'icon'  => 'percent',
            ],
            [
                'value' => 40, 'suffix' => '',
                'label' => __('Professor'),
                'icon'  => 'professor',
            ],
            [
                'value' => 99, 'suffix' => '',
                'label' => __('Dotsent'),
                'icon'  => 'dotsent',
            ],
        ];
    @endphp

    <section class="lx-stats-section" data-lx-stats>
        <div class="lx-stats-bg" aria-hidden="true">
            <img src="{{ asset('assets/img/banner1.jpg') }}" alt="" loading="lazy">
        </div>
        <div class="lx-stats-decor" aria-hidden="true">
            <img src="{{ asset('assets/img/kti-logo.png') }}" alt="">
        </div>

        <div class="container">
            <div class="lx-stats-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('Statistika') }}</span>
                <h2 class="lx-stats-title">{{ __('Institut ilmiy salohiyati') }}</h2>
                <div class="lx-stats-divider"></div>
            </div>

            <div class="lx-stats-grid">
                @foreach($lxStats as $i => $stat)
                    <div class="lx-stat-card"
                         data-aos="fade-up"
                         data-aos-delay="{{ $i * 110 }}">
                        <div class="lx-stat-card-icon" aria-hidden="true">
                            @switch($stat['icon'])
                                @case('dsc')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M32 8 6 20l26 12 26-12z"/>
                                        <path d="M14 24v12c0 5 8 9 18 9s18-4 18-9V24"/>
                                        <path d="M56 20v14"/>
                                        <circle cx="56" cy="38" r="2.4" fill="currentColor" stroke="none"/>
                                    </svg>
                                    @break
                                @case('phd')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="32" cy="22" r="9"/>
                                        <path d="M14 50c2-8 9-13 18-13s16 5 18 13"/>
                                        <path d="M20 14l24-4 6 6-24 4z"/>
                                        <path d="M44 10l2 8"/>
                                    </svg>
                                    @break
                                @case('percent')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="32" cy="32" r="22"/>
                                        <line x1="22" y1="42" x2="42" y2="22"/>
                                        <circle cx="24" cy="24" r="3.4"/>
                                        <circle cx="40" cy="40" r="3.4"/>
                                    </svg>
                                    @break
                                @case('professor')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M32 6 8 16l24 10 24-10z"/>
                                        <path d="M32 26v10"/>
                                        <circle cx="32" cy="44" r="6"/>
                                        <path d="M18 58c2-6 7-9 14-9s12 3 14 9"/>
                                    </svg>
                                    @break
                                @case('dotsent')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="32" cy="24" r="8"/>
                                        <path d="M16 52c2-8 8-12 16-12s14 4 16 12"/>
                                        <path d="M22 16l20-6 6 5"/>
                                        <line x1="44" y1="13" x2="46" y2="20"/>
                                    </svg>
                                    @break
                            @endswitch
                        </div>

                        <div class="lx-stat-card-value">
                            <span class="lx-stat-num"
                                  data-lx-counter
                                  data-target="{{ $stat['value'] }}"
                                  data-duration="1800">0</span>@if(!empty($stat['suffix']))<span class="lx-stat-suffix">{{ $stat['suffix'] }}</span>@endif
                        </div>

                        <span class="lx-stat-card-label">{{ $stat['label'] }}</span>

                        <span class="lx-stat-card-glow" aria-hidden="true"></span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── News (Mahalliy / Xorijiy / Xalqaro) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">Eng so&apos;nggi</span>
                <h2 class="lx-section-title">{{ __('lan.yangilik') }}</h2>
            </div>

            @php
                $newsBlocks = [
                    ['title' => __('lan.sun_yan'),   'cat_id' => 8,  'items' => $mnews],
                    ['title' => __('lan.sun_yann'),  'cat_id' => 22, 'items' => $xnews],
                    ['title' => __('lan.xal_index'), 'cat_id' => 36, 'items' => $inews],
                ];
            @endphp

            @foreach($newsBlocks as $block)
                @if($block['items']->count())
                <div class="lx-news-block" data-aos="fade-up">
                    <div class="lx-news-block-head">
                        <h3>{{ $block['title'] }}</h3>
                        <a class="lx-news-link" href="{{ route('categoryId', $block['cat_id']) }}">
                            {{ __('lan.batafsil') }} &rarr;
                        </a>
                    </div>
                    <div class="lx-news-grid">
                        @foreach($block['items']->take(3) as $i => $new)
                            <a href="{{ route('show', ['category_id' => $block['cat_id'], 'id' => $new->id]) }}"
                               class="lx-news-card"
                               data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                                <div class="lx-news-thumb">
                                    <div class="lx-news-thumb-empty">
                                        <span>Kriminalogiya</span>
                                    </div>
                                    @if($new->photos->first())
                                        <img src="{{ asset('storage/'.$new->photos->first()->file_path) }}"
                                             alt="{{ $new->name }}"
                                             loading="lazy"
                                             onerror="this.style.display='none'">
                                    @endif
                                </div>
                                <div class="lx-news-body">
                                    <div class="lx-news-meta">
                                        <span>{{ $new->created_at?->format('d.m.Y') }}</span>
                                    </div>
                                    <h4 class="lx-news-title">{{ $new->name }}</h4>
                                    <span class="lx-news-readmore">
                                        {{ __('lan.batafsil') }} &rarr;
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach

        </div>
    </section>

    {{-- ─────── Categories ("Ma'lumotlar") ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">Yo&apos;nalishlar</span>
                <h2 class="lx-section-title">{{ __('lan.malumot') }}</h2>
            </div>

            <div class="lx-categories-grid">
                <a href="{{ route('categoryId', 13) }}" class="lx-category-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="lx-category-thumb">
                        <img src="{{ asset('assets/img/i2.jfif') }}" alt="" loading="lazy">
                    </div>
                    <div class="lx-category-body">
                        <div class="lx-category-num">01</div>
                        <h3 class="lx-category-title">{{ __('lan.ijti_ama_tad') }}</h3>
                    </div>
                    <div class="lx-category-arrow">&rarr;</div>
                </a>

                <a href="{{ route('categoryId', 15) }}" class="lx-category-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="lx-category-thumb">
                        <img src="{{ asset('assets/img/i3.jfif') }}" alt="" loading="lazy">
                    </div>
                    <div class="lx-category-body">
                        <div class="lx-category-num">02</div>
                        <h3 class="lx-category-title">{{ __('lan.kitobxonlik') }}</h3>
                    </div>
                    <div class="lx-category-arrow">&rarr;</div>
                </a>

                <a href="{{ route('show', ['category_id' => 18, 'id' => 5]) }}" class="lx-category-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="lx-category-thumb">
                        <img src="{{ asset('assets/img/i4.jfif') }}" alt="" loading="lazy">
                    </div>
                    <div class="lx-category-body">
                        <div class="lx-category-num">03</div>
                        <h3 class="lx-category-title">{{ __('lan.jin_va_jin_saq') }}</h3>
                    </div>
                    <div class="lx-category-arrow">&rarr;</div>
                </a>

                <a href="{{ route('categoryId', 33) }}" class="lx-category-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="lx-category-thumb">
                        <img src="{{ asset('assets/img/kriminalogiya.jpg') }}" alt="" loading="lazy">
                    </div>
                    <div class="lx-category-body">
                        <div class="lx-category-num">04</div>
                        <h3 class="lx-category-title">{{ __('lan.krimina_ins_jur') }}</h3>
                    </div>
                    <div class="lx-category-arrow">&rarr;</div>
                </a>
            </div>
        </div>
    </section>

    {{-- ─────── Statistics ─────── --}}
    <section class="lx-section dark lx-stats-bg">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">Raqamlarda</span>
                <h2 class="lx-section-title">{{ __('lan.ins_haq') }}</h2>
                <div class="lx-stats-divider"></div>
            </div>

            <div class="lx-stats-grid">
                <div class="lx-stat" data-aos="fade-up" data-aos-delay="0">
                    <div class="lx-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M4 4h12l4 4v12H4z"/><path d="M16 4v4h4"/><path d="M8 12h8M8 16h8M8 8h4"/>
                        </svg>
                    </div>
                    <div class="lx-stat-number" data-counter="{{ $researchcount }}">0</div>
                    <div class="lx-stat-label">{{ __('lan.maqolalar') }}</div>
                </div>

                <div class="lx-stat" data-aos="fade-up" data-aos-delay="100">
                    <div class="lx-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <rect x="3" y="5" width="18" height="14" rx="1"/><path d="M3 9h18"/><path d="M8 5v-2M16 5v-2"/>
                        </svg>
                    </div>
                    <div class="lx-stat-number" data-counter="{{ $newscount }}">0</div>
                    <div class="lx-stat-label">{{ __('lan.yangilik') }}</div>
                </div>

                <div class="lx-stat" data-aos="fade-up" data-aos-delay="200">
                    <div class="lx-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <circle cx="9" cy="9" r="3"/><circle cx="17" cy="13" r="3"/>
                            <path d="M3 21c0-3.3 2.7-6 6-6"/><path d="M11 21c0-3.3 2.7-6 6-6"/>
                        </svg>
                    </div>
                    <div class="lx-stat-number" data-counter="{{ $category2PartnersCount }}">0</div>
                    <div class="lx-stat-label">{{ __('lan.xor_ham') }}</div>
                </div>

                <div class="lx-stat" data-aos="fade-up" data-aos-delay="300">
                    <div class="lx-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/><path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                            <circle cx="17" cy="7" r="3"/>
                        </svg>
                    </div>
                    <div class="lx-stat-number" data-counter="{{ $category1PartnersCount }}">0</div>
                    <div class="lx-stat-label">{{ __('lan.mah_ham') }}</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ─────── Ilmiy hamkorlar ─────── --}}
    @php
        $lxPartners = [
            ['name' => 'lex.uz',      'url' => 'https://lex.uz',      'logo' => 'assets/img/partners/lex-uz.png'],
            ['name' => 'data.gov.uz', 'url' => 'https://data.gov.uz', 'logo' => 'assets/img/partners/data-gov-uz.png'],
            ['name' => 'gov.uz',      'url' => 'https://gov.uz',      'logo' => 'assets/img/partners/gov-uz.png'],
            ['name' => 'minjust.uz',  'url' => 'https://minjust.uz',  'logo' => 'assets/img/partners/minjust-uz.png'],
        ];
    @endphp

    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">Hamkorlik</span>
                <h2 class="lx-section-title">Ilmiy hamkorlar</h2>
                <div class="lx-stats-divider"></div>
            </div>

            <div class="lx-partners-wrap" data-aos="fade-up">
                <button class="lx-partners-nav prev" type="button" aria-label="Oldingisi">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M15 18l-6-6 6-6"/></svg>
                </button>

                <div class="owl-carousel lx-partners-carousel">
                    @foreach($lxPartners as $partner)
                        <a href="{{ $partner['url'] }}" target="_blank" rel="noopener" class="lx-partner-card">
                            <div class="lx-partner-logo">
                                <img src="{{ asset($partner['logo']) }}" alt="{{ $partner['name'] }}" loading="lazy"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="lx-partner-logo-fallback">
                                    <span>{{ strtoupper(substr($partner['name'], 0, 1)) }}</span>
                                </div>
                            </div>
                            <div class="lx-partner-name">
                                <span>{{ $partner['name'] }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <button class="lx-partners-nav next" type="button" aria-label="Keyingisi">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M9 18l6-6-6-6"/></svg>
                </button>
            </div>
        </div>
    </section>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Counter animation on scroll-into-view
        const counters = document.querySelectorAll('[data-counter]');
        const animateCounter = (el) => {
            const target = parseInt(el.dataset.counter, 10) || 0;
            if (target === 0) { el.textContent = '0'; return; }
            const duration = 1800;
            const start = performance.now();
            const tick = (now) => {
                const p = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - p, 3);
                el.textContent = Math.floor(eased * target).toLocaleString();
                if (p < 1) requestAnimationFrame(tick);
                else el.textContent = target.toLocaleString();
            };
            requestAnimationFrame(tick);
        };

        if ('IntersectionObserver' in window) {
            const io = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        io.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.4 });
            counters.forEach((c) => io.observe(c));
        } else {
            counters.forEach(animateCounter);
        }

        // Custom luxury hero slider
        document.querySelectorAll('[data-lx-hero]').forEach(function (hero) {
            const slides     = hero.querySelectorAll('.lx-hero-slide');
            const indicators = hero.querySelectorAll('.lx-hero-indicator');
            const currentEl  = hero.querySelector('[data-lx-hero-current]');
            const progressEl = hero.querySelector('[data-lx-hero-progress]');
            const prevBtn    = hero.querySelector('[data-lx-hero-prev]');
            const nextBtn    = hero.querySelector('[data-lx-hero-next]');
            if (slides.length < 1) return;

            const AUTO_DELAY = 6500;
            let current = 0;
            let timer = null;
            let isPaused = false;

            const pad2 = (n) => String(n).padStart(2, '0');

            function setActive(idx) {
                current = (idx + slides.length) % slides.length;
                slides.forEach(function (s, i) {
                    s.classList.toggle('is-active', i === current);
                    s.setAttribute('aria-hidden', i === current ? 'false' : 'true');
                });
                indicators.forEach(function (b, i) {
                    b.classList.toggle('is-active', i === current);
                    b.setAttribute('aria-selected', i === current ? 'true' : 'false');
                });
                if (currentEl) currentEl.textContent = pad2(current + 1);
                resetProgress();
            }

            function next() { setActive(current + 1); }
            function prev() { setActive(current - 1); }

            function startAuto() {
                stopAuto();
                if (isPaused) return;
                timer = setInterval(next, AUTO_DELAY);
                runProgress();
            }
            function stopAuto() {
                if (timer) { clearInterval(timer); timer = null; }
            }
            function resetProgress() {
                if (!progressEl) return;
                progressEl.style.transition = 'none';
                progressEl.style.transform  = 'scaleX(0)';
                // force reflow
                void progressEl.offsetWidth;
                if (!isPaused) runProgress();
            }
            function runProgress() {
                if (!progressEl) return;
                progressEl.style.transition = 'transform ' + AUTO_DELAY + 'ms linear';
                progressEl.style.transform  = 'scaleX(1)';
            }

            indicators.forEach(function (b) {
                b.addEventListener('click', function () {
                    setActive(parseInt(b.getAttribute('data-lx-hero-go'), 10) || 0);
                    startAuto();
                });
            });
            if (prevBtn) prevBtn.addEventListener('click', function () { prev(); startAuto(); });
            if (nextBtn) nextBtn.addEventListener('click', function () { next(); startAuto(); });

            hero.addEventListener('mouseenter', function () {
                isPaused = true;
                stopAuto();
                if (progressEl) {
                    const cs = getComputedStyle(progressEl);
                    progressEl.style.transition = 'none';
                    progressEl.style.transform  = cs.transform;
                }
            });
            hero.addEventListener('mouseleave', function () {
                isPaused = false;
                startAuto();
            });

            document.addEventListener('keydown', function (e) {
                if (!hero.matches(':hover') && document.activeElement !== hero) return;
                if (e.key === 'ArrowLeft')  { prev(); startAuto(); }
                if (e.key === 'ArrowRight') { next(); startAuto(); }
            });

            // Touch/swipe (oddiy)
            let touchStartX = 0;
            hero.addEventListener('touchstart', function (e) {
                touchStartX = e.changedTouches[0].clientX;
            }, { passive: true });
            hero.addEventListener('touchend', function (e) {
                const dx = e.changedTouches[0].clientX - touchStartX;
                if (Math.abs(dx) > 40) {
                    if (dx < 0) next(); else prev();
                    startAuto();
                }
            });

            startAuto();
        });

        // Partners carousel
        if (typeof jQuery !== 'undefined' && jQuery('.lx-partners-carousel').length) {
            const $partners = jQuery('.lx-partners-carousel').owlCarousel({
                loop: true,
                margin: 24,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3500,
                autoplayHoverPause: true,
                smartSpeed: 1200,
                slideTransition: 'cubic-bezier(0.4, 0, 0.2, 1)',
                responsive: {
                    0:    { items: 1 },
                    480:  { items: 2 },
                    768:  { items: 3 },
                    1200: { items: 3 }
                }
            });
            jQuery('.lx-partners-nav.prev').on('click', function () { $partners.trigger('prev.owl.carousel'); });
            jQuery('.lx-partners-nav.next').on('click', function () { $partners.trigger('next.owl.carousel'); });
        }
    });
</script>

{{-- ─── Stats counter (IntersectionObserver) ─── --}}
<script>
(function () {
    var counters = document.querySelectorAll('[data-lx-counter]');
    if (!counters.length) return;

    var prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function easeOutCubic(t) { return 1 - Math.pow(1 - t, 3); }

    function run(el) {
        var target   = parseFloat(el.getAttribute('data-target')) || 0;
        var duration = parseInt(el.getAttribute('data-duration'), 10) || 1600;

        if (prefersReduced) {
            el.textContent = target;
            return;
        }

        var start = null;
        function tick(ts) {
            if (start === null) start = ts;
            var p = Math.min((ts - start) / duration, 1);
            var v = Math.round(target * easeOutCubic(p));
            el.textContent = v;
            if (p < 1) requestAnimationFrame(tick);
            else el.textContent = target;
        }
        requestAnimationFrame(tick);
    }

    if (!('IntersectionObserver' in window)) {
        counters.forEach(run);
        return;
    }

    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                run(entry.target);
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.35 });

    counters.forEach(function (el) { io.observe(el); });
})();
</script>

</x-main>
