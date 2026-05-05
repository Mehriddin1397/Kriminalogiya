<x-main title="{{ __('lan.ins_nor_hujjat') }}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner3.jpg',
            'assets/img/aa.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));

        $featured = [
            [
                'num'   => '01',
                'href'  => 'https://lex.uz/uz/docs/7034904',
                'label' => __('lan.qaror_kri'),
                'kind'  => __('lan.qarori'),
            ],
            [
                'num'   => '02',
                'href'  => 'https://www.lex.uz/uz/docs/-6755597',
                'label' => __('lan.farmoni'),
                'kind'  => 'Lex.uz',
            ],
            [
                'num'   => '03',
                'href'  => 'https://www.lex.uz/docs/-6755253',
                'label' => __('lan.qarori'),
                'kind'  => 'Lex.uz',
            ],
        ];

        $totalDocs = ($resources->total() ?? $resources->count()) + count($featured);
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
                <span>{{ __('lan.ins_nor_hujjat') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.ins_nor') ?? 'Normativ-huquqiy hujjatlar' }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.ins_nor_hujjat') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ $totalDocs }}</p>
        </div>
    </section>

    {{-- ─────── Rasmiy hujjatlar (Lex.uz) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-doc-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">Lex.uz</span>
                <h2 class="lx-section-title" style="text-align: left; margin: 14px 0 0;">
                    {{ __('lan.qaror_kri') }}
                </h2>
                <div class="lx-page-divider" style="margin: 22px 0 0; transform: none;"></div>
            </div>

            <div class="lx-doc-featured-grid">
                @foreach($featured as $i => $doc)
                    <a href="{{ $doc['href'] }}" target="_blank" rel="noopener"
                       class="lx-doc-featured-card"
                       data-aos="fade-up"
                       data-aos-delay="{{ $i * 100 }}">
                        <span class="lx-doc-featured-num">{{ $doc['num'] }}</span>
                        <div class="lx-doc-featured-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="9" y1="13" x2="15" y2="13"/>
                                <line x1="9" y1="17" x2="13" y2="17"/>
                            </svg>
                        </div>
                        <span class="lx-doc-featured-kind">{{ $doc['kind'] }}</span>
                        <h3 class="lx-doc-featured-title">{{ $doc['label'] }}</h3>
                        <span class="lx-doc-featured-cta">
                            <span>{{ __('lan.batafsil') }}</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M7 17L17 7"/>
                                <polyline points="7 7 17 7 17 17"/>
                            </svg>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Hujjatlar arxivi ─────── --}}
    <section class="lx-section" style="background: linear-gradient(180deg, var(--lx-cream) 0%, #ecebe6 100%);">
        <div class="container">
            <div class="lx-doc-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('lan.ins_nor') ?? 'Arxiv' }}</span>
                <h2 class="lx-section-title" style="text-align: left; margin: 14px 0 0;">
                    {{ __('lan.ins_nor_hujjat') }}
                </h2>
                <div class="lx-page-divider" style="margin: 22px 0 0; transform: none;"></div>
            </div>

            @if($resources->count())
                <div class="lx-doc-list">
                    @foreach($resources as $i => $item)
                        @php
                            $isLink = !empty($item->link);
                            $url = $isLink ? $item->link : asset('storage/' . $item->file);
                            $ext = $isLink ? '' : strtolower(pathinfo($item->file ?? '', PATHINFO_EXTENSION));
                            $title = $item->name_uz; // accessor returns localized via __get
                        @endphp

                        <a href="{{ $url }}" target="_blank" rel="noopener"
                           class="lx-doc-row"
                           data-aos="fade-up"
                           data-aos-delay="{{ ($i % 5) * 60 }}">
                            <div class="lx-doc-row-icon {{ $isLink ? 'is-link' : 'is-file' }}" aria-hidden="true">
                                @if($isLink)
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                                    </svg>
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                        <polyline points="14 2 14 8 20 8"/>
                                    </svg>
                                    @if($ext)
                                        <span class="lx-doc-row-ext">{{ $ext }}</span>
                                    @endif
                                @endif
                            </div>

                            <div class="lx-doc-row-body">
                                <h4 class="lx-doc-row-title">{{ $title }}</h4>
                                <div class="lx-doc-row-meta">
                                    @if($item->created_at)
                                        <span class="lx-doc-row-date">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                <line x1="16" y1="2" x2="16" y2="6"/>
                                                <line x1="8" y1="2" x2="8" y2="6"/>
                                                <line x1="3" y1="10" x2="21" y2="10"/>
                                            </svg>
                                            {{ $item->created_at->format('d.m.Y') }}
                                        </span>
                                    @endif
                                    <span class="lx-doc-row-tag {{ $isLink ? 'is-link' : 'is-file' }}">
                                        {{ $isLink ? 'Lex.uz' : strtoupper($ext ?: 'PDF') }}
                                    </span>
                                </div>
                            </div>

                            <span class="lx-doc-row-cta" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                    <polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </span>
                        </a>
                    @endforeach
                </div>

                @if(method_exists($resources, 'links') && $resources->lastPage() > 1)
                    <div class="lx-pagination" data-aos="fade-up">
                        {{ $resources->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            @else
                <div class="lx-empty-state" data-aos="fade-up">
                    {{ __('lan.malumot_yoq') ?? "Ma'lumot topilmadi." }}
                </div>
            @endif

            {{-- Social share footer --}}
            @if(!empty($contact))
                <div class="lx-doc-share" data-aos="fade-up">
                    <span class="lx-eyebrow">{{ __('lan.hamkor') }}</span>
                    <div class="lx-doc-share-icons">
                        @if(!empty($contact->telegram_link))
                            <a href="{{ $contact->telegram_link }}" target="_blank" rel="noopener" aria-label="Telegram">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="m21.7 3.3-19 7.5c-.7.3-.7 1.4 0 1.7l4.6 1.5 1.7 5.4c.2.7 1.1.9 1.5.3l2.6-3.4 4.5 3.3c.5.4 1.3.1 1.4-.5l3-14c.2-.7-.6-1.4-1.3-1.1zM10.6 14.4l.4-2.7 8.7-7.7-8.7 9-.4 1.4z"/></svg>
                            </a>
                        @endif
                        @if(!empty($contact->facebook_link))
                            <a href="{{ $contact->facebook_link }}" target="_blank" rel="noopener" aria-label="Facebook">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.6 9.9V14.9H8v-2.9h2.4V9.8c0-2.4 1.4-3.8 3.6-3.8 1 0 2.1.2 2.1.2v2.4h-1.2c-1.2 0-1.5.7-1.5 1.5v1.9h2.6l-.4 2.9h-2.2v6.9A10 10 0 0 0 22 12z"/></svg>
                            </a>
                        @endif
                        @if(!empty($contact->whatsapp_link))
                            <a href="{{ $contact->whatsapp_link }}" target="_blank" rel="noopener" aria-label="WhatsApp">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20 3.5A10 10 0 0 0 4 17l-1.5 5.5L8 21a10 10 0 0 0 12-17.5zM12 19.5a8 8 0 0 1-4-1.1l-.3-.2-3 .8.8-3-.2-.3a8 8 0 1 1 13.7-5.6 8 8 0 0 1-7 9.4z"/></svg>
                            </a>
                        @endif
                        @if(!empty($contact->youtube_link))
                            <a href="{{ $contact->youtube_link }}" target="_blank" rel="noopener" aria-label="YouTube">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.5a3 3 0 0 0-2.1-2.1C19.5 4 12 4 12 4s-7.5 0-9.4.4A3 3 0 0 0 .5 6.5C0 8.4 0 12 0 12s0 3.6.5 5.5a3 3 0 0 0 2.1 2.1C4.5 20 12 20 12 20s7.5 0 9.4-.4a3 3 0 0 0 2.1-2.1c.5-1.9.5-5.5.5-5.5s0-3.6-.5-5.5zM9.6 15.6V8.4l6.2 3.6-6.2 3.6z"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            @endif

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.ortga') }}</span>
                </a>
            </div>
        </div>
    </section>

</div>
</x-main>
