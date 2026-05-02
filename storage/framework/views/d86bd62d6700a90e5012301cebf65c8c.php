<?php if (isset($component)) { $__componentOriginal27ace535957143cef069f9d3d7f387f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ace535957143cef069f9d3d7f387f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => ['title' => ''.e(__('lan.ins_nor_hujjat')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('lan.ins_nor_hujjat')).'']); ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo e(__('lan.ins_nor_hujjat')); ?></h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="<?php echo e(route('main')); ?>">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page"><?php echo e(__('lan.ins_nor_hujjat')); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-xxl py-5">
        <section class="meetings-page" id="meetings">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">

                        <div class="meeting-single-item shadow p-4 rounded bg-light">
                            <div class="down-content text-left">
                                <a href="#"><h4><?php echo e(__('lan.ins_nor_hujjat')); ?></h4></a>
                                <p>2025.04.28</p>

                                <div class="description mb-3">
                                    <a href="https://lex.uz/uz/docs/7034904" target="_blank" class="d-block">1.<?php echo e(__('lan.qaror_kri')); ?></a>
                                    <a href="https://www.lex.uz/uz/docs/-6755597" target="_blank" class="d-block">2.<?php echo e(__('lan.farmoni')); ?></a>
                                    <a href="https://www.lex.uz/docs/-6755253" target="_blank" class="d-block">3.<?php echo e(__('lan.qarori')); ?></a>
                                </div>

                                <div class="d-flex justify-content-center flex-wrap gap-2 pt-2">
                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="<?php echo e($contact->telegram_link); ?>"><i class="fab fa-telegram"></i></a>
                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="<?php echo e($contact->facebook_link); ?>"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="<?php echo e($contact->whatsapp_link); ?>"><i class="fab fa-whatsapp"></i></a>
                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="<?php echo e($contact->youtube_link); ?>"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="main-button-red text-center mt-4">
                            <a href="<?php echo e(route('main')); ?>"><?php echo e(__('lan.ortga')); ?></a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal27ace535957143cef069f9d3d7f387f4)): ?>
<?php $attributes = $__attributesOriginal27ace535957143cef069f9d3d7f387f4; ?>
<?php unset($__attributesOriginal27ace535957143cef069f9d3d7f387f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27ace535957143cef069f9d3d7f387f4)): ?>
<?php $component = $__componentOriginal27ace535957143cef069f9d3d7f387f4; ?>
<?php unset($__componentOriginal27ace535957143cef069f9d3d7f387f4); ?>
<?php endif; ?>
<?php /**PATH /Users/aktamovshahzod/Desktop/projects/mehriddin/Kriminalogiya/resources/views/pages/ins_nor_hujjat.blade.php ENDPATH**/ ?>