<x-main title="Bosh sahifa">
<div class="home-luxury">

    {{-- ─────── Hero / Custom luxury slider ─────── --}}
    @php
        $lxHeroRows = \App\Models\SiteImage::group(\App\Models\SiteImage::GROUP_HERO_SLIDER)->pluck('file_path');
        if ($lxHeroRows->isNotEmpty()) {
            $lxHeroSlides = $lxHeroRows->map(fn ($p) => asset('storage/'.$p))->all();
        } else {
            $lxHeroSlides = collect(['1.6.png','1.2.png','1.4.png','1.3.png','1.1.png','1.5.png'])
                ->map(fn ($p) => asset('img/'.$p))->all();
        }
        $lxHeroTotal = count($lxHeroSlides);
    @endphp

    <section class="lx-hero" data-lx-hero>

        <div class="lx-hero-slider">
            @foreach ($lxHeroSlides as $i => $img)
                <div class="lx-hero-slide {{ $i === 0 ? 'is-active' : '' }}"
                     style="background-image: url('{{ $img }}');"
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

        {{-- Markazda kontent — chapda institut nomi, o'ngda logo + statistika --}}
        <div class="lx-hero-content lx-hero-about">
            <div class="lx-hero-about-left">
                

                <h1 class="lx-hero-title" data-lx-typewriter>
                    
                    <em class="lx-typewriter-line" data-lx-typewriter-text="{{ __('lan.ins_haq') }}">{{ __('lan.ins_haq') }}</em>
                </h1>

                <p class="lx-hero-sub">
                    @if(!empty($contact?->address)) {{ $contact->address }} @endif
                </p>

                <div class="lx-hero-cta">
                    <a href="{{ route('institute_about') }}" class="lx-btn">
                        <span>{{ __('lan.batafsil') }}</span>
                        <span class="arrow">&rarr;</span>
                    </a>
                </div>
            </div>

            <div class="lx-hero-cards">
                <svg class="lx-hero-cards-lines" viewBox="0 0 620 620" aria-hidden="true">
                    <rect class="lx-frame-rect" x="109.5" y="109.5" width="401" height="401" rx="31.5"/>
                    <path class="lx-frame-h" d="M511 323L109 323"/>
                    <path class="lx-frame-v" d="M310 510L310 109"/>
                </svg>

                <div class="lx-hero-cards-glow" aria-hidden="true"></div>

                <div class="lx-hero-cards-center">
                    <span class="lx-hero-cards-ring" aria-hidden="true"></span>
                    <img src="{{ asset('assets/img/kti-logo.png') }}" alt="{{ __('lan.kriminalog') }}">
                </div>

                <div class="lx-hero-cards-item lx-hero-cards-item-1">
                    <span class="lx-hero-card-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M4 4h12l4 4v12H4z"/><path d="M16 4v4h4"/><path d="M8 12h8M8 16h8M8 8h4"/>
                        </svg>
                    </span>
                    <span class="lx-hero-card-value" data-counter="73">0</span>
                    <span class="lx-hero-card-label">{{ __('lan.tadqiqot_loyihalari') }}</span>
                </div>

                <div class="lx-hero-cards-item lx-hero-cards-item-2">
                    <span class="lx-hero-card-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <rect x="3" y="5" width="18" height="14" rx="1"/><path d="M3 9h18"/><path d="M8 5v-2M16 5v-2"/>
                        </svg>
                    </span>
                    <span class="lx-hero-card-value" data-counter="79">0</span>
                    <span class="lx-hero-card-label">{{ __('lan.ilm_ishlanma') }}</span>
                </div>

                <div class="lx-hero-cards-item lx-hero-cards-item-3">
                    <span class="lx-hero-card-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <circle cx="9" cy="9" r="3"/><circle cx="17" cy="13" r="3"/>
                            <path d="M3 21c0-3.3 2.7-6 6-6"/><path d="M11 21c0-3.3 2.7-6 6-6"/>
                        </svg>
                    </span>
                    <span class="lx-hero-card-value" data-counter="11">0</span>
                    <span class="lx-hero-card-label">{{ __('lan.xor_ham') }}</span>
                </div>

                <div class="lx-hero-cards-item lx-hero-cards-item-4">
                    <span class="lx-hero-card-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/><path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                            <circle cx="17" cy="7" r="3"/>
                        </svg>
                    </span>
                    <span class="lx-hero-card-value" data-counter="21">0</span>
                    <span class="lx-hero-card-label">{{ __('lan.mah_ham') }}</span>
                </div>
            </div>
        </div>

        {{-- Pastki progress bar --}}
        <div class="lx-hero-progress" aria-hidden="true">
            <div class="bar" data-lx-hero-progress></div>
        </div>

        {{-- Scroll hint --}}
        <div class="lx-scroll-hint">
            <span>{{ __('lan.pastga') }}</span>
            <div class="lx-line"></div>
        </div>
    </section>

    {{-- ─────── News (Mahalliy / Xorijiy / Xalqaro) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{__('lan.eng_songgi')}}</span>
                <h2 class="lx-section-title">{{ __('lan.yangilik') }}</h2>
            </div>

            @php
                $newsBlocks = [
                    ['title' => __('lan.sun_yan'),   'cat_id' => 8,  'items' => $mnews],
                    ['title' => __('lan.sun_yann'),  'cat_id' => 22, 'items' => $xnews],
                    ['title' => __('lan.xal_index'), 'cat_id' => 36, 'items' => $inews],
                ];
            @endphp

            <div class="lx-news-layout">
                <div class="lx-news-main">
                    @foreach($newsBlocks as $block)
                        @if($block['items']->count())
                        <div class="lx-news-block" data-aos="fade-up">
                            <div class="lx-news-block-head">
                                <h3>{{ $block['title'] }}</h3>
                                <a class="lx-news-link" href="{{ route('categoryId', $block['cat_id']) }}">
                                    {{ __('lan.batafsil') }} &rarr;
                                </a>
                            </div>
                            <div class="owl-carousel lx-news-carousel">
                                @foreach($block['items'] as $i => $new)
                                    <a href="{{ route('show', ['category_id' => $block['cat_id'], 'id' => $new->id]) }}"
                                       class="lx-news-card"
                                       data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                                        <div class="lx-news-thumb">
                                            <div class="lx-news-thumb-empty">
                                                <span>Kriminologiya</span>
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

                @if($announcements->count())
                    <aside class="lx-announce-panel" data-aos="fade-up" data-lx-announce>
                        <div class="lx-announce-head">
                            <span class="lx-announce-bell" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                                </svg>
                            </span>
                            <h3>{{ __('lan.elonlar') }}</h3>
                        </div>

                        <div class="lx-announce-track">
                            @foreach($announcements as $i => $announcement)
                                <a href="{{ route('announcement_show', $announcement->id) }}"
                                   class="lx-announce-slide {{ $i === 0 ? 'is-active' : '' }}" data-index="{{ $i }}">
                                    <div class="lx-announce-media">
                                        @if($announcement->photos->first())
                                            <img src="{{ asset('storage/'.$announcement->photos->first()->file_path) }}"
                                                 alt="" loading="lazy">
                                        @else
                                            <div class="lx-announce-media-empty">
                                                <span>KTI</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="lx-announce-body">
                                        <h4 class="lx-announce-title">{{ $announcement->title }}</h4>
                                        <p class="lx-announce-text">{{ \Illuminate\Support\Str::limit(strip_tags($announcement->description), 110) }}</p>
                                        <span class="lx-announce-readmore">
                                            {{ __('lan.batafsil') }} &rarr;
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        @if($announcements->count() > 1)
                            <div class="lx-announce-dots">
                                @foreach($announcements as $i => $announcement)
                                    <button type="button"
                                            class="lx-announce-dot {{ $i === 0 ? 'is-active' : '' }}"
                                            data-lx-announce-go="{{ $i }}"
                                            aria-label="{{ __('lan.elonlar') }} {{ $i + 1 }}"></button>
                                @endforeach
                            </div>
                        @endif
                    </aside>
                @endif
            </div>

        </div>
    </section>

    {{-- ─────── Ilmiy salohiyat (statistika) ─────── --}}
    @php
        $lxStats = [
            [
                'value' => 6, 'suffix' => '%',
                'label' => __('lan.fan_doktori_dsc'),
                'icon'  => 'dsc',
            ],
            [
                'value' => 28, 'suffix' => '%',
                'label' => __('lan.falsafa_doktori_phd'),
                'icon'  => 'phd',
            ],
            [
                'value' => 51, 'suffix' => '%',
                'label' => __('lan.ilmiy_darajaga_ega'),
                'icon'  => 'percent',
            ],
            [
                'value' => 3, 'suffix' => '%',
                'label' => __('lan.professor'),
                'icon'  => 'professor',
            ],
            [
                'value' => 14, 'suffix' => '%',
                'label' => __('lan.dotsent'),
                'icon'  => 'dotsent',
            ],
            [
                'value' => 1, 'suffix' => '%',
                'label' => __('lan.xizmat_yurist'),
                'icon'  => 'lawyer',
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
                <span class="lx-eyebrow">{{ __('lan.statistika') }}</span>
                <h2 class="lx-stats-title">{{ __('lan.institut_ilmiy_salohiyati') }}</h2>
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
                                @case('lawyer')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M32 8v6"/>
                                        <path d="M14 14h36"/>
                                        <path d="M32 14v38"/>
                                        <path d="M14 20l-8 14a8 8 0 0 0 16 0z"/>
                                        <path d="M50 20l-8 14a8 8 0 0 0 16 0z"/>
                                        <path d="M14 20l18-6"/>
                                        <path d="M50 20 32 14"/>
                                        <path d="M22 58h20"/>
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

    {{-- ─────── Yo'nalishlar ("Ma'lumotlar") — institut faoliyat yo'nalishlari ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{__('lan.yonalishlar')}}</span>
                <h2 class="lx-section-title">{{ __('lan.malumot') }}</h2>
            </div>

            <div class="lx-directions-grid">
                <a href="{{ route('institute_about') }}" class="lx-direction-card" data-aos="fade-up" data-aos-delay="0">
                    <span class="lx-direction-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M4 21h16"/><path d="M5 21V10l7-5 7 5v11"/><path d="M9 21v-6h6v6"/>
                        </svg>
                    </span>
                    <div class="lx-direction-body">
                        <span class="lx-direction-num">01</span>
                        <h3 class="lx-direction-title">{{ __('lan.institut') }}</h3>
                    </div>
                    <span class="lx-direction-arrow" aria-hidden="true">&rarr;</span>
                </a>

                <a href="{{ route('ilmiy_tadqiqot_nima') }}" class="lx-direction-card" data-aos="fade-up" data-aos-delay="80">
                    <span class="lx-direction-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <circle cx="10" cy="10" r="6"/><path d="M20 20l-5-5"/>
                        </svg>
                    </span>
                    <div class="lx-direction-body">
                        <span class="lx-direction-num">02</span>
                        <h3 class="lx-direction-title">{{ __('lan.tadqiqotlar') }}</h3>
                    </div>
                    <span class="lx-direction-arrow" aria-hidden="true">&rarr;</span>
                </a>

                <a href="{{ route('journals_index') }}" class="lx-direction-card" data-aos="fade-up" data-aos-delay="160">
                    <span class="lx-direction-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M4 5c3-1 6-1 8 1c2-2 5-2 8-1v13c-3-1-6-1-8 1c-2-2-5-2-8-1z"/><path d="M12 6v13"/>
                        </svg>
                    </span>
                    <div class="lx-direction-body">
                        <span class="lx-direction-num">03</span>
                        <h3 class="lx-direction-title">{{ __('lan.ilm_ishlanma') }}</h3>
                    </div>
                    <span class="lx-direction-arrow" aria-hidden="true">&rarr;</span>
                </a>

                <a href="{{ route('show', ['category_id' => 2, 'id' => 1]) }}" class="lx-direction-card" data-aos="fade-up" data-aos-delay="240">
                    <span class="lx-direction-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <circle cx="12" cy="6" r="2.5"/><circle cx="5" cy="17" r="2.5"/><circle cx="19" cy="17" r="2.5"/>
                            <path d="M12 8.5V12M12 12L6.2 14.6M12 12l5.8 2.6"/>
                        </svg>
                    </span>
                    <div class="lx-direction-body">
                        <span class="lx-direction-num">04</span>
                        <h3 class="lx-direction-title">{{ __('lan.ilmiy_kengashlar') }}</h3>
                    </div>
                    <span class="lx-direction-arrow" aria-hidden="true">&rarr;</span>
                </a>

                <a href="{{ route('international_cooperation') }}" class="lx-direction-card" data-aos="fade-up" data-aos-delay="320">
                    <span class="lx-direction-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <circle cx="12" cy="12" r="9"/><ellipse cx="12" cy="12" rx="4" ry="9"/><path d="M3 12h18"/>
                        </svg>
                    </span>
                    <div class="lx-direction-body">
                        <span class="lx-direction-num">05</span>
                        <h3 class="lx-direction-title">{{ __('lan.xalqaro_hamkorlik') }}</h3>
                    </div>
                    <span class="lx-direction-arrow" aria-hidden="true">&rarr;</span>
                </a>

                <a href="{{ route('gallery') }}" class="lx-direction-card" data-aos="fade-up" data-aos-delay="400">
                    <span class="lx-direction-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <rect x="3" y="5" width="18" height="14" rx="2"/><path d="M10 9l6 3-6 3z" fill="currentColor" stroke="none"/>
                        </svg>
                    </span>
                    <div class="lx-direction-body">
                        <span class="lx-direction-num">06</span>
                        <h3 class="lx-direction-title">{{ __('lan.axborot') }}</h3>
                    </div>
                    <span class="lx-direction-arrow" aria-hidden="true">&rarr;</span>
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
                <span class="lx-eyebrow">{{__('lan.hamkorlik')}}</span>
                <h2 class="lx-section-title">{{__('lan.ilmiy_hamkorlar')}}</h2>
                <div class="lx-stats-divider"></div>
            </div>

            <div class="lx-partners-wrap" data-aos="fade-up">
                <button class="lx-partners-nav prev" type="button" aria-label="Oldingisi">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M15 18l-6-6 6-6"/></svg>
                </button>

                <div class="owl-carousel lx-partners-carousel">
                    @foreach($partners as $partner)
                        <a href="{{ $partner->link }}" target="_blank" rel="noopener" class="lx-partner-card">
                            <div class="lx-partner-logo">
                                @foreach($partner->photos as $photo)
                                <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->file_path }}" loading="lazy"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                @endforeach
                                <div class="lx-partner-logo-fallback">
                                    <span>{{ strtoupper(substr($partner->name, 0, 1)) }}</span>
                                </div>
                            </div>
                            <div class="lx-partner-name">
                                <span>{{ $partner->name }}</span>
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

        // Announcements panel — sequential auto-advancing slider
        document.querySelectorAll('[data-lx-announce]').forEach(function (panel) {
            var slides = panel.querySelectorAll('.lx-announce-slide');
            var dots   = panel.querySelectorAll('.lx-announce-dot');
            if (slides.length < 2) return;

            var current = 0;
            var DELAY = 5000;
            var timer = null;

            function setActive(idx) {
                current = (idx + slides.length) % slides.length;
                slides.forEach(function (s, i) { s.classList.toggle('is-active', i === current); });
                dots.forEach(function (d, i) { d.classList.toggle('is-active', i === current); });
            }

            function next() { setActive(current + 1); }
            function start() { stop(); timer = setInterval(next, DELAY); }
            function stop() { if (timer) { clearInterval(timer); timer = null; } }

            dots.forEach(function (d) {
                d.addEventListener('click', function () {
                    setActive(parseInt(d.getAttribute('data-lx-announce-go'), 10) || 0);
                    start();
                });
            });

            panel.addEventListener('mouseenter', stop);
            panel.addEventListener('mouseleave', start);

            start();
        });

        // News carousel — auto-rotating slideshow per block (mahalliy/xorijiy/xalqaro)
        if (typeof jQuery !== 'undefined' && jQuery('.lx-news-carousel').length) {
            jQuery('.lx-news-carousel').each(function () {
                jQuery(this).owlCarousel({
                    loop: jQuery(this).children().length > 1,
                    margin: 30,
                    nav: false,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 4500,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    responsive: {
                        0:   { items: 1 },
                        640: { items: 2 },
                        992: { items: 3 }
                    }
                });
            });
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

        // Hero title — typewriter effect (lines type out one after another)
        document.querySelectorAll('[data-lx-typewriter]').forEach(function (block) {
            const lines = block.querySelectorAll('.lx-typewriter-line');
            if (!lines.length) return;

            const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (reduceMotion) return;

            const CHAR_DELAY  = 55;
            const LINE_DELAY  = 250;
            const texts = Array.prototype.map.call(lines, function (el) {
                return el.getAttribute('data-lx-typewriter-text') || el.textContent;
            });

            lines.forEach(function (el) { el.textContent = ''; });

            function typeLine(lineIndex) {
                const el = lines[lineIndex];
                const text = texts[lineIndex];
                el.classList.add('is-typing');

                let charIndex = 0;
                (function typeChar() {
                    el.textContent = text.slice(0, charIndex);
                    charIndex++;
                    if (charIndex <= text.length) {
                        setTimeout(typeChar, CHAR_DELAY);
                    } else {
                        el.classList.remove('is-typing');
                        if (lineIndex + 1 < lines.length) {
                            setTimeout(function () { typeLine(lineIndex + 1); }, LINE_DELAY);
                        }
                    }
                })();
            }

            // Start once the title's fade-up entrance (CSS: lxFadeUp, 0.5s delay + 1.1s duration) has settled
            setTimeout(function () { typeLine(0); }, 900);
        });
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
