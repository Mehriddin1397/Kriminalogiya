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
                                                   href="<?php echo e(route('categoryId',$category->id)); ?>"><?php echo e($category->slug); ?></a>
                    </li>
                    <li class="breadcrumb-item text-white active" aria-current="page"><?php echo e($new->name); ?></li>
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
                                        <div id="carouselExampleControls" class="carousel slide"
                                             data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php $__currentLoopData = $new->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
                                                        <img src="<?php echo e(asset('storage/' . $photo->file_path)); ?>" alt="">
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="down-content">
                                        <a href="#"><h4><?php echo e($new->name); ?></h4></a>
                                        <p><?php echo e($new->created_at->format('Y')); ?>.<?php echo e($new->created_at->format('m')); ?>

                                            .<?php echo e($new->created_at->format('d')); ?></p>
                                        <p class="description">
                                            <?php echo e($new->title); ?>


                                            <br><br>
                                            <?php echo $new->description; ?>

                                        </p>
                                        <?php
                                            function toEmbedLink($url) {
                                                // parse_url yordamida querydan video ID ajratamiz
                                                $parts = parse_url($url);
                                                if (isset($parts['query'])) {
                                                    parse_str($parts['query'], $query);
                                                    if (isset($query['v'])) {
                                                        return 'https://www.youtube.com/embed/' . $query['v'];
                                                    }
                                                }

                                                // youtu.be formatiga ishlov berish
                                                if (isset($parts['host']) && $parts['host'] === 'youtu.be') {
                                                    return 'https://www.youtube.com/embed' . $parts['path'];
                                                }

                                                return null;
                                            }

                                            $embedLink = $new->youtube_link ? toEmbedLink($new->youtube_link) : null;
                                        ?>

                                        <?php if($embedLink): ?>
                                            <div class="container mt-4">
                                                <div class="ratio ratio-16x9">
                                                    <iframe
                                                        src="<?php echo e($embedLink); ?>"
                                                        title="YouTube video"
                                                        allowfullscreen>
                                                    </iframe>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex pt-2 ">
                                                    <a class="btn btn-outline-dark btn-social" target="_blank"
                                                       href="<?php echo e($contact->telegram_link); ?>"><i
                                                            class="fab fa-telegram"></i></a>

                                                    <a class="btn btn-outline-dark btn-social" target="_blank"
                                                       href="<?php echo e($contact->facebook_link); ?>"><i
                                                            class="fab fa-facebook"></i></a>

                                                    <a class="btn btn-outline-dark btn-social" target="_blank"
                                                       href="<?php echo e($contact->youtube_link); ?>"><i
                                                            class="fab fa-youtube"></i></a>

                                                    <a class="btn btn-outline-dark btn-social" target="_blank"
                                                       href="<?php echo e($contact->whatsapp_link); ?>"><i
                                                            class="fab fa-whatsapp"></i></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center d__flex_button" >
                                    <div class="text-center mt-3 p-3">
                                        <a href="<?php echo e(route('main')); ?>" class="btn btn-danger">
                                            <?php echo e(__('lan.bosh')); ?>

                                        </a>
                                    </div>
                                    <div class="text-center mt-3 p-3">
                                        <a href="<?php echo e(route('categoryId',$category->id)); ?>" class="btn btn-success">
                                            <?php echo e(__('lan.ortga')); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
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
<?php /**PATH /var/www/Kriminalogiya/resources/views/pages/news_show.blade.php ENDPATH**/ ?>