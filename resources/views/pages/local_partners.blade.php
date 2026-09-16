<x-main title="{{ __('local_partners.title') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.institut') }}</span>
                <span class="sep">—</span>
                <span>{{ __('local_partners.title') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('local_partners.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('local_partners.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('local_partners.subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Hamkorlar jadvali ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            <div class="lx-partner-table-head" data-aos="fade-up">
                <span class="lx-partner-table-badge">{{ __('local_partners.as_of') }}</span>
            </div>

            <div class="lx-partner-table-wrap" data-aos="fade-up">
                <table class="lx-partner-table">
                    <thead>
                        <tr>
                            <th class="lx-partner-table-num">{{ __('local_partners.col_num') }}</th>
                            <th>{{ __('local_partners.col_name') }}</th>
                            <th>{{ __('local_partners.col_leader') }}</th>
                            <th>{{ __('local_partners.col_signed') }}</th>
                            <th>{{ __('local_partners.col_duration') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partners as $i => $p)
                            <tr>
                                <td class="lx-partner-table-num">{{ $i + 1 }}</td>
                                <td class="lx-partner-table-name">{{ $p['name'] }}</td>
                                <td>{{ $p['leader'] }}</td>
                                <td>{{ $p['signed'] }}</td>
                                <td>{{ $p['duration'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

</div>
</x-main>
