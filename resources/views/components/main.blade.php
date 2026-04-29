<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Kriminalogiya' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriminalogiya Ilmiy tadqiqot Instituti, Научно-исследовательский институт криминологии, Криминалология Илмий тадқиқот Институти,Criminology Research Institute</title>
    <meta name="description" content="Kriminalogiya Ilmiy tadqiqot Instituti">
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
    <div class="lx-loader" role="status" aria-label="Loading">
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
</div>

<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid bg-light p-0 topbar_address">
    <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start" style="width: 74% !important;">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <small class="fa fa-map-marker-alt text-primary me-2"></small>

                <small>{{$contact->address}}</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center py-3">
                <small class="far fa-clock text-primary me-2"></small>
                <small>{{__('lan.ish_vaqt')}}</small>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<x-navbar></x-navbar>
<!-- Navbar End -->


{{ $slot }}

<!-- Footer Start -->
<x-footer></x-footer>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


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
</body>

</html>
