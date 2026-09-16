<x-main title="{{ __('cooperation_contact.title') }} — {{ __('lan.kriminalog') }}">
<div class="home-luxury">

    @php
        $heroBg = collect([
            'assets/img/banner3.jpg',
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));

        $addressValue = __('cooperation_contact.address_value');
        $mapUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($addressValue);
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
                <span>{{ __('lan.xalqaro_hamkorlik') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.hamkorlik_uchun_murojaat') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('cooperation_contact.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('cooperation_contact.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('cooperation_contact.subtitle') }}</p>
        </div>
    </section>

    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            {{-- ─────── Tashkilot / bo'lim kartasi ─────── --}}
            <div class="lx-contact-org" data-aos="fade-up">
                <span class="lx-contact-org-icon" aria-hidden="true">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18"/>
                        <path d="M2 22h20"/>
                        <path d="M9 8h1M14 8h1M9 12h1M14 12h1M9 16h1M14 16h1"/>
                    </svg>
                </span>
                <div class="lx-contact-org-body">
                    <h2 class="lx-contact-org-name">{{ __('lan.kriminalog') }}</h2>
                    <span class="lx-contact-org-dept">{{ __('cooperation_contact.department') }}</span>
                </div>
            </div>

            {{-- ─────── Aloqa vositalari (Grid Cards) ─────── --}}
            <div class="lx-contact-grid" data-aos="fade-up">
                @foreach($channels as $c)
                    <div class="lx-contact-card">
                        <a href="{{ $c['href'] }}"
                           class="lx-contact-card-link"
                           @if($c['key'] === 'whatsapp') target="_blank" rel="noopener" @endif>
                            <span class="lx-contact-card-icon" aria-hidden="true">
                                @switch($c['icon'])
                                    @case('phone')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                        @break
                                    @case('mobile')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="2" width="12" height="20" rx="2"/><line x1="10" y1="19" x2="14" y2="19"/></svg>
                                        @break
                                    @case('whatsapp')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.5 8.5 0 0 1-12.36 7.57L3 21l1.93-5.64A8.5 8.5 0 1 1 21 11.5z"/><path d="M8.5 10s.5-1 1.5-1 1.3 1.4 1.9 2.3c.6.9 1.4 1.8 2.3 2.4.9.6 1.9 1 1.9 1s1-.6 1.3-1.1"/></svg>
                                        @break
                                    @case('email')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg>
                                        @break
                                @endswitch
                            </span>
                            <span class="lx-contact-card-label">{{ $c['label'] }}</span>
                            <span class="lx-contact-card-value">{{ $c['value'] }}</span>
                        </a>

                        <button type="button"
                                class="lx-contact-copy-btn"
                                data-copy="{{ $c['value'] }}"
                                aria-label="{{ __('cooperation_contact.copy') }}"
                                title="{{ __('cooperation_contact.copy') }}">
                            <svg class="lx-copy-icon-default" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2"/>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                            </svg>
                            <svg class="lx-copy-icon-done" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>

            {{-- ─────── Manzil (Map banner) ─────── --}}
            <a href="{{ $mapUrl }}" target="_blank" rel="noopener" class="lx-contact-address" data-aos="fade-up">
                <div class="lx-contact-address-map" aria-hidden="true">
                    <svg class="lx-contact-address-pin" width="140" height="140" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M12 2C7.6 2 4 5.6 4 10c0 6 8 12 8 12s8-6 8-12c0-4.4-3.6-8-8-8zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                </div>
                <div class="lx-contact-address-body">
                    <span class="lx-contact-address-label">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 6-9 13-9 13s-9-7-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        {{ __('cooperation_contact.labels.address') }}
                    </span>
                    <p class="lx-contact-address-text">{{ $addressValue }}</p>
                    <span class="lx-contact-address-cta">
                        {{ __('cooperation_contact.action_map') }}
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    </span>
                </div>
            </a>

        </div>
    </section>

</div>

<script>
(function () {
    var buttons = document.querySelectorAll('[data-copy]');
    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var text = btn.getAttribute('data-copy');
            if (!navigator.clipboard) return;
            navigator.clipboard.writeText(text).then(function () {
                btn.classList.add('is-copied');
                setTimeout(function () {
                    btn.classList.remove('is-copied');
                }, 1600);
            });
        });
    });
})();
</script>

</x-main>
