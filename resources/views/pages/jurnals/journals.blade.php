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
                    <span>{{__('lan.ilm_jurnal')}}</span>
                </div>

                <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.ilm_jurnal') }}</span>
                <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.ilm_jurnal') }}</h1>
                <div class="lx-page-divider" data-aos="fade-up"></div>
                <p class="lx-page-meta" data-aos="fade-up">



                </p>
            </div>
        </section>

        {{-- ─────── News list ─────── --}}
        <section class="lx-section" style="background: var(--lx-cream);">
            <div class="container">

                <div class="container py-5">
                    <h2 class="text-center mb-4">Jurnallar</h2>

                    <div class="row">
                        @foreach($journals as $journal)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow h-100">

                                    @if($photo = $journal->photos->first())
                                        <img src="{{ asset('storage/'.$photo->file_path) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                                    @endif

                                    <div class="card-body text-center">
                                        <h5 class="fw-bold">{{ $journal->name }}</h5>
                                        <p class="small text-muted">{{ Str::limit($journal->description, 100) }}</p>

                                        <a href="{{ route('journals_show', $journal->id) }}" class="btn btn-primary btn-sm">
                                            Batafsil
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>



            </div>
        </section>

    </div>
</x-main>
