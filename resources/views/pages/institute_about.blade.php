<x-main title="{{ __('lan.ins_haq') }} — {{ __('lan.kriminalog') }}">
<div class="home-luxury">

    @php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
            'assets/img/bg1.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));
    @endphp

    {{-- ─────── Hero ─────── --}}
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
                <span>{{ __('lan.ins_haq') }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.institut') }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ __('lan.ins_haq') }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">{{ __('institute_about.subtitle') }}</p>
        </div>
    </section>

    {{-- ─────── Blok 1: Missiya ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-bottom: 56px;">
        <div class="container">
            <div class="lx-tl-intro" data-aos="fade-up">
                <p>{{ __('institute_about.mission_p1') }}</p>
                <p>{{ __('institute_about.mission_p2') }}</p>
            </div>
        </div>
    </section>

    {{-- ─────── Institut tarixi (Timeline) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-top: 0;">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('institute_history.eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('lan.ins_tarixi') }}</h2>
                <p class="lx-section-sub">{{ __('institute_history.subtitle') }}</p>
            </div>

            <div class="lx-timeline">
                @foreach($timeline as $i => $step)
                    <div class="lx-timeline-item" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="lx-timeline-dot" aria-hidden="true">
                            <span class="lx-timeline-icon">{{ $step['icon'] }}</span>
                        </div>
                        <div class="lx-timeline-card">
                            <span class="lx-timeline-period">{{ $step['period'] }}</span>
                            <h3 class="lx-timeline-title">{{ $step['title'] }}</h3>
                            <p class="lx-timeline-text">{{ $step['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 2: Fanlararo yondashuv (Grid Cards) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream); padding-top: 0;">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('institute_about.disciplines_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('institute_about.disciplines_title') }}</h2>
                <p class="lx-section-sub">{{ __('institute_about.disciplines_intro') }}</p>
            </div>

            <div class="lx-ab-disc-grid">
                @foreach($disciplines as $i => $d)
                    <div class="lx-ab-disc-card" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                        <span class="lx-ab-disc-icon" aria-hidden="true">{{ $d['icon'] }}</span>
                        <span class="lx-ab-disc-label">{{ $d['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 3: Strategik savollar (Highlights) ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('institute_about.highlights_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('institute_about.highlights_title') }}</h2>
                <p class="lx-section-sub">{{ __('institute_about.highlights_intro') }}</p>
            </div>

            <div class="lx-ab-highlights-grid">
                @foreach($highlights as $i => $h)
                    <div class="lx-ab-highlight-card" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <span class="lx-ab-highlight-quote" aria-hidden="true">&ldquo;</span>
                        <span class="lx-ab-highlight-icon" aria-hidden="true">{{ $h['icon'] }}</span>
                        <p class="lx-ab-highlight-text">{{ $h['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Blok 4: Bizning yondashuvimiz (Process flow) ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('institute_about.process_eyebrow') }}</span>
                <h2 class="lx-section-title">{{ __('institute_about.process_title') }}</h2>
                <p class="lx-section-sub">{{ __('institute_about.process_intro') }}</p>
            </div>

            <div class="lx-ab-process" data-aos="fade-up">
                @foreach($process as $i => $p)
                    <div class="lx-ab-step">
                        <span class="lx-ab-step-num">{{ $i + 1 }}</span>
                        <span class="lx-ab-step-icon" aria-hidden="true">{{ $p['icon'] }}</span>
                        <span class="lx-ab-step-label">{{ $p['label'] }}</span>
                    </div>
                    @if(!$loop->last)
                        <svg class="lx-ab-step-arrow" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─────── Rasmlarda: avvalgi va hozirgi holat ─────── --}}
    <section class="lx-section charcoal">
        <div class="container">
            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">{{ __('lan.institut') }}</span>
                <h2 class="lx-section-title">{{ __('lan.ins_oldingi_holat') }} / {{ __('lan.ins_hozirgi_holat') }}</h2>
            </div>

            <div class="lx-ab-gallery-row">
                <div class="lx-ab-gallery-col" data-aos="fade-up">
                    <h3 class="lx-ab-gallery-title">{{ __('lan.ins_oldingi_holat') }}</h3>
                    @if($oldImages->count())
                        <div class="lx-ab-slideshow" data-lx-ab-slideshow>
                            @foreach($oldImages as $i => $img)
                                <a href="{{ asset('storage/'.$img->file_path) }}"
                                   data-lightbox="gallery-old"
                                   class="lx-ab-slide {{ $i === 0 ? 'is-active' : '' }}">
                                    <img src="{{ asset('storage/'.$img->file_path) }}" alt="{{ __('lan.ins_oldingi_holat') }}" loading="lazy">
                                </a>
                            @endforeach

                            @if($oldImages->count() > 1)
                                <div class="lx-ab-slideshow-dots">
                                    @foreach($oldImages as $i => $img)
                                        <button type="button" class="lx-ab-slideshow-dot {{ $i === 0 ? 'is-active' : '' }}" data-lx-ab-go="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="lx-ab-gallery-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                <rect x="3" y="5" width="18" height="14" rx="1.5"/>
                                <circle cx="8.5" cy="10" r="1.5"/>
                                <path d="M21 16.5 16 11l-9 8"/>
                            </svg>
                            <span>{{ __('lan.rasm_hali_yuklanmagan') }}</span>
                        </div>
                    @endif
                </div>

                <div class="lx-ab-gallery-col" data-aos="fade-up" data-aos-delay="120">
                    <h3 class="lx-ab-gallery-title">{{ __('lan.ins_hozirgi_holat') }}</h3>
                    @if($currentImages->count())
                        <div class="lx-ab-slideshow" data-lx-ab-slideshow>
                            @foreach($currentImages as $i => $img)
                                <a href="{{ asset('storage/'.$img->file_path) }}"
                                   data-lightbox="gallery-current"
                                   class="lx-ab-slide {{ $i === 0 ? 'is-active' : '' }}">
                                    <img src="{{ asset('storage/'.$img->file_path) }}" alt="{{ __('lan.ins_hozirgi_holat') }}" loading="lazy">
                                </a>
                            @endforeach

                            @if($currentImages->count() > 1)
                                <div class="lx-ab-slideshow-dots">
                                    @foreach($currentImages as $i => $img)
                                        <button type="button" class="lx-ab-slideshow-dot {{ $i === 0 ? 'is-active' : '' }}" data-lx-ab-go="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="lx-ab-gallery-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                <rect x="3" y="5" width="18" height="14" rx="1.5"/>
                                <circle cx="8.5" cy="10" r="1.5"/>
                                <path d="M21 16.5 16 11l-9 8"/>
                            </svg>
                            <span>{{ __('lan.rasm_hali_yuklanmagan') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-lx-ab-slideshow]').forEach(function (wrap) {
            var slides = wrap.querySelectorAll('.lx-ab-slide');
            var dots = wrap.querySelectorAll('.lx-ab-slideshow-dot');
            if (slides.length < 2) return;

            var current = 0;
            var DELAY = 4500;
            var timer = null;

            function setActive(idx) {
                current = (idx + slides.length) % slides.length;
                slides.forEach(function (s, i) { s.classList.toggle('is-active', i === current); });
                dots.forEach(function (d, i) { d.classList.toggle('is-active', i === current); });
            }

            function next() { setActive(current + 1); }
            function start() { stop(); timer = setInterval(next, DELAY); }
            function stop() { if (timer) { clearInterval(timer); timer = null; } }

            dots.forEach(function (d) {
                d.addEventListener('click', function (e) {
                    e.preventDefault();
                    setActive(parseInt(d.getAttribute('data-lx-ab-go'), 10) || 0);
                    start();
                });
            });

            wrap.addEventListener('mouseenter', stop);
            wrap.addEventListener('mouseleave', start);

            start();
        });
    });
</script>
</x-main>
