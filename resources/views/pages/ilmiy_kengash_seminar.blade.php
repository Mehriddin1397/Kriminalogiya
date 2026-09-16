<x-main title="{{ $seminar['title'] }} — {{ __('lan.kriminalog') }}">
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
                <a href="{{ route('institut_kengashlari') }}">{{ __('lan.ilmiy_darajalar_beruvchi_kengashlar') }}</a>
                <span class="sep">—</span>
                <span>{{ $seminar['title'] }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('councils.seminar_eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $seminar['title'] }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ __('councils.seminar_subtitle', ['specialty' => $seminar['title'], 'number' => $councilNumber]) }}
            </p>
        </div>
    </section>

    {{-- ─────── Seminar tarkibi ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            <div class="lx-partner-table-wrap" data-aos="fade-up">
                <table class="lx-partner-table">
                    <thead>
                        <tr>
                            <th class="lx-partner-table-num">{{ __('councils.col_num') }}</th>
                            <th>{{ __('councils.col_name') }}</th>
                            <th>{{ __('councils.col_year') }}</th>
                            <th>{{ __('councils.col_specialty') }}</th>
                            <th>{{ __('councils.col_position') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seminar['members'] as $i => $m)
                            <tr>
                                <td class="lx-partner-table-num">{{ $i + 1 }}</td>
                                <td class="lx-partner-table-name">
                                    {{ $m['name'] }}
                                    @if(!empty($m['role']))
                                        <span class="lx-partner-table-role">{{ $m['role'] }}</span>
                                    @endif
                                </td>
                                <td>{{ $m['year'] ?? '—' }}</td>
                                <td>{{ $m['specialty'] ?: '—' }}</td>
                                <td>{{ $m['position'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p class="lx-legal-note" data-aos="fade-up">
                {{ __('councils.seminar_legal_note', ['date' => $oakDecisionDate, 'number' => $oakDecisionNumber]) }}
            </p>

        </div>
    </section>

</div>
</x-main>
