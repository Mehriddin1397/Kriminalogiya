<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="flexilecode" />
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title><?php echo $__env->yieldContent('title'); ?> </title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/images/logo.svg')); ?>" />
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/bootstrap.min.css" />
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/vendors/css/vendors.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/assets/vendors/css/daterangepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/assets/vendors/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/vendors/css/select2-theme.min.css">
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/theme.min.css" />
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
    <script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
</head>

<style>
    .nxl-container .nxl-content .main-content {
        overflow-x: inherit !important;
    }
    .table-responsive {
        overflow-x: visible !important;
        -webkit-overflow-scrolling: touch;
    }
</style>

<body>
<!--! ================================================================ !-->
<!--! [Start] Navigation Manu !-->
<!--! ================================================================ !-->
<?php if (isset($component)) { $__componentOriginalbebe114f3ccde4b38d7462a3136be045 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbebe114f3ccde4b38d7462a3136be045 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbebe114f3ccde4b38d7462a3136be045)): ?>
<?php $attributes = $__attributesOriginalbebe114f3ccde4b38d7462a3136be045; ?>
<?php unset($__attributesOriginalbebe114f3ccde4b38d7462a3136be045); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbebe114f3ccde4b38d7462a3136be045)): ?>
<?php $component = $__componentOriginalbebe114f3ccde4b38d7462a3136be045; ?>
<?php unset($__componentOriginalbebe114f3ccde4b38d7462a3136be045); ?>
<?php endif; ?>
<!--! ================================================================ !-->
<!--! [End]  Navigation Manu !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! [Start] Header !-->
<!--! ================================================================ !-->
<?php if (isset($component)) { $__componentOriginal7a59feeeee8ce3f3cb3543e6971245f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a59feeeee8ce3f3cb3543e6971245f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a59feeeee8ce3f3cb3543e6971245f2)): ?>
<?php $attributes = $__attributesOriginal7a59feeeee8ce3f3cb3543e6971245f2; ?>
<?php unset($__attributesOriginal7a59feeeee8ce3f3cb3543e6971245f2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a59feeeee8ce3f3cb3543e6971245f2)): ?>
<?php $component = $__componentOriginal7a59feeeee8ce3f3cb3543e6971245f2; ?>
<?php unset($__componentOriginal7a59feeeee8ce3f3cb3543e6971245f2); ?>
<?php endif; ?>
<!--! ================================================================ !-->
<!--! [End] Header !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! [Start] Main Content !-->
<!--! ================================================================ !-->
<main class="nxl-container">
    <?php echo $__env->yieldContent('content'); ?>

    <!-- [ Footer ] start -->
   <?php if (isset($component)) { $__componentOriginal13a4d234756c16032caa3e2834ca83d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal13a4d234756c16032caa3e2834ca83d8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal13a4d234756c16032caa3e2834ca83d8)): ?>
<?php $attributes = $__attributesOriginal13a4d234756c16032caa3e2834ca83d8; ?>
<?php unset($__attributesOriginal13a4d234756c16032caa3e2834ca83d8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13a4d234756c16032caa3e2834ca83d8)): ?>
<?php $component = $__componentOriginal13a4d234756c16032caa3e2834ca83d8; ?>
<?php unset($__componentOriginal13a4d234756c16032caa3e2834ca83d8); ?>
<?php endif; ?>
    <!-- [ Footer ] end -->
</main>
<!--! ================================================================ !-->
<!--! [End] Main Content !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! BEGIN: Theme Customizer !-->
<!--! ================================================================ !-->





































































































































































<!--! ================================================================ !-->
<!--! [End] Theme Customizer !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! Footer Script !-->
<!--! ================================================================ !-->
<!--! BEGIN: Vendors JS !-->
<script src="/admin/assets/vendors/js/vendors.min.js"></script>
<!-- vendors.min.js {always must need to be top} -->



<!--! END: Vendors JS !-->
<!--! BEGIN: Apps Init  !-->


<script src="/admin/assets/js/common-init.min.js"></script>
<script src="/admin/assets/js/dashboard-init.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
    CKEDITOR.replace('editor4');
    document.querySelectorAll('.ckeditor').forEach((el) => {
        CKEDITOR.replace(el);
    });
</script>
<!--! END: Apps Init !-->
<!--! BEGIN: Theme Customizer  !-->

<!--! END: Theme Customizer !-->
</body>

</html>
<?php /**PATH /var/www/Kriminalogiya/resources/views/layouts/admin.blade.php ENDPATH**/ ?>