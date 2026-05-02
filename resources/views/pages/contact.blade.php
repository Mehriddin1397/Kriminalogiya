<x-main title="{{ __('lan.boglanish') }}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
            'assets/img/bg1.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));
    @endphp

    <section class="lx-page-hero">
        @if($heroBg)
            <div class="lx-page-hero-bg" aria-hidden="true">
                <img src="{{ asset($heroBg) }}" alt="" loading="lazy">
            </div>
        @endif

        <div class="lx-page-hero-decor" aria-hidden="true">
            <img src="{{ asset('assets/img/kti-logo.png') }}" alt="">
        </div>

        <div class="container">
            <div class="lx-breadcrumb" data-aos="fade-up">
                <a href="{{ route('main') }}">{{ __('lan.bosh_sahifa') ?? 'Bosh sahifa' }}</a>
                <span class="sep">—</span>
                <span>{{ __('lan.boglanish') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">Contact</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.boglanish') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ __('lan.kriminalog') }}
            </p>
        </div>
    </section>

    {{-- ─────── Contact body ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            {{-- Quick contact cards (3 ta) --}}
            @isset($contact)
                <div class="lx-contact-quick">

                    @if(!empty($contact->address))
                        <div class="lx-contact-quick-card" data-aos="fade-up" data-aos-delay="0">
                            <div class="lx-contact-quick-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <span class="lx-contact-quick-label">{{ __('lan.address') }}</span>
                            <div class="lx-contact-quick-value">{{ $contact->address }}</div>
                        </div>
                    @endif

                    @if(!empty($contact->phone))
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contact->phone) }}"
                           class="lx-contact-quick-card" data-aos="fade-up" data-aos-delay="120">
                            <div class="lx-contact-quick-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.94.36 1.86.7 2.74a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.34-1.34a2 2 0 0 1 2.11-.45c.88.34 1.8.57 2.74.7a2 2 0 0 1 1.72 2z"/>
                                </svg>
                            </div>
                            <span class="lx-contact-quick-label">{{ __('lan.telefon') ?? 'Telefon' }}</span>
                            <div class="lx-contact-quick-value">{{ $contact->phone }}</div>
                        </a>
                    @endif

                    @if(!empty($contact->email))
                        <a href="mailto:{{ $contact->email }}"
                           class="lx-contact-quick-card" data-aos="fade-up" data-aos-delay="240">
                            <div class="lx-contact-quick-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <path d="m22 6-10 7L2 6"/>
                                </svg>
                            </div>
                            <span class="lx-contact-quick-label">Email</span>
                            <div class="lx-contact-quick-value">{{ $contact->email }}</div>
                        </a>
                    @endif

                </div>
            @endisset

            {{-- Map + detailed info --}}
            <div class="lx-contact-grid">

                <div class="lx-contact-map" data-aos="fade-up">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.7171271314264!2d69.35085011134264!3d41.33676407118661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef5000b14d5e3%3A0x4aaeaebef082e1c2!2sKriminologiya%20tadqiqot%20instituti!5e0!3m2!1suz!2s!4v1745345559699!5m2!1suz!2s"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            aria-hidden="false"
                            tabindex="0"></iframe>
                </div>

                <div class="lx-contact-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="lx-contact-card-head">
                        <div class="lx-contact-card-eyebrow">Kriminalogiya Instituti</div>
                        <h2 class="lx-contact-card-title">{{ __('lan.boglanish') }}</h2>
                    </div>

                    <ul class="lx-contact-card-list">
                        @isset($contact)
                            @if(!empty($contact->address))
                                <li>
                                    <span class="lx-contact-card-label">{{ __('lan.address') }}</span>
                                    <span class="lx-contact-card-value">{{ $contact->address }}</span>
                                </li>
                            @endif
                            @if(!empty($contact->worktime))
                                <li>
                                    <span class="lx-contact-card-label">{{ __('lan.ish_jadvali') ?? 'Ish vaqti' }}</span>
                                    <span class="lx-contact-card-value">{{ $contact->worktime }}</span>
                                </li>
                            @else
                                <li>
                                    <span class="lx-contact-card-label">{{ __('lan.ish_jadvali') ?? 'Ish vaqti' }}</span>
                                    <span class="lx-contact-card-value">{{ __('lan.ish_vaqt') }}</span>
                                </li>
                            @endif
                            @if(!empty($contact->phone))
                                <li>
                                    <span class="lx-contact-card-label">{{ __('lan.telefon') ?? 'Telefon' }}</span>
                                    <span class="lx-contact-card-value">
                                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contact->phone) }}">{{ $contact->phone }}</a>
                                    </span>
                                </li>
                            @endif
                            @if(!empty($contact->email))
                                <li>
                                    <span class="lx-contact-card-label">Email</span>
                                    <span class="lx-contact-card-value">
                                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a><br>
                                        <a href="mailto:kti@iiv.uz">kti@iiv.uz</a>
                                    </span>
                                </li>
                            @endif
                        @endisset
                    </ul>
                </div>

            </div>

            {{-- Social strip --}}
            @isset($contact)
                <div class="lx-contact-social" data-aos="fade-up">
                    <div class="lx-contact-social-eyebrow">Ijtimoiy tarmoqlar</div>
                    <div class="lx-contact-social-row">
                        @if(!empty($contact->telegram_link))
                            <a href="{{ $contact->telegram_link }}" target="_blank" rel="noopener"
                               class="lx-contact-social-link" aria-label="Telegram">
                                <i class="fab fa-telegram"></i>
                            </a>
                        @endif
                        @if(!empty($contact->facebook_link))
                            <a href="{{ $contact->facebook_link }}" target="_blank" rel="noopener"
                               class="lx-contact-social-link" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(!empty($contact->youtube_link))
                            <a href="{{ $contact->youtube_link }}" target="_blank" rel="noopener"
                               class="lx-contact-social-link" aria-label="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        @endif
                        @if(!empty($contact->whatsapp_link))
                            <a href="{{ $contact->whatsapp_link }}" target="_blank" rel="noopener"
                               class="lx-contact-social-link" aria-label="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        @endif
                    </div>
                </div>
            @endisset

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.bosh') }}</span>
                </a>
            </div>

        </div>
    </section>

</div>
</x-main>
