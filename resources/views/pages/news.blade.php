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
                <span>{{ $category->slug }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.yangilik') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $category->slug }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ $news->total() }}
                @if(method_exists($news, 'currentPage'))
                    &middot; {{ $news->currentPage() }} / {{ max($news->lastPage(), 1) }}
                @endif
            </p>
        </div>
    </section>

    {{-- ─────── News list ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            @if($news->count())
                <div class="lx-news-list-grid">
                    @foreach($news as $i => $new)
                        <a href="{{ route('show', ['category_id' => $category->id, 'id' => $new->id]) }}"
                           class="lx-news-card"
                           data-aos="fade-up"
                           data-aos-delay="{{ ($i % 3) * 100 }}">
                            <div class="lx-news-thumb">
                                <div class="lx-news-thumb-empty" aria-hidden="true">
                                    <span>Kriminalogiya</span>
                                </div>
                                @if($photo = $new->photos->first())
                                    <img src="{{ asset('storage/'.$photo->file_path) }}"
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
                                @if(!empty($new->title))
                                    <p class="lx-news-excerpt">{{ $new->title }}</p>
                                @endif
                                <span class="lx-news-readmore">
                                    {{ __('lan.batafsil') }} &rarr;
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if(method_exists($news, 'links'))
                    <div class="lx-pagination" data-aos="fade-up">
                        {{ $news->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            @else
                <div class="lx-empty-state">
                    {{ __('lan.malumot_yoq') ?? "Ma'lumot topilmadi." }}
                </div>
            @endif

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.bosh') }}</span>
                </a>
            </div>

        </div>
    </section>

</div>
</x-main>
