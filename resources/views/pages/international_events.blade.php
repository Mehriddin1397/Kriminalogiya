<x-main title="{{ __('international_events.title') }} — {{ __('lan.kriminalog') }}">
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
                <span>{{ __('lan.xalqaro_hamkorlik') }}</span>
                <span class="sep">—</span>
                <span>{{ __('lan.xalqaro_tadbirlar') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('international_events.eyebrow') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('international_events.title') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('international_events.subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Blok 1: Xalqaro forumlar (Highlight banner) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('international_events.forums_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('international_events.forums_title') }}</h2>
                <p class="lx-section-sub">{{ __('international_events.forums_intro') }}</p>
            </div>

            <div class="lx-forum-grid">
                @foreach($forums as $i => $forum)
                    @php $forumModalId = 'forumPhotosModal' . $forum->id; @endphp
                    <div class="lx-forum-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <span class="lx-forum-card-num" aria-hidden="true">{{ $i + 1 }}</span>
                        <span class="lx-forum-card-label">{{ $forum->label }}</span>
                        <span class="lx-forum-card-dates">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            {{ $forum->datesLabel() }}
                        </span>

                        <button type="button"
                                class="lx-forum-card-theme lx-forum-card-theme-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#{{ $forumModalId }}">
                            {{ $forum->theme }}
                        </button>

                        <p class="lx-forum-card-text">{{ $forum->description }}</p>

                        @if(!empty($forum->statsList()))
                            <div class="lx-forum-card-stats">
                                @foreach($forum->statsList() as $stat)
                                    <div class="lx-forum-stat">
                                        <span class="lx-forum-stat-num">{{ $stat['num'] }}</span>
                                        <span class="lx-forum-stat-label">{{ $stat['label'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <button type="button"
                                class="lx-forum-card-photos-cta"
                                data-bs-toggle="modal"
                                data-bs-target="#{{ $forumModalId }}">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <path d="m21 15-5-5L5 21"/>
                            </svg>
                            {{ __('international_events.forums_photos_cta') }}
                            @if($forum->photos->count())
                                <span class="lx-forum-card-photos-count">{{ $forum->photos->count() }}</span>
                            @endif
                        </button>
                    </div>

                    <div class="modal fade lx-modal" id="{{ $forumModalId }}" tabindex="-1" aria-labelledby="{{ $forumModalId }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div>
                                        <h5 class="modal-title" id="{{ $forumModalId }}Label">{{ $forum->theme }}</h5>
                                        <div class="lx-leader-eyebrow" style="margin-top:6px;">{{ $forum->label }}</div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('lan.yopish') }}">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M18 6 6 18M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    @if($forum->photos->count())
                                        <div class="lx-forum-photo-grid">
                                            @foreach($forum->photos as $photo)
                                                <a href="{{ asset('storage/'.$photo->file_path) }}" target="_blank" rel="noopener">
                                                    <img src="{{ asset('storage/'.$photo->file_path) }}"
                                                         alt="{{ $forum->theme }}"
                                                         loading="lazy"
                                                         onerror="this.closest('a').style.display='none'">
                                                </a>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="lx-page-meta" style="margin:0;">{{ __('international_events.forums_photos_empty') }}</p>
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
        </div>
    </section>

    {{-- ─────── Blok 1.5: Xalqaro uchrashuvlar (Yangiliklar formatida) ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('international_events.meetings_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('international_events.meetings_title') }}</h2>
                <p class="lx-section-sub">{{ __('international_events.meetings_intro') }}</p>
            </div>

            @if($meetings->count())
                <div class="lx-news-list-grid">
                    @foreach($meetings as $i => $meeting)
                        <a href="{{ route('international_meeting_show', $meeting->id) }}"
                           class="lx-news-card"
                           data-aos="fade-up"
                           data-aos-delay="{{ ($i % 3) * 100 }}">
                            <div class="lx-news-thumb">
                                <div class="lx-news-thumb-empty" aria-hidden="true">
                                    <span>Kriminalogiya</span>
                                </div>
                                @if($photo = $meeting->photos->first())
                                    <img src="{{ asset('storage/'.$photo->file_path) }}"
                                         alt="{{ $meeting->name }}"
                                         loading="lazy"
                                         onerror="this.style.display='none'">
                                @endif
                            </div>
                            <div class="lx-news-body">
                                <div class="lx-news-meta">
                                    <span>{{ optional($meeting->event_date)->format('d.m.Y') }}</span>
                                </div>
                                <h4 class="lx-news-title">{{ $meeting->name }}</h4>
                                <span class="lx-news-readmore">
                                    {{ __('lan.batafsil') }} &rarr;
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if($meetings->hasPages())
                    <div class="lx-pagination" data-aos="fade-up">
                        {{ $meetings->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            @else
                <div class="lx-empty-state">
                    {{ __('lan.malumot_yoq') ?? "Ma'lumot topilmadi." }}
                </div>
            @endif
        </div>
    </section>

    {{-- ─────── Blok 2: Xorijiy xizmat safarlari (Grid Cards) ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-doc-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('international_events.trips_eyebrow') }}</span>
                <h2 class="lx-section-title" style="text-align: left; margin: 14px 0 0;">
                    {{ __('international_events.trips_title') }}
                </h2>
                <p class="lx-section-sub" style="margin: 14px 0 0; text-align: left; max-width: 720px;">
                    {{ __('international_events.trips_intro') }}
                </p>
                <div class="lx-page-divider" style="margin: 22px 0 0; transform: none;"></div>
            </div>

            <div class="lx-memo-grid">
                @foreach($trips as $i => $t)
                    <div class="lx-memo-card" data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 80 }}">
                        <div class="lx-memo-card-head">
                            <span class="lx-memo-card-flag" aria-hidden="true">
                                <x-flag-icon :code="$t['flag']" />
                            </span>
                            <span class="lx-memo-card-country">{{ $t['country'] }}</span>
                        </div>
                        <p class="lx-memo-card-org">{{ $t['event'] }}</p>
                        <div class="lx-memo-card-footer">
                            <span class="lx-memo-badge lx-memo-badge-type is-memorandum">
                                {{ $t['badge'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 3: KOICA loyihasi (VIP Highlight banner) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <span class="lx-eyebrow" data-aos="fade-up" style="display:flex; justify-content:center; margin-bottom:22px;">
                {{ __('international_events.project_eyebrow') }}
            </span>

            <div class="lx-project-banner" data-aos="fade-up">
                <span class="lx-project-badge-vip" aria-hidden="true">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2l2.6 6.9 7.4.5-5.7 4.8 1.9 7.1L12 17.3 5.8 21.3l1.9-7.1L2 9.4l7.4-.5z"/></svg>
                    {{ __('international_events.project_badge') }}
                </span>

                <h2 class="lx-project-title">{{ __('international_events.project_title') }}</h2>
                <p class="lx-project-text">{{ __('international_events.project_text') }}</p>

                <div class="lx-project-meta-row">
                    <span class="lx-project-period">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="9"/>
                            <polyline points="12 7 12 12 15.5 14"/>
                        </svg>
                        {{ __('international_events.project_period') }}
                    </span>
                    <span class="lx-project-partner">
                        <span class="lx-project-partner-flag"><x-flag-icon code="kr" /></span>
                        {{ __('international_events.project_partner_kicj') }}
                    </span>
                    <span class="lx-project-partner">
                        <span class="lx-project-partner-flag"><x-flag-icon code="kr" /></span>
                        {{ __('international_events.project_partner_koica') }}
                    </span>
                </div>

                <p class="lx-project-status">{{ __('international_events.project_status') }}</p>
            </div>
        </div>
    </section>

</div>
</x-main>
