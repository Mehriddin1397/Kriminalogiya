<x-main title="{{ __('lan.ins_tarkibi') }} — {{ __('lan.kriminalog') }}">
<div class="home-luxury">

    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
            'assets/img/bg1.jpg',
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
                <span>{{ __('lan.institut') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.ins_tarkibi') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('institute_structure.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('institute_structure.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('institute_structure.subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Tashkiliy tuzilma sxemasi ─────── --}}
    <section class="lx-section charcoal lx-org-section">
        <div class="container">

            <div class="lx-org-chart" data-aos="fade-up">

                {{-- Institut boshlig'i --}}
                <div class="lx-org-top">
                    <div class="lx-org-card lx-org-card-top">
                        <h3>{{ __('institute_structure.director') }}</h3>
                    </div>
                </div>

                {{-- Markazlar va bo'linmalar --}}
                <div class="lx-org-branches">
                    @foreach($branches as $i => $branch)
                        <div class="lx-org-branch" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                            <div class="lx-org-card lx-org-card-head">
                                <div class="lx-org-card-icon" aria-hidden="true">
                                    @switch($branch['icon'])
                                        @case('trend')
                                            <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M8 46 22 32l10 8 22-24"/>
                                                <path d="M48 12h10v10"/>
                                            </svg>
                                            @break
                                        @case('globe')
                                            <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="32" cy="32" r="24"/>
                                                <ellipse cx="32" cy="32" rx="10" ry="24"/>
                                                <line x1="8" y1="32" x2="56" y2="32"/>
                                                <path d="M12 20h40M12 44h40"/>
                                            </svg>
                                            @break
                                        @case('map')
                                            <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M32 58s18-17 18-32a18 18 0 1 0-36 0c0 15 18 32 18 32z"/>
                                                <circle cx="32" cy="26" r="7"/>
                                            </svg>
                                            @break
                                        @case('institution')
                                            <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M6 24 32 8l26 16"/>
                                                <rect x="10" y="24" width="44" height="28"/>
                                                <line x1="20" y1="30" x2="20" y2="46"/>
                                                <line x1="32" y1="30" x2="32" y2="46"/>
                                                <line x1="44" y1="30" x2="44" y2="46"/>
                                                <line x1="5" y1="52" x2="59" y2="52"/>
                                            </svg>
                                            @break
                                        @case('badge')
                                            <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="32" cy="24" r="11"/>
                                                <path d="M12 56c2-12 10-19 20-19s18 7 20 19"/>
                                            </svg>
                                            @break
                                    @endswitch
                                </div>
                                <h4 class="lx-org-card-name">{{ $branch['name'] }}</h4>
                                @if(!empty($branch['role']))
                                    <span class="lx-org-card-role">{{ $branch['role'] }}</span>
                                @endif
                            </div>

                            @if(!empty($branch['units']))
                                <ul class="lx-org-list">
                                    @foreach($branch['units'] as $unit)
                                        <li class="lx-org-item">{{ $unit }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>

</div>
</x-main>
