<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="utf-8">
    <script>
        (function () {
            try {
                var saved = localStorage.getItem('lx-font-scale');
                if (saved) {
                    document.documentElement.style.zoom = saved;
                }
            } catch (e) {}
        })();
    </script>
    <title>{{ $title ?? 'Kriminalogiya' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriminologiya tadqiqot instituti, Научно-исследовательский институт криминологии, Криминология тадқиқот институти, Criminology Research Institute</title>
    <meta name="description" content="Kriminologiya tadqiqot instituti">
    <meta name="keywords" content="jinoyatchilikka qarshi kurash,kriminalogiya,firibgarlik,o‘g‘irlik,zo‘ravonlik,fight against crime,criminology,fraud,theft,violence,жиноятчиликка қарши кураш,криминалология,фирибгарлик,ўғрилик,зўравонлик,борьба с преступностью,криминология,мошенничество,кража,насилие">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Kriminalogiya">
    <link rel="canonical" href="https://kti.iiv.uz">

    <!-- Favicon -->
    <link href="{{asset('assets/images/logo.svg')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- AOS scroll animation -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Home page luxury theme -->
    <link href="{{asset('css/home-luxury.css')}}" rel="stylesheet">
</head>

<body class="{{ request()->routeIs('main') ? 'home-page' : '' }}">
<!-- Spinner Start -->
<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="lx-loader" role="status" aria-label="{{ __('lan.yuklanmoqda') }}">
        <div class="lx-loader-mark">
            <svg class="lx-loader-ring lx-loader-ring--outer" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <circle cx="100" cy="100" r="94" fill="none" stroke="#c9a961" stroke-width="1.4" stroke-linecap="round" pathLength="100" stroke-dasharray="72 28"/>
            </svg>
            <svg class="lx-loader-ring lx-loader-ring--inner" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <circle cx="100" cy="100" r="80" fill="none" stroke="#c9a961" stroke-width="0.9" stroke-linecap="round" pathLength="100" stroke-dasharray="14 86" stroke-opacity="0.55"/>
            </svg>
            <img
                class="lx-loader-logo"
                src="{{ asset('assets/img/kti-logo.png') }}"
                alt="Kriminologiya Tadqiqot Instituti"
            />
        </div>
        <div class="lx-loader-name">
            {{ __('lan.kriminalog') }}
        </div>
    </div>
</div>

<!-- Spinner End -->


{{-- Topbar va Navbar endi <x-navbar/> ichida (lyuks dizayn) --}}


<!-- Navbar Start -->
<x-navbar></x-navbar>
<!-- Navbar End -->


{{ $slot }}

<!-- Footer Start -->
<x-footer></x-footer>
<!-- Footer End -->

<!-- Chatbot -->
<x-chatbot></x-chatbot>


<!-- Back to Top -->
<a href="#" class="back-to-top lx-back-to-top" aria-label="{{ __('lan.yuqoriga') }}">
    <span class="lx-back-to-top-ring" aria-hidden="true"></span>
    <svg class="lx-back-to-top-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <line x1="12" y1="19" x2="12" y2="5"/>
        <polyline points="5 12 12 5 19 12"/>
    </svg>
</a>

<!-- Shrift o'lchamini boshqarish -->
<div class="lx-fontctl" data-lx-fontctl>
    <button type="button" class="lx-fontctl-toggle" data-lx-fontctl-toggle
            aria-haspopup="true" aria-expanded="false" aria-label="{{ __('lan.shrift_olchami') }}">
        Aa
    </button>
    <div class="lx-fontctl-panel" role="menu">
        <button type="button" class="lx-fontctl-opt lx-fontctl-opt-sm" data-lx-font-scale="1" role="menuitem" aria-label="{{ __('lan.shrift_oddiy') }}">A</button>
        <button type="button" class="lx-fontctl-opt lx-fontctl-opt-md" data-lx-font-scale="1.12" role="menuitem" aria-label="{{ __('lan.shrift_orta') }}">A</button>
        <button type="button" class="lx-fontctl-opt lx-fontctl-opt-lg" data-lx-font-scale="1.25" role="menuitem" aria-label="{{ __('lan.shrift_katta') }}">A</button>
    </div>
</div>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('lib/wow/wow.min.js')}}"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
<script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('lib/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('js/main.js')}}"></script>

<!-- AOS scroll animation -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    (function () {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 900,
                easing: 'ease-out-cubic',
                once: true,
                offset: 80,
                disable: window.innerWidth < 480 ? 'phone' : false
            });
        } else {
            document.querySelectorAll('[data-aos]').forEach(function (el) {
                el.removeAttribute('data-aos');
            });
        }
    })();
</script>

<!-- Shrift o'lchamini boshqarish -->
<script>
    (function () {
        var STORAGE_KEY = 'lx-font-scale';
        var wrap = document.querySelector('[data-lx-fontctl]');
        if (!wrap) return;

        var toggle = wrap.querySelector('[data-lx-fontctl-toggle]');
        var opts = wrap.querySelectorAll('[data-lx-font-scale]');

        function applyScale(scale, persist) {
            document.documentElement.style.zoom = scale;
            opts.forEach(function (btn) {
                btn.classList.toggle('is-active', btn.getAttribute('data-lx-font-scale') === String(scale));
            });
            if (persist) {
                try { localStorage.setItem(STORAGE_KEY, scale); } catch (e) {}
            }
        }

        var current = '1';
        try { current = localStorage.getItem(STORAGE_KEY) || '1'; } catch (e) {}
        applyScale(current, false);

        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            var isOpen = wrap.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        opts.forEach(function (btn) {
            btn.addEventListener('click', function () {
                applyScale(btn.getAttribute('data-lx-font-scale'), true);
                wrap.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });

        document.addEventListener('click', function (e) {
            if (!wrap.contains(e.target)) {
                wrap.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                wrap.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    })();
</script>
</body>

</html>
