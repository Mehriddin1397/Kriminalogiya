<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="utf-8">
    <title><?php echo e($title ?? 'Kriminalogiya'); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriminalogiya Ilmiy tadqiqot Instituti, Научно-исследовательский институт криминологии, Криминалология Илмий тадқиқот Институти,Criminology Research Institute</title>
    <meta name="description" content="Kriminalogiya Ilmiy tadqiqot Instituti">
    <meta name="keywords" content="jinoyatchilikka qarshi kurash,kriminalogiya,firibgarlik,o‘g‘irlik,zo‘ravonlik,fight against crime,criminology,fraud,theft,violence,жиноятчиликка қарши кураш,криминалология,фирибгарлик,ўғрилик,зўравонлик,борьба с преступностью,криминология,мошенничество,кража,насилие">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Kriminalogiya">
    <link rel="canonical" href="https://kti.iiv.uz">

    <!-- Favicon -->
    <link href="<?php echo e(asset('assets/images/logo.svg')); ?>" rel="icon">

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
    <link href="<?php echo e(asset('lib/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('lib/lightbox/css/lightbox.min.css')); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>

<body>
<!-- Spinner Start -->
<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <!-- spinner-grow klassi olib tashlandi, faqat rasm qoldi -->
    <div role="status">
        <img
            class="w-16 h-16 max-md:w-10 max-md:h-10 cursor-pointer rasm111"
            src="<?php echo e(asset('assets/img/file.png')); ?>"
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

                <small><?php echo e($contact->address); ?></small>
            </div>
            <div class="h-100 d-inline-flex align-items-center py-3">
                <small class="far fa-clock text-primary me-2"></small>
                <small><?php echo e(__('lan.ish_vaqt')); ?></small>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<!-- Navbar End -->


<?php echo e($slot); ?>


<!-- Footer Start -->
<?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('lib/wow/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/easing/easing.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/waypoints/waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/counterup/counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/isotope/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/lightbox/js/lightbox.min.js')); ?>"></script>

<!-- Template Javascript -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
</body>

</html>
<?php /**PATH /var/www/Kriminalogiya/resources/views/components/main.blade.php ENDPATH**/ ?>