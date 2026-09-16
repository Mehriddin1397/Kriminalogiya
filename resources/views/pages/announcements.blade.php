<x-main title="{{ __('lan.elonlar') }}">
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
                <span>{{ __('lan.elonlar') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.axborot') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.elonlar') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ $announcements->count() }}</p>
        </div>
    </section>

    {{-- ─────── Announcements list ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            @if($announcements->count())
                <div class="lx-news-list-grid">
                    @foreach($announcements as $i => $announcement)
                        <a href="{{ route('announcement_show', $announcement->id) }}"
                           class="lx-news-card"
                           data-aos="fade-up"
                           data-aos-delay="{{ ($i % 3) * 100 }}">
                            <div class="lx-news-thumb">
                                <div class="lx-news-thumb-empty" aria-hidden="true">
                                    <span>KTI</span>
                                </div>
                                @if($photo = $announcement->photos->first())
                                    <img src="{{ asset('storage/'.$photo->file_path) }}"
                                         alt="{{ $announcement->title }}"
                                         loading="lazy"
                                         onerror="this.style.display='none'">
                                @endif
                            </div>
                            <div class="lx-news-body">
                                <div class="lx-news-meta">
                                    <span>{{ $announcement->created_at?->format('d.m.Y') }}</span>
                                </div>
                                <h4 class="lx-news-title">{{ $announcement->title }}</h4>
                                @php $excerpt = trim(strip_tags($announcement->description ?? '')); @endphp
                                @if($excerpt !== '')
                                    <p class="lx-news-excerpt">{{ \Illuminate\Support\Str::limit($excerpt, 140) }}</p>
                                @endif
                                <span class="lx-news-readmore">
                                    {{ __('lan.batafsil') }} &rarr;
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="lx-empty-state">
                    {{ __('lan.malumot_yoq') ?? "Ma'lumot topilmadi." }}
                </div>
            @endif

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.bosh') ?? __('lan.bosh_sahifa') }}</span>
                </a>
            </div>

        </div>
    </section>

</div>
</x-main>
