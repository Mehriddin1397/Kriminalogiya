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
                    <li class="breadcrumb-item text-white active" aria-current="page"><?php echo e($category->slug); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->



    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">
                    <?php echo e($category->slug); ?>

                </h1>
            </div>

            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <?php if($categories->isNotEmpty()): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mx-2 <?php echo e($id == $category->id ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('categoryId', $category->id)); ?>" style="color: <?php echo e($id == $category->id ? '#0a0a0a' : ''); ?>"><?php echo e($category->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <?php $__currentLoopData = $researchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $research): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="xalqaro-hankorlik-section">
                            <div class="xalqaro-hankorlik-content">
                                <div class="xalqaro-hankorlik-image-container">
                                    <?php $__currentLoopData = $research->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img src="<?php echo e(asset('storage/' . $photo->file_path)); ?>" alt="Xalqaro hankorlik"
                                             class="xalqaro-hankorlik-img img-fluid">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="xalqaro-hankorlik-text-container">
                                    <p class="xalqaro-hankorlik-quote">
                                        <?php $__currentLoopData = $research->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('show', ['category_id' => $category->id, 'id' => $research->id])); ?>"><?php echo e($research->name); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </p>
                                    <div class="xalqaro-hankorlik-meta">
                                    <span class="xalqaro-hankorlik-date">
                                        <?php echo e($research->created_at->format('Y.m.d')); ?>

                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>

    <style>
        .xalqaro-hankorlik-section {
            margin: 10px 0;
            padding: 15px;
            background-color: #f3f0ea;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .xalqaro-hankorlik-content {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        .xalqaro-hankorlik-image-container {
            flex: 0 0 auto;
            margin: 10px;
        }

        .xalqaro-hankorlik-img {
            width: 100px;
            height: 110px;
            object-fit: cover;
            border-radius: 5px;
        }

        .xalqaro-hankorlik-text-container {
            flex: 1 1 300px;
            padding: 10px;
        }

        .xalqaro-hankorlik-quote {
            font-size: 1.1rem;
            line-height: 1.5;
            color: #333;
            margin: 0 0 10px 0;
            font-weight: 500;
        }

        .xalqaro-hankorlik-meta {
            margin-top: 5px;
        }

        .xalqaro-hankorlik-date {
            color: #666;
            font-size: 0.875rem;
        }

        @media (max-width: 576px) {
            .xalqaro-hankorlik-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .xalqaro-hankorlik-img {
                width: 90px;
                height: 100px;
            }

            .xalqaro-hankorlik-text-container {
                padding-left: 0;
            }

            .xalqaro-hankorlik-quote {
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
<?php /**PATH /var/www/Kriminalogiya/resources/views/pages/researchsCategory.blade.php ENDPATH**/ ?>