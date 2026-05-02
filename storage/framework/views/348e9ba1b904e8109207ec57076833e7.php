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
                    <li class="breadcrumb-item"><a class="text-white"
                                                   href="<?php echo e(route('categoryId', $category->id)); ?>"><?php echo e($category->slug); ?></a>
                    </li>
                    <li class="breadcrumb-item text-white active" aria-current="page"><?php echo e($research->name); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center ">
                <h1 class="display-5 mb-5 section__h1"><?php echo e($research->name); ?></h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-12">
                    <div class="responsive-pdf-container">
                        <iframe
                            src="<?php echo e(asset('storage/' . $research->file_path)); ?>#toolbar=0"
                            frameborder="0"
                            allowfullscreen
                        ></iframe>
                    </div>
                    <div class="d-flex justify-content-center d__flex_button" >
                        <div class="text-center mt-3 p-3">
                            <a href="<?php echo e(route('main')); ?>" class="btn btn-danger">
                                <?php echo e(__('lan.bosh')); ?>

                            </a>
                        </div>
                        <div class="text-center mt-3 p-3">
                            <a href="<?php echo e(asset('storage/' . $research->file_path)); ?>" class="btn btn-primary" download>
                                <?php echo e(__('lan.yuklab_olish')); ?>

                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .responsive-pdf-container {
            position: relative;
            padding-bottom: 125%; /* Aspect ratio (height/width), taxminan 4:3 */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .responsive-pdf-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 768px) {
            .responsive-pdf-container {
                padding-bottom: 150%; /* Mobil qurilmalar uchun balandroq qilish */
            }
        }

        @media (max-width: 480px) {
            .responsive-pdf-container {
                padding-bottom: 170%;
            }
            .d__flex_button div a {
                font-size: 0.5rem;

            }
            .section__h1{
                font-size: 1rem;
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
<?php /**PATH /Users/aktamovshahzod/Desktop/projects/mehriddin/Kriminalogiya/resources/views/pages/crimes.blade.php ENDPATH**/ ?>