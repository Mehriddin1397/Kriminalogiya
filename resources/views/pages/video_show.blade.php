<x-main title="{{ $video->name }} — {{ __('lan.kriminalog') }}">
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
                <a href="{{ route('videos_list') }}">{{ __('lan.videotasvirlar') }}</a>
                <span class="sep">—</span>
                <span>{{ \Illuminate\Support\Str::limit($video->name, 50) }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.videotasvirlar') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $video->name }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
        </div>
    </section>

    {{-- ─────── Video player ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            @if($video->embed_url)
                <div class="lx-video-player" data-aos="fade-up">
                    <iframe src="{{ $video->embed_url }}"
                            title="{{ $video->name }}"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            @endif

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('videos_list') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.ortga') }}</span>
                </a>
            </div>
        </div>
    </section>

    {{-- ─────── Boshqa videolar ─────── --}}
    @if($moreVideos->count())
        <section class="lx-section charcoal">
            <div class="container">
                <div class="lx-section-head" data-aos="fade-up">
                    <h2 class="lx-section-title">{{ __('lan.videotasvirlar') }}</h2>
                </div>

                <div class="lx-news-list-grid">
                    @foreach($moreVideos as $i => $mv)
                        <a href="{{ route('video_show', $mv->id) }}"
                           class="lx-news-card"
                           data-aos="fade-up"
                           data-aos-delay="{{ ($i % 3) * 100 }}">
                            <div class="lx-news-thumb">
                                <div class="lx-news-thumb-empty" aria-hidden="true">
                                    <span>Kriminalogiya</span>
                                </div>
                                @if($mv->thumbnail_url)
                                    <img src="{{ $mv->thumbnail_url }}"
                                         alt="{{ $mv->name }}"
                                         loading="lazy"
                                         onerror="this.style.display='none'">
                                @endif
                                <span class="lx-video-play" aria-hidden="true">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                                </span>
                            </div>
                            <div class="lx-news-body">
                                <h4 class="lx-news-title">{{ $mv->name }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</div>
</x-main>
