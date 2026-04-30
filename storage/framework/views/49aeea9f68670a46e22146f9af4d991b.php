<?php if (isset($component)) { $__componentOriginal27ace535957143cef069f9d3d7f387f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ace535957143cef069f9d3d7f387f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => ['title' => ''.e(__('lan.qidirish')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('lan.qidirish')).'']); ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo e(__('lan.qidirish')); ?></h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="<?php echo e(route('main')); ?>">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page"><?php echo e(__('lan.qidirish')); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">
                    <?php echo e(__('lan.seatch1')); ?> <br>
                    "<?php echo e($q); ?>"
                </h1>
            </div>

            <div class="row g-4 ">
                <div class="col-12 ">
                    <?php if($articles->isNotEmpty()): ?>
                        <h3><?php echo e(__('lan.maqolalar')); ?>:</h3>
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="<?php echo e(asset('storage/'.$article->photos->first()->file_path)); ?>" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">
                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="<?php echo e(route('article_show',$article->id)); ?>"><?php echo e($article->name); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if($scholars->isNotEmpty()): ?>
                            <h3><?php echo e(__('lan.tadqiq')); ?>:</h3>
                        <?php $__currentLoopData = $scholars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="<?php echo e(asset('storage/'.$article->photos->first()->file_path)); ?>" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="<?php echo e(route('scholar_show',$article->id)); ?>"><?php echo e($article->name); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if($researchs->isNotEmpty()): ?>
                            <h3><?php echo e(__('lan.ijti_ama_tad')); ?>:</h3>
                        <?php $__currentLoopData = $researchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="<?php echo e(asset('storage/'.$article->photos->first()->file_path)); ?>" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="<?php echo e(route('research_show',$article->id)); ?>"><?php echo e($article->name); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if($rahbariyats->isNotEmpty()): ?>
                            <h3><?php echo e(__('lan.rahbariyat')); ?>:</h3>
                        <?php $__currentLoopData = $rahbariyats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="<?php echo e(asset('storage/'.$article->photos->first()->file_path)); ?>" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bossModal<?php echo e($article->id); ?>"><?php echo e($article->name); ?></a>
                                        </p>
                                        <div class="xalqaro-hankorlik-meta">
                                            <span class="xalqaro-hankorlik-date"><?php echo e(__('lan.lavozim')); ?>: </span> <?php echo e($article->post); ?>

                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="bossModal<?php echo e($article->id); ?>" tabindex="-1" aria-labelledby="bossModalLabel<?php echo e($article->id); ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-3 shadow">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="bossModalLabel<?php echo e($article->id); ?>"><?php echo e($article->name); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Yopish"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong><?php echo e(__('lan.telefon')); ?>:</strong> <?php echo e($article->phone); ?></p>
                                                    <p><strong><?php echo e(__('lan.ish_jadvali')); ?>:</strong> <?php echo e($article->worktime); ?></p>
                                                    <p><strong><?php echo e(__('lan.email')); ?>:</strong> <?php echo e($article->email); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        <?php echo e(__('lan.yopish')); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if($bibliophilias->isNotEmpty()): ?>
                            <h3><?php echo e(__('lan.kitobxonlik')); ?>:</h3>
                        <?php $__currentLoopData = $bibliophilias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="<?php echo e(asset('storage/'.$article->photos->first()->file_path)); ?>" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="<?php echo e(route('bibliophilia_show',$article->id)); ?>"><?php echo e($article->name); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if($news->isNotEmpty()): ?>
                            <h3><?php echo e(__('lan.yangilik')); ?>:</h3>
                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="<?php echo e(asset('storage/'.$article->photos->first()->file_path)); ?>" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="<?php echo e(route('news_show',$article->id)); ?>"><?php echo e($article->name); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if($journals->isNotEmpty()): ?>
                            <h3><?php echo e(__('lan.jurnallar')); ?>:</h3>
                        <?php $__currentLoopData = $journals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="<?php echo e(asset('storage/'.$article->photos->first()->file_path)); ?>" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="<?php echo e(route('journal_show',$article->id)); ?>"><?php echo e($article->name); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if($crimes->isNotEmpty()): ?>
                            <h3><?php echo e(__('lan.jinoyatlar')); ?>:</h3>
                        <?php $__currentLoopData = $crimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="<?php echo e(asset('storage/'.$article->photos->first()->file_path)); ?>" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="<?php echo e(route('crimes_show',$article->id)); ?>"><?php echo e($article->name); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if($academias->isNotEmpty()): ?>
                            <h3><?php echo e(__('lan.ilm_dar_ber')); ?>:</h3>
                        <?php $__currentLoopData = $academias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="<?php echo e(asset('storage/'.$article->photos->first()->file_path)); ?>" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="<?php echo e(route('academia_show',$article->id)); ?>"><?php echo e($article->name); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

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
                            align-items: flex-start;
                            gap: 15px;
                            flex-wrap: wrap;
                        }

                        .xalqaro-hankorlik-image-container {
                            flex-shrink: 0;
                        }

                        .xalqaro-hankorlik-img {
                            width: 100px;
                            height: auto;
                            border-radius: 4px;
                            object-fit: cover;
                        }

                        .xalqaro-hankorlik-text-container {
                            flex: 1;
                        }

                        .xalqaro-hankorlik-quote {
                            font-size: 1.1rem;
                            margin: 0;
                            font-weight: 500;
                        }

                        .xalqaro-hankorlik-meta {
                            font-size: 0.9rem;
                            color: #555;
                            margin-top: 5px;
                        }

                        /* RESPONSIV QO‘LLAB-QUVVATLASH */
                        @media (max-width: 576px) {
                            .xalqaro-hankorlik-content {
                                flex-direction: column;
                                align-items: center;
                                text-align: center;
                            }

                            .xalqaro-hankorlik-img {
                                width: 80px;
                                height: 100px;
                            }

                            .xalqaro-hankorlik-text-container {
                                width: 100%;
                            }
                        }
                    </style>


                </div>
            </div>
        </div>
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
<?php /**PATH /var/www/Kriminalogiya/resources/views/pages/search.blade.php ENDPATH**/ ?>