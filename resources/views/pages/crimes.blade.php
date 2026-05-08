@php
    $locale   = app()->getLocale();
    $rAttrs   = method_exists($research, 'getAttributes') ? $research->getAttributes() : [];
    $rName    = $rAttrs['name_' . $locale] ?? ($rAttrs['name_uz'] ?? '');
    $heroBg   = collect([
        'assets/img/banner3.jpg',
        'assets/img/banner1.jpg',
        'assets/img/banner4.jpg',
        'assets/img/aa.jpg',
    ])->first(fn($p) => file_exists(public_path($p)));
    $pdfStaticUrl = asset('pdf.pdf');
@endphp

<x-main title="{{ $rName }}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
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
                <span>{{ \Illuminate\Support\Str::limit($rName, 60) }}</span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">{{ $category->slug }}</span>
            <h1 class="lx-page-title" data-aos="fade-up">{{ $rName }}</h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:-2px;margin-right:6px;">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                </svg>
                {{ __('PDF hujjat') }}
            </p>
        </div>
    </section>

    {{-- ─────── PDF viewer ─────── --}}
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            <div class="lx-pdf-viewer"
                 data-aos="fade-up"
                 data-lx-pdf
                 data-pdf-src="{{ $pdfStaticUrl }}"
                 oncontextmenu="return false">
                <div class="lx-pdf-toolbar">
                    <div class="lx-pdf-toolbar-left">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                        </svg>
                        <span class="lx-pdf-toolbar-label">{{ \Illuminate\Support\Str::limit($rName, 40) }}</span>
                    </div>
                    <div class="lx-pdf-toolbar-center">
                        <button type="button" class="lx-pdf-btn" data-lx-pdf="prev" aria-label="{{ __('Oldingi') }}">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"/>
                            </svg>
                        </button>
                        <span class="lx-pdf-page-info">
                            <input type="number" class="lx-pdf-page-input" data-lx-pdf="page-input" min="1" value="1">
                            <span class="lx-pdf-page-sep">/</span>
                            <span class="lx-pdf-page-total" data-lx-pdf="page-total">—</span>
                        </span>
                        <button type="button" class="lx-pdf-btn" data-lx-pdf="next" aria-label="{{ __('Keyingi') }}">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"/>
                            </svg>
                        </button>
                    </div>
                    <div class="lx-pdf-toolbar-right">
                        <button type="button" class="lx-pdf-btn" data-lx-pdf="zoom-out" aria-label="{{ __('Kichraytirish') }}">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="8" y1="11" x2="14" y2="11"/>
                            </svg>
                        </button>
                        <span class="lx-pdf-zoom-level" data-lx-pdf="zoom-level">100%</span>
                        <button type="button" class="lx-pdf-btn" data-lx-pdf="zoom-in" aria-label="{{ __('Kattalashtirish') }}">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="11" y1="8" x2="11" y2="14"/>
                                <line x1="8" y1="11" x2="14" y2="11"/>
                            </svg>
                        </button>
                        <button type="button" class="lx-pdf-btn lx-pdf-btn-fs" data-lx-pdf="fullscreen" aria-label="{{ __("To'liq ekran") }}">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 7V3h4M21 7V3h-4M3 17v4h4M21 17v4h-4"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="lx-pdf-canvas-wrap">
                    <div class="lx-pdf-loading" data-lx-pdf="loading">
                        <span class="lx-pdf-spinner" aria-hidden="true"></span>
                        <span>{{ __('PDF yuklanmoqda…') }}</span>
                    </div>
                    <div class="lx-pdf-error" data-lx-pdf="error" hidden>
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        <p>{{ __('PDF yuklab bo‘lmadi.') }}</p>
                    </div>
                    <canvas class="lx-pdf-canvas" data-lx-pdf="canvas"></canvas>
                    <div class="lx-pdf-watermark" aria-hidden="true">
                        <span>KTI · {{ __('Faqat ko‘rish uchun') }}</span>
                    </div>
                </div>

                <div class="lx-pdf-foot">
                    <span class="lx-pdf-foot-note">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        {{ __('Hujjat faqat ko‘rish uchun. Yuklab olish va chop etish ruxsat etilmagan.') }}
                    </span>
                </div>
            </div>

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="{{ route('categoryId', $category->id) }}" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span>{{ __('lan.ortga') }}</span>
                </a>
                <a href="{{ route('main') }}" class="lx-btn lx-btn-dark">
                    <span>{{ __('lan.bosh') ?? __('lan.bosh_sahifa') }}</span>
                </a>
            </div>
        </div>
    </section>

</div>

{{-- ─── PDF.js viewer (view-only, custom luxury controls) ─── --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
<script>
(function () {
    function showError(root, msg) {
        var loadingEl = root.querySelector('[data-lx-pdf="loading"]');
        var errorEl   = root.querySelector('[data-lx-pdf="error"]');
        if (loadingEl) { loadingEl.hidden = true; loadingEl.style.display = 'none'; }
        if (errorEl)   {
            errorEl.hidden = false;
            if (msg) {
                var p = errorEl.querySelector('p');
                if (p) p.textContent = msg;
            }
        }
    }

    if (typeof window.pdfjsLib === 'undefined') {
        document.querySelectorAll('[data-lx-pdf]').forEach(function (root) {
            showError(root, '{{ __("PDF kutubxonasini yuklab bo‘lmadi.") }}');
        });
        return;
    }

    window.pdfjsLib.GlobalWorkerOptions.workerSrc =
        'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    document.querySelectorAll('[data-lx-pdf]').forEach(function (root) {
        if (root.dataset.lxPdfInit === '1') return;
        root.dataset.lxPdfInit = '1';

        var src         = root.getAttribute('data-pdf-src');
        var canvas      = root.querySelector('[data-lx-pdf="canvas"]');
        var loadingEl   = root.querySelector('[data-lx-pdf="loading"]');
        var errorEl     = root.querySelector('[data-lx-pdf="error"]');
        var pageInput   = root.querySelector('[data-lx-pdf="page-input"]');
        var pageTotal   = root.querySelector('[data-lx-pdf="page-total"]');
        var zoomLevelEl = root.querySelector('[data-lx-pdf="zoom-level"]');
        var btnPrev     = root.querySelector('[data-lx-pdf="prev"]');
        var btnNext     = root.querySelector('[data-lx-pdf="next"]');
        var btnZoomIn   = root.querySelector('[data-lx-pdf="zoom-in"]');
        var btnZoomOut  = root.querySelector('[data-lx-pdf="zoom-out"]');
        var btnFs       = root.querySelector('[data-lx-pdf="fullscreen"]');
        var canvasWrap  = canvas.parentElement;

        if (!src || !canvas) return;

        var ctx        = canvas.getContext('2d');
        var pdfDoc     = null;
        var current    = 1;
        var scale      = 1.0;
        var renderTask = null;

        function fitScale(viewport) {
            var available = canvasWrap.clientWidth - 48;
            if (available <= 0) return scale;
            var ratio = available / viewport.width;
            return Math.min(scale, ratio * scale);
        }

        function updateButtons() {
            if (!pdfDoc) return;
            btnPrev.disabled = current <= 1;
            btnNext.disabled = current >= pdfDoc.numPages;
            zoomLevelEl.textContent = Math.round(scale * 100) + '%';
            pageInput.value = current;
            pageInput.max = pdfDoc.numPages;
        }

        function renderPage(num) {
            if (!pdfDoc) return;
            if (renderTask) {
                try { renderTask.cancel(); } catch (e) {}
            }
            return pdfDoc.getPage(num).then(function (page) {
                var dpr = Math.min(window.devicePixelRatio || 1, 2);
                var baseViewport = page.getViewport({ scale: 1 });
                var fitted = fitScale(baseViewport);
                var viewport = page.getViewport({ scale: fitted * dpr });

                canvas.width  = viewport.width;
                canvas.height = viewport.height;
                canvas.style.width  = (viewport.width / dpr) + 'px';
                canvas.style.height = (viewport.height / dpr) + 'px';

                renderTask = page.render({ canvasContext: ctx, viewport: viewport });
                return renderTask.promise.then(function () {
                    canvas.classList.add('is-ready');
                });
            }).catch(function (err) {
                if (err && err.name === 'RenderingCancelledException') return;
                console.warn(err);
            });
        }

        function go(num) {
            if (!pdfDoc) return;
            num = Math.max(1, Math.min(num, pdfDoc.numPages));
            current = num;
            updateButtons();
            canvas.classList.remove('is-ready');
            renderPage(current);
        }

        btnPrev.addEventListener('click', function () { go(current - 1); });
        btnNext.addEventListener('click', function () { go(current + 1); });
        btnZoomIn.addEventListener('click', function () {
            scale = Math.min(scale + 0.2, 3.0);
            renderPage(current);
            updateButtons();
        });
        btnZoomOut.addEventListener('click', function () {
            scale = Math.max(scale - 0.2, 0.5);
            renderPage(current);
            updateButtons();
        });

        pageInput.addEventListener('change', function () {
            var v = parseInt(pageInput.value, 10);
            if (!isNaN(v)) go(v);
        });
        pageInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') { e.preventDefault(); pageInput.blur(); }
        });

        btnFs.addEventListener('click', function () {
            var doc = document;
            if (doc.fullscreenElement || doc.webkitFullscreenElement) {
                (doc.exitFullscreen || doc.webkitExitFullscreen).call(doc);
            } else {
                var req = root.requestFullscreen || root.webkitRequestFullscreen;
                if (req) req.call(root);
            }
        });

        document.addEventListener('fullscreenchange', function () {
            root.classList.toggle('is-fullscreen', document.fullscreenElement === root);
            setTimeout(function () { renderPage(current); }, 50);
        });

        var resizeTimer = null;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () { renderPage(current); }, 150);
        });

        root.setAttribute('tabindex', '0');
        root.addEventListener('keydown', function (e) {
            if (e.target === pageInput) return;
            if (e.key === 'ArrowLeft' || e.key === 'PageUp')  { e.preventDefault(); go(current - 1); }
            if (e.key === 'ArrowRight' || e.key === 'PageDown'){ e.preventDefault(); go(current + 1); }
            if (e.key === '+') { e.preventDefault(); btnZoomIn.click(); }
            if (e.key === '-') { e.preventDefault(); btnZoomOut.click(); }
        });

        root.addEventListener('keydown', function (e) {
            if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'p' || e.key === 'S' || e.key === 'P')) {
                e.preventDefault();
            }
        });

        var loadingTask = window.pdfjsLib.getDocument({ url: src });
        loadingTask.promise.then(function (pdf) {
            pdfDoc = pdf;
            pageTotal.textContent = pdf.numPages;
            updateButtons();
            return renderPage(1);
        }).then(function () {
            loadingEl.hidden = true;
            loadingEl.style.display = 'none';
        }).catch(function (err) {
            console.warn('PDF yuklab bo‘lmadi:', err);
            loadingEl.hidden = true;
            loadingEl.style.display = 'none';
            errorEl.hidden = false;
        });
    });
})();
</script>

</x-main>
