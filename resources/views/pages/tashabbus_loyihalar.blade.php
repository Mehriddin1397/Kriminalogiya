<x-main title="{{ __('tashabbus.title') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.tadqiqotlar') }}</span>
                <span class="sep">—</span>
                <span>{{ __('tashabbus.title') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('tashabbus.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('tashabbus.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
        </div>
    </section>

    {{-- ─────── Intro / tavsif ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-bottom: 64px;">
        <div class="container">
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('tashabbus.intro') }}</p>
                <p>{{ __('tashabbus.intro2') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Tabs + loyihalar grid ─────── --}}
    <section class="lx-section charcoal" style="padding-top: 0;">
        <div class="container">

            <div class="lx-tl-tabs" data-aos="fade-up" role="tablist">
                <button type="button" class="lx-tl-tab is-active" data-lx-tl-tab="completed" role="tab" aria-selected="true">
                    {{ __('tashabbus.tab_completed') }}
                    <span class="lx-tl-tab-count">{{ count($completed) }}</span>
                </button>
                <button type="button" class="lx-tl-tab" data-lx-tl-tab="ongoing" role="tab" aria-selected="false">
                    {{ __('tashabbus.tab_ongoing') }}
                    <span class="lx-tl-tab-count">{{ count($ongoing) }}</span>
                </button>
            </div>

            <div class="lx-tl-panel is-active" data-lx-tl-panel="completed">
                <div class="lx-tl-grid">
                    @foreach($completed as $i => $p)
                        <div class="lx-tl-card" data-aos="fade-up" data-aos-delay="{{ ($i % 6) * 70 }}">
                            <span class="lx-tl-icon" aria-hidden="true">{{ $p['icon'] }}</span>
                            <span class="lx-tl-title">{{ $p['title'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="lx-tl-panel" data-lx-tl-panel="ongoing">
                <div class="lx-tl-grid">
                    @foreach($ongoing as $i => $p)
                        <div class="lx-tl-card" data-aos="fade-up" data-aos-delay="{{ ($i % 6) * 70 }}">
                            <span class="lx-tl-icon" aria-hidden="true">{{ $p['icon'] }}</span>
                            <span class="lx-tl-title">{{ $p['title'] }}</span>
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
