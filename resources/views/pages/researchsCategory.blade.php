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
                <span>{{ $category->slug }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ $category->slug }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $category->slug }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ $researchs->count() }}</p>
        </div>
    </section>

    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        @if($categories->isNotEmpty())
                            @foreach($categories as $category)
                                <li class="mx-2 {{ $id == $category->id ? 'active' : '' }}">
                                    <a href="{{ route('categoryId', $category->id) }}" style="color: {{ $id == $category->id ? '#0a0a0a' : '' }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    @foreach($researchs as $research)
                        <div class="xalqaro-hankorlik-section">
                            <div class="xalqaro-hankorlik-content">
                                <div class="xalqaro-hankorlik-image-container">
                                    @foreach($research->photos as $photo)
                                        <img src="{{ asset('storage/' . $photo->file_path) }}" alt="Xalqaro hankorlik"
                                             class="xalqaro-hankorlik-img img-fluid">
                                    @endforeach
                                </div>
                                <div class="xalqaro-hankorlik-text-container">
                                    <p class="xalqaro-hankorlik-quote">
                                        @foreach($research->categories as $category)
                                            <a href="{{ route('show', ['category_id' => $category->id, 'id' => $research->id]) }}">{{ $research->name }}</a>
                                        @endforeach
                                    </p>
                                    <div class="xalqaro-hankorlik-meta">
                                    <span class="xalqaro-hankorlik-date">
                                        {{ $research->created_at->format('Y.m.d') }}
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>
            </div>

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.bosh_sahifa') }}</span>
                </a>
            </div>
        </div>
    </section>

</div>

    <style>
        .xalqaro-hankorlik-section {
            margin: 10px 0;
            padding: 15px;
            background-color: #f3f0ea;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .xalqaro-hankorlik-content {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        .xalqaro-hankorlik-image-container {
            flex: 0 0 auto;
            margin: 10px;
        }

        .xalqaro-hankorlik-img {
            width: 100px;
            height: 110px;
            object-fit: cover;
            border-radius: 5px;
        }

        .xalqaro-hankorlik-text-container {
            flex: 1 1 300px;
            padding: 10px;
        }

        .xalqaro-hankorlik-quote {
            font-size: 1.2rem;
            line-height: 1.5;
            color: #333;
            margin: 0 0 10px 0;
            font-weight: 500;
        }

        .xalqaro-hankorlik-meta {
            margin-top: 5px;
        }

        .xalqaro-hankorlik-date {
            color: #666;
            font-size: 0.95rem;
        }

        @media (max-width: 576px) {
            .xalqaro-hankorlik-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .xalqaro-hankorlik-img {
                width: 90px;
                height: 100px;
            }

            .xalqaro-hankorlik-text-container {
                padding-left: 0;
            }

            .xalqaro-hankorlik-quote {
                font-size: 1.1rem;
            }
        }
    </style>

</x-main>
