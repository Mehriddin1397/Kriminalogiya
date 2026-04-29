<x-main title="{{$category->slug}}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    <section class="lx-page-hero">
        <div class="lx-page-hero-decor" aria-hidden="true">
            <img src="{{ asset('assets/img/kti-logo.png') }}" alt="">
        </div>

        <div class="container">
            <div class="lx-breadcrumb" data-aos="fade-up">
                <a href="{{ route('main') }}">{{ __('lan.bosh_sahifa') ?? 'Bosh sahifa' }}</a>
                <span class="sep">—</span>
                <span>{{ $category->slug }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">About Institute</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $institut->name }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ $institut->created_at?->format('d.m.Y') }}
            </p>
        </div>
    </section>

    {{-- ─────── About: image + description ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-about-grid">

                <div class="lx-about-image" data-aos="fade-right">
                    <div class="lx-image-frame">
                        @php
                            $aboutImageCandidates = [
                                'assets/img/aa.jpg',
                                'assets/img/aa1.jpg',
                                'assets/img/banner1.jpg',
                                'assets/img/kriminalogiya.jpg',
                                'assets/img/kti-logo.png',
                            ];
                            $aboutImage = collect($aboutImageCandidates)
                                ->first(fn ($p) => file_exists(public_path($p)))
                                ?? 'assets/img/kti-logo.png';
                        @endphp
                        <img src="{{ asset($aboutImage) }}" alt="{{ $institut->name }}" loading="lazy">
                    </div>

                    @if($institut->created_at)
                        <div class="lx-image-badge">
                            <span class="lx-eyebrow">EST.</span>
                            <span class="lx-badge-num">{{ $institut->created_at->format('Y') }}</span>
                        </div>
                    @endif
                </div>

                <div class="lx-about-text" data-aos="fade-left">
                    <span class="lx-eyebrow">{{ $category->slug }}</span>
                    <h2 class="lx-section-title">{{ $institut->name }}</h2>

                    <div class="lx-rich-text">
                        {!! $institut->description !!}
                    </div>

                    @isset($contact)
                        <div class="lx-social-strip">
                            <span class="lx-social-strip-label">{{ __('lan.boglanish') ?? 'Bog\'lanish' }}</span>
                            @if(!empty($contact->telegram_link))
                                <a href="{{ $contact->telegram_link }}" target="_blank" rel="noopener" class="lx-social-link"><i class="fab fa-telegram"></i></a>
                            @endif
                            @if(!empty($contact->facebook_link))
                                <a href="{{ $contact->facebook_link }}" target="_blank" rel="noopener" class="lx-social-link"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(!empty($contact->whatsapp_link))
                                <a href="{{ $contact->whatsapp_link }}" target="_blank" rel="noopener" class="lx-social-link"><i class="fab fa-whatsapp"></i></a>
                            @endif
                            @if(!empty($contact->youtube_link))
                                <a href="{{ $contact->youtube_link }}" target="_blank" rel="noopener" class="lx-social-link"><i class="fab fa-youtube"></i></a>
                            @endif
                        </div>
                    @endisset
                </div>

            </div>
        </div>
    </section>

    {{-- ─────── Pillars / values ─────── --}}
    <section class="lx-section dark lx-stats-bg">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">Our principles</span>
                <h2 class="lx-section-title">{{ __('lan.ins_vaz') ?? 'Institut vazifalari' }}</h2>
                <div class="lx-stats-divider"></div>
            </div>

            <div class="lx-pillars-grid">
                <div class="lx-pillar" data-aos="fade-up" data-aos-delay="0">
                    <div class="lx-pillar-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M12 2 4 6v6c0 5 3.5 9 8 10 4.5-1 8-5 8-10V6l-8-4z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>
                    <h3>Ilmiy tadqiqot</h3>
                    <p>Kriminalogiya sohasidagi chuqur tahliliy tadqiqotlar va dalillarga asoslangan xulosalar.</p>
                </div>

                <div class="lx-pillar" data-aos="fade-up" data-aos-delay="120">
                    <div class="lx-pillar-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M12 2v4M12 18v4M2 12h4M18 12h4"/>
                            <circle cx="12" cy="12" r="5"/>
                            <path d="m4.93 4.93 2.83 2.83M16.24 16.24l2.83 2.83M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                        </svg>
                    </div>
                    <h3>Innovatsion yondashuv</h3>
                    <p>Zamonaviy metodologiya va xalqaro tajribadan foydalangan holda yangi yechimlar.</p>
                </div>

                <div class="lx-pillar" data-aos="fade-up" data-aos-delay="240">
                    <div class="lx-pillar-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                            <circle cx="9" cy="8" r="3"/>
                            <circle cx="17" cy="11" r="3"/>
                            <path d="M3 21c0-3.3 2.7-6 6-6"/>
                            <path d="M11 21c0-3.3 2.7-6 6-6"/>
                        </svg>
                    </div>
                    <h3>Strategik hamkorlik</h3>
                    <p>Mahalliy va xorijiy ilmiy markazlar bilan uzoq muddatli ilmiy aloqalar.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ─────── Quote ─────── --}}
    <section class="lx-quote-section">
        <div class="container">
            <div class="lx-quote" data-aos="fade-up">
                <span class="lx-quote-mark" aria-hidden="true">&ldquo;</span>
                <p class="lx-quote-text">
                    Adolat jamiyatning poydevoridir; uni mustahkamlash ilm-fan va izlanish orqali yuksaladi.
                </p>
                <div class="lx-quote-author">{{ $institut->name }}</div>
            </div>

            <div class="lx-back-wrap" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.ortga') }}</span>
                </a>
            </div>
        </div>
    </section>

</div>
</x-main>
