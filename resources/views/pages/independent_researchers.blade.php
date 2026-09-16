<x-main title="{{ __('lan.mustaqil_izlanuvchilar') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.tadqiqotlar') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.mustaqil_izlanuvchilar') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('independent_researchers.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.mustaqil_izlanuvchilar') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('independent_researchers.subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Ixtisosliklar bo'yicha ro'yxat ─────── --}}
    @foreach($groups as $gi => $group)
        <section class="lx-section {{ $gi % 2 === 1 ? 'charcoal' : '' }}" style="{{ $gi % 2 === 0 ? 'background: var(--lx-cream);' : '' }}">
            <div class="container">
                <div class="lx-section-head" data-aos="fade-up">
                    <h2 class="lx-section-title">{{ $group['title'] }}</h2>
                </div>

                @if(!empty($group['phd']))
                    <h3 class="lx-rn-subhead">{{ __('independent_researchers.phd_title') }}</h3>

                    <div class="lx-partner-table-wrap" data-aos="fade-up" style="margin-bottom: 40px;">
                        <table class="lx-partner-table">
                            <thead>
                                <tr>
                                    <th class="lx-partner-table-num">{{ __('independent_researchers.col_num') }}</th>
                                    <th>{{ __('independent_researchers.col_name') }}</th>
                                    <th>{{ __('independent_researchers.col_topic') }}</th>
                                    <th>{{ __('independent_researchers.col_supervisor') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($group['phd'] as $i => $r)
                                    <tr>
                                        <td class="lx-partner-table-num">{{ $i + 1 }}</td>
                                        <td class="lx-partner-table-name">{{ $r['name'] }}</td>
                                        <td>{{ $r['topic'] }}</td>
                                        <td>{{ $r['supervisor'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if(!empty($group['dsc']))
                    <h3 class="lx-rn-subhead">{{ __('independent_researchers.dsc_title') }}</h3>

                    <div class="lx-partner-table-wrap" data-aos="fade-up">
                        <table class="lx-partner-table">
                            <thead>
                                <tr>
                                    <th class="lx-partner-table-num">{{ __('independent_researchers.col_num') }}</th>
                                    <th>{{ __('independent_researchers.col_name') }}</th>
                                    <th>{{ __('independent_researchers.col_topic') }}</th>
                                    <th>{{ __('independent_researchers.col_supervisor') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($group['dsc'] as $i => $r)
                                    <tr>
                                        <td class="lx-partner-table-num">{{ $i + 1 }}</td>
                                        <td class="lx-partner-table-name">{{ $r['name'] }}</td>
                                        <td>{{ $r['topic'] }}</td>
                                        <td>{{ $r['supervisor'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </section>
    @endforeach

</div>
</x-main>
