<x-main title="{{ __('lan.ins_murojaat') }} — {{ __('lan.kriminalog') }}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    @php
        $heroBg = collect([
            'assets/img/banner2.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner1.jpg',
            'assets/img/bg1.jpg',
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
                <a href="{{ route('main') }}">{{ __('lan.bosh_sahifa') }}</a>
                <span class="sep">—</span>
                <a href="{{ route('boss') }}">{{ __('lan.rahbariyat') }}</a>
                <span class="sep">—</span>
                <span>{{ __('lan.ins_murojaat') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.institut') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.ins_murojaat') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
        </div>
    </section>

    {{-- ─────── Chief photo + address text ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-about-grid">

                <div class="lx-about-image" data-aos="fade-right">
                    <div class="lx-image-frame">
                        @php
                            $chiefPhoto = $chief?->photos->first();
                            $chiefInitial = mb_strtoupper(mb_substr(trim($chief->name ?? '?'), 0, 1));
                        @endphp
                        <div class="lx-leader-photo-empty" aria-hidden="true" style="{{ $chiefPhoto ? 'display:none;' : '' }}">
                            <span>{{ $chiefInitial }}</span>
                        </div>
                        @if($chiefPhoto)
                            <img src="{{ asset('storage/'.$chiefPhoto->file_path) }}"
                                 alt="{{ $chief->name }}"
                                 loading="lazy"
                                 onerror="this.style.display='none'">
                        @endif
                    </div>
                </div>

                <div class="lx-about-text" data-aos="fade-left">
                    @if($chief)
                        <span class="lx-eyebrow">{{ __('lan.ins_rahbari') }}</span>
                        <h2 class="lx-section-title">{{ $chief->name }}</h2>
                        @if(!empty($chief->post))
                            <p class="lx-page-meta">{{ $chief->post }}</p>
                        @endif
                    @endif

                    <div class="lx-rich-text">
                        <p>{{ __('lan.ins_murojaat_placeholder') }}</p>
                    </div>
                </div>

            </div>

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('boss') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.rahbariyat') }}</span>
                </a>
            </div>
        </div>
    </section>

</div>
</x-main>
