<x-main title="{{ __('lan.institut_huzuridagi_kengashlar') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.institut_huzuridagi_kengashlar') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.ilmiy_kengashlar') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.institut_huzuridagi_kengashlar') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('councils.hub_subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Ikkita kengash: qisqacha ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-hub-grid">

                <div class="lx-mission-card" data-aos="fade-up">
                    <h3 class="lx-mission-card-title">{{ __('councils.hub_kk_title') }}</h3>
                    <p class="lx-mission-card-text">{{ __('councils.hub_kk_text') }}</p>
                    <p class="lx-mission-card-text">
                        <strong>{{ __('councils.hub_kk_count', ['count' => $kengashMembersCount]) }}</strong>
                    </p>
                    <a href="{{ route('kriminologiya_kengashi_azolari') }}" class="lx-btn lx-btn-dark">
                        <span>{{ __('councils.hub_view_members') }}</span>
                        <span class="arrow">&rarr;</span>
                    </a>
                </div>

                <div class="lx-mission-card" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="lx-mission-card-title">{{ __('councils.hub_dsc_title') }}</h3>
                    <p class="lx-mission-card-text">{{ __('councils.hub_dsc_subtitle') }}</p>
                    <p class="lx-mission-card-text">
                        <strong>{{ __('councils.hub_dsc_number_label') }}:</strong> {{ $ilmiyDaraja['council_number'] }}
                    </p>
                    <p class="lx-mission-card-text">
                        {{ __('councils.hub_dsc_previous_note', [
                            'old' => $ilmiyDaraja['previous_council_number'],
                            'new' => $ilmiyDaraja['council_number'],
                            'date' => $ilmiyDaraja['oak_decision_date'],
                            'decision' => $ilmiyDaraja['oak_decision_number'],
                            'since' => $ilmiyDaraja['active_since'],
                        ]) }}
                    </p>
                </div>

                <div class="lx-mission-card" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="lx-mission-card-title">{{ __('lan.xalqaro_ekspertlar_kengashi') }}</h3>
                    <p class="lx-mission-card-text">{{ __('xalqaro_ekspertlar_kengashi.subtitle') }}</p>
                    <a href="{{ route('xalqaro_ekspertlar_kengashi_maqsadi') }}" class="lx-btn lx-btn-dark">
                        <span>{{ __('lan.batafsil') }}</span>
                        <span class="arrow">&rarr;</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- ─────── Ilmiy darajalar beruvchi kengash: ixtisosliklar ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('lan.ilmiy_darajalar_beruvchi_kengashlar') }}</span>
                <h2 class="lx-section-title">{{ __('councils.hub_dsc_specialties_title') }}</h2>
            </div>

            <div class="lx-badge-row" data-aos="fade-up" style="justify-content:center;">
                @foreach($ilmiyDaraja['specialties'] as $specialty)
                    <span class="lx-partner-table-badge">{{ $specialty }}</span>
                @endforeach
            </div>

            <p class="lx-legal-note" data-aos="fade-up" style="text-align:center;">
                {{ __('councils.hub_dsc_cyber_note', [
                    'specialty' => $ilmiyDaraja['cyber']['specialty'],
                    'number' => $ilmiyDaraja['cyber']['council_number'],
                ]) }}
            </p>
        </div>
    </section>

    {{-- ─────── Ixtisoslik bo'yicha ilmiy seminarlar ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <h2 class="lx-section-title">{{ __('councils.hub_dsc_seminars_title') }}</h2>
            </div>

            <div class="lx-ab-disc-grid" data-aos="fade-up">
                @foreach($ilmiyDaraja['seminars'] as $key => $seminar)
                    <a href="{{ route('ilmiy_kengash_seminar', str_replace('_', '-', $key)) }}" class="lx-ab-disc-card">
                        <span class="lx-ab-disc-icon" aria-hidden="true">&#9878;</span>
                        <span class="lx-ab-disc-label">{{ $seminar['title'] }}</span>
                    </a>
                @endforeach
                <a href="{{ route('ilmiy_kengash_kiber') }}" class="lx-ab-disc-card">
                    <span class="lx-ab-disc-icon" aria-hidden="true">&#9878;</span>
                    <span class="lx-ab-disc-label">{{ __('lan.kiberxavfsizlik_05_01_12') }}</span>
                </a>
                <a href="{{ route('dissertation_topics') }}" class="lx-ab-disc-card">
                    <span class="lx-ab-disc-icon" aria-hidden="true">&#9878;</span>
                    <span class="lx-ab-disc-label">{{ __('lan.dissertatsiya_mavzulari') }}</span>
                </a>
            </div>
        </div>
    </section>

</div>
</x-main>
