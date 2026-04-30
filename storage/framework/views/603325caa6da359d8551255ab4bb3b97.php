<?php if (isset($component)) { $__componentOriginal27ace535957143cef069f9d3d7f387f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ace535957143cef069f9d3d7f387f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => ['title' => ''.e($category->slug).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e($category->slug).'']); ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo e($category->slug); ?></h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="<?php echo e(route('main')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#"><?php echo e($category->slug); ?></a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page"><?php echo e($institut->name); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Page Header End -->
    <div class="container-xxl py-5">
        <section class="meetings-page" id="meetings" style=" padding-top: 20px; !important;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="meeting-single-item">
                                    <div class="thumb">

                                    </div>
                                    <div class="down-content">
                                        <a href="#"><h4><?php echo e($institut->name); ?></h4></a>
                                        <p><?php echo e($institut->created_at->format('Y')); ?>.<?php echo e($institut->created_at->format('m')); ?>.<?php echo e($institut->created_at->format('d')); ?></p>
                                        <p class="description">
                                            <?php echo $institut->description; ?>

                                        </p>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex pt-2 ">
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="<?php echo e($contact->telegram_link); ?>"><i class="fab fa-telegram"></i></a>
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="<?php echo e($contact->facebook_link); ?>"><i class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="<?php echo e($contact->whatsapp_link); ?>"><i class="fab fa-whatsapp"></i></a>
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="<?php echo e($contact->youtube_link); ?>"><i class="fab fa-youtube"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="main-button-red text-center">
                                    <a href="<?php echo e(route('main')); ?>"><?php echo e(__('lan.ortga')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <style>
        /* Umumiy sozlamalar */
        .meeting-single-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            overflow: hidden;
            padding: 20px;
            margin-bottom: 30px;
        }

        /* Kontent pastga yaxshi joylashishi uchun */
        .down-content h4 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .down-content p.description {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Ijtimoiy tarmoqlar responsive bo'lishi */
        .btn-social {
            margin-right: 10px;
            font-size: 18px;
            width: 40px;
            height: 40px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }

        /* Responsivlik: kichik ekranlar uchun */
        @media (max-width: 768px) {
            .down-content h4 {
                font-size: 20px;
            }

            .down-content p.description {
                font-size: 15px;
            }

            .btn-social {
                font-size: 16px;
                width: 36px;
                height: 36px;
                margin-right: 8px;
            }

            .main-button-red a {
                padding: 10px 20px;
                font-size: 14px;
            }
        }

        /* Juda kichik ekranlar (telefonlar) uchun */
        @media (max-width: 480px) {
            .down-content h4 {
                font-size: 18px;
                text-align: center;
            }

            .down-content p.description {
                font-size: 14px;
                text-align: justify;
            }

            .d-flex {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .btn-social {
                margin: 0 5px 10px 0;
            }
        }

    </style>
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
<?php /**PATH /var/www/Kriminalogiya/resources/views/pages/texts.blade.php ENDPATH**/ ?>