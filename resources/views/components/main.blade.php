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
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">

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
</head>

<body>
<!-- Spinner Start -->
<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <!-- spinner-grow klassi olib tashlandi, faqat rasm qoldi -->
    <div role="status">
        <img
            class="w-16 h-16 max-md:w-10 max-md:h-10 cursor-pointer rasm111"
            src="{{ asset('assets/img/file.png') }}"
            alt="Logo"
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
</body>

</html>
