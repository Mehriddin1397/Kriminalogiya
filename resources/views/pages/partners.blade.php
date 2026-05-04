<x-main title="{{ $category->slug }}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner3.jpg',
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

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.hamkor') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $category->slug }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ $news->total() }}
                @if(method_exists($news, 'currentPage') && $news->lastPage() > 1)
                    &middot; {{ $news->currentPage() }} / {{ $news->lastPage() }}
                @endif
            </p>
        </div>
    </section>

    {{-- ─────── Partners grid ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            {{-- Filter tabs (Mahalliy / Xorijiy) --}}
            <div class="lx-partners-filter" data-aos="fade-up">
                <a href="{{ route('categoryId', 11) }}"
                   class="{{ (int)$category->id === 11 ? 'is-active' : '' }}">
                    {{ __('lan.mah_ham') }}
                </a>
                <a href="{{ route('categoryId', 12) }}"
                   class="{{ (int)$category->id === 12 ? 'is-active' : '' }}">
                    {{ __('lan.xor_ham') }}
                </a>
            </div>

            @if($news->count())
                <div class="lx-partners-list-grid">
                    @foreach($news as $i => $partner)
                        @php
                            $logo = $partner->photos->first();
                            $initial = mb_strtoupper(mb_substr(trim($partner->name ?? '?'), 0, 1));
                        @endphp

                        <a href="{{ route('show', ['category_id' => $category->id, 'id' => $partner->id]) }}"
                           class="lx-partner-tile"
                           data-aos="fade-up"
                           data-aos-delay="{{ ($i % 4) * 80 }}">
                            <div class="lx-partner-tile-logo">
                                @if($logo)
                                    <img src="{{ asset('storage/'.$logo->file_path) }}"
                                         alt="{{ $partner->name }}"
                                         loading="lazy"
                                         onerror="this.outerHTML='<div class=&quot;lx-partner-tile-empty&quot;>{{ $initial }}</div>'">
                                @else
                                    <div class="lx-partner-tile-empty">{{ $initial }}</div>
                                @endif
                            </div>
                            <div class="lx-partner-tile-body">
                                <h3 class="lx-partner-tile-name">{{ $partner->name }}</h3>
                                <span class="lx-partner-tile-cta">
                                    {{ __('lan.batafsil') }} &rarr;
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if(method_exists($news, 'links') && $news->lastPage() > 1)
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
