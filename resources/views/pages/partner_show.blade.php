<x-main title="{{ $new->name }}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner3.jpg',
            'assets/img/aa.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));
        $logo = $new->photos->first();
        $extraPhotos = $new->photos->skip(1)->values();
        $partnerInitial = mb_strtoupper(mb_substr(trim($new->name ?? '?'), 0, 1));
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
                <a href="{{ route('categoryId', $category->id) }}">{{ $category->slug }}</a>
                <span class="sep">—</span>
                <span>{{ \Illuminate\Support\Str::limit($new->name, 50) }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ $category->slug }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $new->name }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
        </div>
    </section>

    {{-- ─────── Partner body ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-partner-single">

                <div class="lx-partner-single-grid">

                    <div class="lx-partner-single-logo" data-aos="fade-right">
                        @if($logo)
                            <img src="{{ asset('storage/'.$logo->file_path) }}"
                                 alt="{{ $new->name }}"
                                 loading="eager"
                                 onerror="this.outerHTML='<div class=&quot;lx-partner-tile-empty&quot;>{{ $partnerInitial }}</div>'">
                        @else
                            <div class="lx-partner-tile-empty">{{ $partnerInitial }}</div>
                        @endif
                    </div>

                    <div class="lx-partner-single-info" data-aos="fade-left">
                        <span class="lx-eyebrow">{{ $category->slug }}</span>
                        <h2 class="lx-partner-single-name">{{ $new->name }}</h2>

                        @if(!empty($new->title))
                            <p class="lx-partner-single-subtitle">{{ $new->title }}</p>
                        @endif

                        <div class="lx-partner-single-divider"></div>

                        @if(!empty($new->description))
                            <div class="lx-partner-single-description">
                                {!! $new->description !!}
                            </div>
                        @endif

                        @if(!empty($new->telegram_link) || !empty($new->facebook_link) || !empty($new->youtube_link) || !empty($new->whatsapp_link))
                            <div class="lx-partner-single-links">
                                @if(!empty($new->telegram_link))
                                    <a href="{{ $new->telegram_link }}" target="_blank" rel="noopener" class="lx-partner-link">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="m21.7 3.3-19 7.5c-.7.3-.7 1.4 0 1.7l4.6 1.5 1.7 5.4c.2.7 1.1.9 1.5.3l2.6-3.4 4.5 3.3c.5.4 1.3.1 1.4-.5l3-14c.2-.7-.6-1.4-1.3-1.1zM10.6 14.4l.4-2.7 8.7-7.7-8.7 9-.4 1.4z"/></svg>
                                        Telegram
                                    </a>
                                @endif
                                @if(!empty($new->facebook_link))
                                    <a href="{{ $new->facebook_link }}" target="_blank" rel="noopener" class="lx-partner-link">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.6 9.9V14.9H8v-2.9h2.4V9.8c0-2.4 1.4-3.8 3.6-3.8 1 0 2.1.2 2.1.2v2.4h-1.2c-1.2 0-1.5.7-1.5 1.5v1.9h2.6l-.4 2.9h-2.2v6.9A10 10 0 0 0 22 12z"/></svg>
                                        Facebook
                                    </a>
                                @endif
                                @if(!empty($new->youtube_link))
                                    <a href="{{ $new->youtube_link }}" target="_blank" rel="noopener" class="lx-partner-link">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.5a3 3 0 0 0-2.1-2.1C19.5 4 12 4 12 4s-7.5 0-9.4.4A3 3 0 0 0 .5 6.5C0 8.4 0 12 0 12s0 3.6.5 5.5a3 3 0 0 0 2.1 2.1C4.5 20 12 20 12 20s7.5 0 9.4-.4a3 3 0 0 0 2.1-2.1c.5-1.9.5-5.5.5-5.5s0-3.6-.5-5.5zM9.6 15.6V8.4l6.2 3.6-6.2 3.6z"/></svg>
                                        YouTube
                                    </a>
                                @endif
                                @if(!empty($new->whatsapp_link))
                                    <a href="{{ $new->whatsapp_link }}" target="_blank" rel="noopener" class="lx-partner-link">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M20 3.5A10 10 0 0 0 4 17l-1.5 5.5L8 21a10 10 0 0 0 12-17.5zM12 19.5a8 8 0 0 1-4-1.1l-.3-.2-3 .8.8-3-.2-.3a8 8 0 1 1 13.7-5.6 8 8 0 0 1-7 9.4zm4.4-6c-.2-.1-1.4-.7-1.6-.8-.2-.1-.4-.1-.5.1-.2.2-.6.8-.8 1-.1.2-.3.2-.5.1-.2-.1-1-.4-2-1.2-.7-.6-1.2-1.4-1.4-1.6-.1-.2 0-.4.1-.5l.4-.4.2-.4c0-.1 0-.3 0-.4l-.7-1.7c-.2-.4-.4-.4-.5-.4h-.5a.9.9 0 0 0-.7.3c-.2.3-.9.9-.9 2.2 0 1.3 1 2.5 1 2.7.2.2 1.9 2.9 4.5 4 .6.3 1.1.4 1.5.6.6.2 1.2.2 1.6.1.5-.1 1.4-.6 1.6-1.1.2-.5.2-1 .1-1.1l-.5-.3z"/></svg>
                                        WhatsApp
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                @if($extraPhotos->count())
                    <h3 class="lx-section-title" style="text-align: left; font-size: 28px; margin: 60px 0 28px;" data-aos="fade-up">
                        <span class="lx-eyebrow" style="display: block; margin-bottom: 12px;">Galereya</span>
                    </h3>
                    <div class="lx-news-list-grid" data-aos="fade-up">
                        @foreach($extraPhotos as $photo)
                            <div class="lx-news-card" style="cursor: default;">
                                <div class="lx-news-thumb">
                                    <img src="{{ asset('storage/'.$photo->file_path) }}"
                                         alt="{{ $new->name }}"
                                         loading="lazy"
                                         onerror="this.style.display='none'">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="lx-article-foot" data-aos="fade-up">
                    <a href="{{ route('categoryId', $category->id) }}" class="lx-btn lx-btn-dark">
                        <span class="arrow-back">&larr;</span>
                        <span>{{ __('lan.ortga') }}</span>
                    </a>
                    <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                        <span>{{ __('lan.bosh') }}</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

</div>
</x-main>
