<x-main title="{{__('lan.rahbariyat')}}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    @php
        $heroBg = collect([
            'assets/img/banner2.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner1.jpg',
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
                <span>{{ __('lan.rahbariyat') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">Institut</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.rahbariyat') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                {{ $boss->count() }} {{ __('lan.lavozim') ?? 'lavozim' }}
            </p>
        </div>
    </section>

    {{-- ─────── Leaders grid ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">Bizning jamoa</span>
                <h2 class="lx-section-title">{{ __('lan.ins_rahbariyat') ?? __('lan.rahbariyat') }}</h2>
                <p class="lx-section-sub">
                    Institutimiz rahbariyati tarkibi va vakolatlari haqida ma'lumotlar.
                </p>
            </div>

            @if($boss->count())
                <div class="lx-leaders-grid">
                    @foreach($boss as $i => $bos)
                        @php
                            $photo = $bos->photos->first();
                            $modalId = 'bossModal' . $bos->id;
                            $initial = mb_strtoupper(mb_substr(trim($bos->name ?? '?'), 0, 1));
                        @endphp

                        <a href="#"
                           role="button"
                           class="lx-leader-card"
                           data-bs-toggle="modal"
                           data-bs-target="#{{ $modalId }}"
                           data-aos="fade-up"
                           data-aos-delay="{{ ($i % 3) * 120 }}">
                            <div class="lx-leader-photo">
                                <div class="lx-leader-photo-empty" aria-hidden="true">
                                    <span>{{ $initial }}</span>
                                </div>
                                @if($photo)
                                    <img src="{{ asset('storage/'.$photo->file_path) }}"
                                         alt="{{ $bos->name }}"
                                         loading="lazy"
                                         onerror="this.style.display='none'">
                                @endif
                                <div class="lx-leader-overlay">
                                    <span class="lx-leader-view">
                                        {{ __('lan.batafsil') }} &rarr;
                                    </span>
                                </div>
                            </div>
                            <div class="lx-leader-info">
                                <div class="lx-leader-eyebrow">{{ $bos->post }}</div>
                                <h3 class="lx-leader-name">{{ $bos->name }}</h3>
                            </div>
                        </a>

                        {{-- Modal --}}
                        <div class="modal fade lx-modal"
                             id="{{ $modalId }}"
                             tabindex="-1"
                             aria-labelledby="{{ $modalId }}Label"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div>
                                            <div class="lx-leader-eyebrow" style="margin-bottom:6px;">{{ $bos->post }}</div>
                                            <h5 class="modal-title" id="{{ $modalId }}Label">{{ $bos->name }}</h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('lan.yopish') }}">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M18 6 6 18M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        @if(!empty($bos->phone))
                                            <div class="lx-modal-row">
                                                <span class="lx-modal-label">{{ __('lan.telefon') }}</span>
                                                <span class="lx-modal-value">
                                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $bos->phone) }}">{{ $bos->phone }}</a>
                                                </span>
                                            </div>
                                        @endif

                                        @if(!empty($bos->email))
                                            <div class="lx-modal-row">
                                                <span class="lx-modal-label">{{ __('lan.email') }}</span>
                                                <span class="lx-modal-value">
                                                    <a href="mailto:{{ $bos->email }}">{{ $bos->email }}</a>
                                                </span>
                                            </div>
                                        @endif

                                        @if(!empty($bos->worktime))
                                            <div class="lx-modal-row">
                                                <span class="lx-modal-label">{{ __('lan.ish_jadvali') }}</span>
                                                <span class="lx-modal-value">{{ $bos->worktime }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="lx-btn lx-btn-dark" data-bs-dismiss="modal">
                                            <span>{{ __('lan.yopish') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p style="text-align:center; color: var(--lx-text-soft); padding: 60px 0;">
                    {{ __('lan.malumot_yoq') ?? "Ma'lumot topilmadi." }}
                </p>
            @endif

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
