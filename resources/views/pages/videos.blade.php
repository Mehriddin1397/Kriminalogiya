<x-main title="{{ __('lan.videotasvirlar') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.axborot') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.videotasvirlar') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.axborot') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.videotasvirlar') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ $videos->total() }}
                @if(method_exists($videos, 'currentPage'))
                    &middot; {{ $videos->currentPage() }} / {{ max($videos->lastPage(), 1) }}
                @endif
            </p>
        </div>
    </section>

    {{-- ─────── Videolar ro'yxati ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            @if($videos->count())
                <div class="lx-news-list-grid">
                    @foreach($videos as $i => $video)
                        <a href="{{ route('video_show', $video->id) }}"
                           class="lx-news-card"
                           data-aos="fade-up"
                           data-aos-delay="{{ ($i % 3) * 100 }}">
                            <div class="lx-news-thumb">
                                <div class="lx-news-thumb-empty" aria-hidden="true">
                                    <span>Kriminalogiya</span>
                                </div>
                                @if($video->thumbnail_url)
                                    <img src="{{ $video->thumbnail_url }}"
                                         alt="{{ $video->name }}"
                                         loading="lazy"
                                         onerror="this.style.display='none'">
                                @endif
                                <span class="lx-video-play" aria-hidden="true">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                                </span>
                            </div>
                            <div class="lx-news-body">
                                <h4 class="lx-news-title">{{ $video->name }}</h4>
                                <span class="lx-news-readmore">
                                    {{ __('lan.batafsil') }} &rarr;
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if(method_exists($videos, 'links'))
                    <div class="lx-pagination" data-aos="fade-up">
                        {{ $videos->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            @else
                <div class="lx-empty-state">
                    {{ __('lan.malumot_yoq') ?? "Ma'lumot topilmadi." }}
                </div>
            @endif

        </div>
    </section>

</div>
</x-main>
