<x-main title="Bosh sahifa">
<div class="home-luxury">

    {{-- ─────── Hero / Carousel ─────── --}}
    <section class="lx-hero">
        <div class="owl-carousel header-carousel">
            @foreach (['1.6.png','1.2.png','1.4.png','1.3.png','1.1.png','1.5.png'] as $img)
                <div class="lx-hero-slide" style="background-image: url('{{ asset('img/'.$img) }}');"></div>
            @endforeach
        </div>

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

        <div class="lx-scroll-hint">
            <span>Pastga</span>
            <div class="lx-line"></div>
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

        // Re-init owl carousel for hero with luxury settings (if not already)
        if (typeof jQuery !== 'undefined' && jQuery('.header-carousel').length) {
            const $carousel = jQuery('.header-carousel');
            if (!$carousel.hasClass('owl-loaded')) {
                $carousel.owlCarousel({
                    items: 1,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 6500,
                    autoplayHoverPause: false,
                    smartSpeed: 1200,
                    dots: true,
                    nav: false,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn'
                });
            }
        }

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

</x-main>
