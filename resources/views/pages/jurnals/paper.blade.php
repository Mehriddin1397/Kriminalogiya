<x-main title="Jurnals">
    <div class="home-luxury">

        {{-- ─────── Page hero ─────── --}}
        @php
            $heroBg = collect([
                'assets/img/banner3.jpg',
                'assets/img/banner1.jpg',
                'assets/img/banner4.jpg',
                'assets/img/aa.jpg',
            ])->first(fn($p) => file_exists(public_path($p)));
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
                        <a href="{{ route('journals_index') }}">{{ __('lan.ilm_jurnal') ?? 'Bosh sahifa' }}</a>
                        <span class="sep">—</span>
                        <a href="{{ route('journals_show', $journal->id) }}">{{  $journal->name  }}</a>
                        <span class="sep">—</span>
                        <span>{{ $paper->title }}</span>
                    </div>

                    <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.ilm_jurnal') }}</span>
                    <h1 class="lx-page-title" data-aos="fade-up">{{ $paper->title }}</h1>
                    <div class="lx-page-divider" data-aos="fade-up"></div>
                    <p class="lx-page-meta" data-aos="fade-up">
                    </p>
                </div>
        </section>

        {{-- ─────── News list ─────── --}}
        <section class="lx-section" style="background: var(--lx-cream);">
            <div class="container">

                <div class="container py-5">

                    <div class="mb-3">
                        <h3>{{ $paper->title }}</h3>
                        <p><b>Muallif:</b> {{ $paper->author }}</p>
                        <p><b>Ko‘rildi:</b> 👁 {{ $paper->views }}</p>
                    </div>

                    <iframe
                        src="{{ asset('storage/'.$paper->pdf_file) }}"
                        width="100%"
                        height="700px"
                        style="border:1px solid #ccc;">
                    </iframe>

                </div>



            </div>
        </section>

    </div>
</x-main>
