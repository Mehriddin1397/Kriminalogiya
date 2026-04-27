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
            <span>Scroll</span>
            <div class="lx-line"></div>
        </div>
    </section>

    {{-- ─────── News (Mahalliy / Xorijiy / Xalqaro) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">News &amp; Updates</span>
                <h2 class="lx-section-title">{{ __('lan.yangilik') }}</h2>
            </div>

            {{-- Mahalliy --}}
            @if($mnews->count())
            <div class="lx-news-block" data-aos="fade-up">
                <div class="lx-news-block-head">
                    <h3>{{ __('lan.sun_yan') }}</h3>
                    <a class="lx-news-link" href="{{ route('categoryId', 8) }}">
                        {{ __('lan.batafsil') }} &rarr;
                    </a>
                </div>
                <div class="lx-news-grid">
                    @foreach($mnews->take(3) as $i => $new)
                        <a href="{{ route('show', ['category_id' => 8, 'id' => $new->id]) }}"
                           class="lx-news-card {{ $i === 0 ? 'featured' : '' }}"
                           data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="lx-news-thumb">
                                @if($new->photos->first())
                                    <img src="{{ asset('storage/'.$new->photos->first()->file_path) }}" alt="{{ $new->name }}" loading="lazy">
                                @else
                                    <div class="lx-news-thumb-empty">&#9782;</div>
                                @endif
                            </div>
                            <div class="lx-news-body">
                                <div class="lx-news-meta">
                                    <span>{{ $new->created_at?->format('d.m.Y') }}</span>
                                </div>
                                <h4 class="lx-news-title">{{ $new->name }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Xorijiy --}}
            @if($xnews->count())
            <div class="lx-news-block" data-aos="fade-up">
                <div class="lx-news-block-head">
                    <h3>{{ __('lan.sun_yann') }}</h3>
                    <a class="lx-news-link" href="{{ route('categoryId', 22) }}">
                        {{ __('lan.batafsil') }} &rarr;
                    </a>
                </div>
                <div class="lx-news-grid">
                    @foreach($xnews->take(3) as $i => $new)
                        <a href="{{ route('show', ['category_id' => 22, 'id' => $new->id]) }}"
                           class="lx-news-card {{ $i === 0 ? 'featured' : '' }}"
                           data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="lx-news-thumb">
                                @if($new->photos->first())
                                    <img src="{{ asset('storage/'.$new->photos->first()->file_path) }}" alt="{{ $new->name }}" loading="lazy">
                                @else
                                    <div class="lx-news-thumb-empty">&#9782;</div>
                                @endif
                            </div>
                            <div class="lx-news-body">
                                <div class="lx-news-meta">
                                    <span>{{ $new->created_at?->format('d.m.Y') }}</span>
                                </div>
                                <h4 class="lx-news-title">{{ $new->name }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Xalqaro --}}
            @if($inews->count())
            <div class="lx-news-block" data-aos="fade-up">
                <div class="lx-news-block-head">
                    <h3>{{ __('lan.xal_index') }}</h3>
                    <a class="lx-news-link" href="{{ route('categoryId', 36) }}">
                        {{ __('lan.batafsil') }} &rarr;
                    </a>
                </div>
                <div class="lx-news-grid">
                    @foreach($inews->take(3) as $i => $new)
                        <a href="{{ route('show', ['category_id' => 36, 'id' => $new->id]) }}"
                           class="lx-news-card {{ $i === 0 ? 'featured' : '' }}"
                           data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="lx-news-thumb">
                                @if($new->photos->first())
                                    <img src="{{ asset('storage/'.$new->photos->first()->file_path) }}" alt="{{ $new->name }}" loading="lazy">
                                @else
                                    <div class="lx-news-thumb-empty">&#9782;</div>
                                @endif
                            </div>
                            <div class="lx-news-body">
                                <div class="lx-news-meta">
                                    <span>{{ $new->created_at?->format('d.m.Y') }}</span>
                                </div>
                                <h4 class="lx-news-title">{{ $new->name }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </section>

    {{-- ─────── Categories ("Ma'lumotlar") ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">Research Areas</span>
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
                <span class="lx-eyebrow">By the numbers</span>
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
    });
</script>

</x-main>
