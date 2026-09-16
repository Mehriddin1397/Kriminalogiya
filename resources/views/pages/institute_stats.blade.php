<x-main title="{{ __('lan.ins_raqam') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.ins_raqam') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('institute_stats.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('institute_stats.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('institute_stats.intro') }}</p>
        </div>
    </section>

    {{-- ─────── Bento grid ─────── --}}
    <section class="lx-section lx-bento-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-bento-grid">
                @foreach($stats as $i => $s)
                    <div class="lx-bento-card size-{{ $s['size'] }} @if(!empty($s['ring'])) has-ring @endif"
                         data-aos="fade-up" data-aos-delay="{{ $i * 70 }}">

                        <div class="lx-bento-decor" aria-hidden="true"></div>

                        <div class="lx-bento-icon" aria-hidden="true">
                            @switch($s['icon'])
                                @case('lightbulb')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M32 8a16 16 0 0 0-9 29c2 1.6 3 3.6 3 6v3h12v-3c0-2.4 1-4.4 3-6a16 16 0 0 0-9-29z"/>
                                        <line x1="26" y1="54" x2="38" y2="54"/>
                                        <line x1="28" y1="60" x2="36" y2="60"/>
                                        <line x1="32" y1="2" x2="32" y2="7"/>
                                    </svg>
                                    @break
                                @case('target')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="32" cy="32" r="22"/>
                                        <circle cx="32" cy="32" r="13"/>
                                        <circle cx="32" cy="32" r="3" fill="currentColor" stroke="none"/>
                                    </svg>
                                    @break
                                @case('folder')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 18a3 3 0 0 1 3-3h14l6 7h22a3 3 0 0 1 3 3v27a3 3 0 0 1-3 3H11a3 3 0 0 1-3-3z"/>
                                    </svg>
                                    @break
                                @case('document')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6h20l10 10v42a2 2 0 0 1-2 2H18a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z"/>
                                        <path d="M38 6v10h10"/>
                                        <line x1="22" y1="30" x2="42" y2="30"/>
                                        <line x1="22" y1="38" x2="42" y2="38"/>
                                        <line x1="22" y1="46" x2="34" y2="46"/>
                                    </svg>
                                    @break
                                @case('graduation')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 24 32 12l28 12-28 12z"/>
                                        <path d="M18 30v14c0 4 6 8 14 8s14-4 14-8V30"/>
                                        <path d="M56 24v16"/>
                                    </svg>
                                    @break
                                @case('flask')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M26 8h12"/>
                                        <path d="M28 8v16L14 50a4 4 0 0 0 4 6h28a4 4 0 0 0 4-6L36 24V8"/>
                                        <line x1="19" y1="40" x2="45" y2="40"/>
                                    </svg>
                                    @break
                                @case('handshake')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 28l12-10 12 8"/>
                                        <path d="M60 28 48 18l-12 8"/>
                                        <path d="M16 26l10 9a4 4 0 0 0 6-5"/>
                                        <path d="M48 26l-10 9a4 4 0 0 1-6-5l8-8 6 4"/>
                                        <path d="M4 28v10l10 8"/>
                                        <path d="M60 28v10l-10 8"/>
                                    </svg>
                                    @break
                            @endswitch
                        </div>

                        @if(!empty($s['ring']))
                            <svg class="lx-bento-ring" viewBox="0 0 120 120" aria-hidden="true">
                                <circle class="lx-bento-ring-track" cx="60" cy="60" r="52"/>
                                <circle class="lx-bento-ring-fill" cx="60" cy="60" r="52"
                                    data-lx-ring data-ring-target="{{ $s['value'] }}"/>
                            </svg>
                        @endif

                        <div class="lx-bento-value">
                            <span class="lx-bento-num" data-lx-counter
                                data-target="{{ $s['value'] }}"
                                data-decimals="{{ $s['decimals'] }}"
                                data-duration="{{ $s['size'] === 'xl' ? 1900 : 1400 }}">0</span><span class="lx-bento-suffix">{{ $s['suffix'] }}</span>
                        </div>

                        <h3 class="lx-bento-label">{{ $s['label'] }}</h3>
                        <p class="lx-bento-text">{{ $s['text'] }}</p>

                        @if(!empty($s['breakdown']))
                            <div class="lx-bento-breakdown">
                                @foreach($s['breakdown'] as $b)
                                    <div class="lx-bento-breakdown-item">
                                        <span class="lx-bento-breakdown-num" data-lx-counter
                                            data-target="{{ $b['value'] }}" data-duration="1200">0</span>
                                        <span class="lx-bento-breakdown-label">{{ $b['label'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Ilmiy mahsulotlar ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('lan.ilm_ishlanma') }}</span>
                <h2 class="lx-section-title">{{ __('institute_stats.products_title') }}</h2>
                <p class="lx-section-sub">{{ __('institute_stats.products_text') }}</p>
            </div>

            <div class="lx-stats-products" data-aos="fade-up">
                @foreach($products as $i => $p)
                    <div class="lx-stats-product" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <div class="lx-stats-product-icon" aria-hidden="true">
                            @switch($p['icon'])
                                @case('guide')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 10h28a4 4 0 0 1 4 4v38H16a4 4 0 0 1-4-4z"/>
                                        <path d="M44 14h8v38h-8"/>
                                        <line x1="20" y1="22" x2="36" y2="22"/>
                                        <line x1="20" y1="30" x2="36" y2="30"/>
                                    </svg>
                                    @break
                                @case('book')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10 12c6-4 14-4 20 0v40c-6-4-14-4-20 0z"/>
                                        <path d="M54 12c-6-4-14-4-20 0v40c6-4 14-4 20 0z"/>
                                    </svg>
                                    @break
                                @case('stack')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M32 8 6 20l26 12 26-12z"/>
                                        <path d="M6 32l26 12 26-12"/>
                                        <path d="M6 44l26 12 26-12"/>
                                    </svg>
                                    @break
                                @case('textbook')
                                    <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 14a4 4 0 0 1 4-4h16v46H12a4 4 0 0 1-4-4z"/>
                                        <path d="M56 14a4 4 0 0 0-4-4H36v46h16a4 4 0 0 0 4-4z"/>
                                        <line x1="32" y1="10" x2="32" y2="56"/>
                                    </svg>
                                    @break
                            @endswitch
                        </div>
                        <div class="lx-stats-product-value">
                            <span data-lx-counter data-target="{{ $p['value'] }}" data-duration="1200">0</span>
                        </div>
                        <span class="lx-stats-product-label">{{ $p['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Xotima ─────── --}}
    <section class="lx-stats-footer">
        <div class="container">
            <span class="lx-stats-footer-quote" aria-hidden="true">&ldquo;</span>
            <p class="lx-stats-footer-text" data-aos="fade-up">{{ __('institute_stats.footer') }}</p>
        </div>
    </section>

</div>

{{-- ─── Counter + ring animation (IntersectionObserver) ─── --}}
<script>
(function () {
    var counters = document.querySelectorAll('[data-lx-counter]');
    var rings = document.querySelectorAll('[data-lx-ring]');
    if (!counters.length && !rings.length) return;

    var prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function easeOutCubic(t) { return 1 - Math.pow(1 - t, 3); }

    function formatNumber(v, decimals, spaced) {
        var s = decimals > 0 ? v.toFixed(decimals) : Math.round(v).toString();
        if (spaced) s = s.replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        return s;
    }

    function runCounter(el) {
        var target   = parseFloat(el.getAttribute('data-target')) || 0;
        var duration = parseInt(el.getAttribute('data-duration'), 10) || 1400;
        var decimals = parseInt(el.getAttribute('data-decimals'), 10) || 0;
        var spaced   = el.getAttribute('data-space') === '1';

        if (prefersReduced) {
            el.textContent = formatNumber(target, decimals, spaced);
            return;
        }

        var start = null;
        function tick(ts) {
            if (start === null) start = ts;
            var p = Math.min((ts - start) / duration, 1);
            var v = target * easeOutCubic(p);
            el.textContent = formatNumber(v, decimals, spaced);
            if (p < 1) requestAnimationFrame(tick);
            else el.textContent = formatNumber(target, decimals, spaced);
        }
        requestAnimationFrame(tick);
    }

    function runRing(el) {
        var target = parseFloat(el.getAttribute('data-ring-target')) || 0;
        var r = el.r ? el.r.baseVal.value : 52;
        var circumference = 2 * Math.PI * r;
        el.style.strokeDasharray = circumference;
        el.style.strokeDashoffset = circumference;

        var duration = 1900;

        if (prefersReduced) {
            el.style.strokeDashoffset = circumference * (1 - target / 100);
            return;
        }

        var start = null;
        function tick(ts) {
            if (start === null) start = ts;
            var p = Math.min((ts - start) / duration, 1);
            var pct = target * easeOutCubic(p);
            el.style.strokeDashoffset = circumference * (1 - pct / 100);
            if (p < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    }

    if (!('IntersectionObserver' in window)) {
        counters.forEach(runCounter);
        rings.forEach(runRing);
        return;
    }

    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            var el = entry.target;
            if (el.hasAttribute('data-lx-counter')) runCounter(el);
            if (el.hasAttribute('data-lx-ring')) runRing(el);
            io.unobserve(el);
        });
    }, { threshold: 0.4 });

    counters.forEach(function (el) { io.observe(el); });
    rings.forEach(function (el) { io.observe(el); });
})();
</script>
</x-main>
