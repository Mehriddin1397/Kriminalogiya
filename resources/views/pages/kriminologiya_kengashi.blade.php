<x-main title="{{ __('lan.kriminologiya_kengashi') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.kriminologiya_kengashi') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.kengash_azolari') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('councils.kk_eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.kriminologiya_kengashi') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('councils.kk_subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Maqsad + huquqiy asos ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('councils.kk_purpose_text') }}</p>
            </div>
            <p class="lx-legal-note" data-aos="fade-up" style="text-align:center;">
                {{ __('councils.kk_legal_basis', [
                    'date' => $order_date,
                    'number' => $order_number,
                    'inst_date' => $institute_order_date,
                    'inst_number' => $institute_order_number,
                ]) }}
            </p>
        </div>
    </section>

    {{-- ─────── Kengash tarkibi ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('councils.kk_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('councils.kk_members_title') }}</h2>
            </div>

            <div class="lx-partner-table-wrap" data-aos="fade-up">
                <table class="lx-partner-table">
                    <thead>
                        <tr>
                            <th class="lx-partner-table-num">{{ __('councils.col_num') }}</th>
                            <th>{{ __('councils.col_name') }}</th>
                            <th>{{ __('councils.col_position') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $i => $m)
                            <tr>
                                <td class="lx-partner-table-num">{{ $i + 1 }}</td>
                                <td class="lx-partner-table-name">
                                    {{ $m['name'] }}
                                    @if(!empty($m['role']))
                                        <span class="lx-partner-table-role">{{ $m['role'] }}</span>
                                    @endif
                                </td>
                                <td>{{ $m['position'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>
</x-main>
