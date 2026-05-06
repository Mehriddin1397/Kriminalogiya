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
                    <span>Jurnals</span>
                </div>

                <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.yangilik') }}</span>
                <h1 class="lx-page-title" data-aos="fade-up">Jurnals</h1>
                <div class="lx-page-divider" data-aos="fade-up"></div>
                <p class="lx-page-meta" data-aos="fade-up">



                </p>
            </div>
        </section>

        {{-- ─────── News list ─────── --}}
        <section class="lx-section" style="background: var(--lx-cream);">
            <div class="container">

                <div class="container py-5">

                    <div class="text-center mb-4">
                        <h3>{{ $issue->title }}</h3>
                        <p>№ {{ $issue->number }} - {{ $issue->year }}</p>
                    </div>

                    <h5>Maqolalar ro‘yxati:</h5>

                    <ul class="list-group">
                        @foreach($papers as $paper)
                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <div>
                                    <b>{{ $paper->title }}</b><br>
                                    <small class="text-muted">{{ $paper->author }}</small>
                                </div>

                                <a href="{{ route('journals_paper', $paper->id) }}" class="btn btn-sm btn-primary">
                                    Ochish
                                </a>

                            </li>
                        @endforeach
                    </ul>

                </div>



            </div>
        </section>

    </div>
</x-main>
