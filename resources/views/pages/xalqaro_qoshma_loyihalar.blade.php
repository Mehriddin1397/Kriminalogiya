<x-main title="{{ __('xalqaro_qoshma.title') }} — {{ __('lan.kriminalog') }}">
<div class="home-luxury lx-iq-page">

    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
            'assets/img/bg1.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));

        $allFlagCodes = collect($completed)->merge($ongoing)
            ->flatMap(fn ($p) => $p['partner_flags'])
            ->unique()
            ->values();
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
                <span>{{ __('xalqaro_qoshma.title') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('xalqaro_qoshma.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('xalqaro_qoshma.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
        </div>
    </section>

    {{-- ─────── Intro / tavsif (gradient panel + hamkor davlatlar) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-bottom: 64px;">
        <div class="container">
            <div class="lx-dg-intro-panel" data-aos="fade-up">
                <div class="lx-tl-intro">
                    <p>{{ __('xalqaro_qoshma.intro') }}</p>
                    <p>{{ __('xalqaro_qoshma.intro2') }}</p>
                </div>

                @if($allFlagCodes->count())
                    <div class="lx-iq-flags">
                        @foreach($allFlagCodes as $code)
                            <span class="lx-iq-flag-chip">
                                <x-flag-icon :code="$code" />
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ─────── Tabs + loyihalar grid ─────── --}}
    <section class="lx-section charcoal" style="padding-top: 0;">
        <div class="container">

            <div class="lx-tl-tabs" data-aos="fade-up" role="tablist">
                <button type="button" class="lx-tl-tab is-active" data-lx-tl-tab="completed" role="tab" aria-selected="true">
                    {{ __('xalqaro_qoshma.tab_completed') }}
                    <span class="lx-tl-tab-count">{{ count($completed) }}</span>
                </button>
                <button type="button" class="lx-tl-tab" data-lx-tl-tab="ongoing" role="tab" aria-selected="false">
                    {{ __('xalqaro_qoshma.tab_ongoing') }}
                    <span class="lx-tl-tab-count">{{ count($ongoing) }}</span>
                </button>
            </div>

            <div class="lx-tl-panel is-active" data-lx-tl-panel="completed">
                <div class="lx-tl-grid">
                    @foreach($completed as $i => $p)
                        <div class="lx-tl-card" data-aos="fade-up" data-aos-delay="{{ $i * 90 }}">
                            <span class="lx-tl-icon" aria-hidden="true">{{ $p['icon'] }}</span>
                            <div class="lx-tl-card-body">
                                <span class="lx-tl-title">{{ $p['title'] }}</span>
                                <span class="lx-tl-client">
                                    <span class="lx-iq-flag-group">
                                        @foreach($p['partner_flags'] as $code)
                                            <x-flag-icon :code="$code" />
                                        @endforeach
                                    </span>
                                    <span class="lx-tl-client-label">{{ __('xalqaro_qoshma.partner_label') }}:</span> {{ $p['partner_name'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="lx-tl-panel" data-lx-tl-panel="ongoing">
                <div class="lx-tl-grid">
                    @foreach($ongoing as $i => $p)
                        <div class="lx-tl-card" data-aos="fade-up" data-aos-delay="{{ ($i % 6) * 70 }}">
                            <span class="lx-tl-icon" aria-hidden="true">{{ $p['icon'] }}</span>
                            <div class="lx-tl-card-body">
                                <span class="lx-tl-title">{{ $p['title'] }}</span>
                                <span class="lx-tl-client">
                                    <span class="lx-iq-flag-group">
                                        @foreach($p['partner_flags'] as $code)
                                            <x-flag-icon :code="$code" />
                                        @endforeach
                                    </span>
                                    <span class="lx-tl-client-label">{{ __('xalqaro_qoshma.partner_label') }}:</span> {{ $p['partner_name'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

</div>

{{-- ─── Tabs toggle ─── --}}
<script>
(function () {
    var tabs = document.querySelectorAll('[data-lx-tl-tab]');
    var panels = document.querySelectorAll('[data-lx-tl-panel]');
    if (!tabs.length) return;

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var target = tab.getAttribute('data-lx-tl-tab');

            tabs.forEach(function (t) {
                var active = t === tab;
                t.classList.toggle('is-active', active);
                t.setAttribute('aria-selected', active ? 'true' : 'false');
            });

            panels.forEach(function (p) {
                p.classList.toggle('is-active', p.getAttribute('data-lx-tl-panel') === target);
            });
        });
    });
})();
</script>
</x-main>
