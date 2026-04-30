<?php if (isset($component)) { $__componentOriginal27ace535957143cef069f9d3d7f387f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ace535957143cef069f9d3d7f387f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => ['title' => 'Bosh sahifa']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Bosh sahifa']); ?>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5" >
        <div class="owl-carousel header-carousel position-relative" >
            <div class="owl-carousel-item position-relative ">
                <img class="img-fluid" src="img/1.6.png" alt="">
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.2.png" alt="">
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.4.png" alt="">
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.3.png" alt="">
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.1.png" alt="">
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.5.png" alt="">
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Mahalliy Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5"><?php echo e(__('lan.sun_yan')); ?></h1>
            </div>
            <div class="row g-4">
                <?php $__currentLoopData = $mnews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?php echo e(asset('storage/'.$new->photos->first()->file_path)); ?>" alt="" style="width:408px; height:245px; !important;"  >
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3"></h4>
                            <p><?php echo e($new->name); ?></p>
                            <a class="fw-medium" href="<?php echo e(route('show',['category_id'=>8,'id'=>$new->id])); ?>"><?php echo e(__('lan.batafsil')); ?><i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- Mahalliy end -->

    <!-- Xorijiy Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5"><?php echo e(__('lan.sun_yann')); ?></h1>
            </div>
            <div class="row g-4">
                <?php $__currentLoopData = $xnews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?php echo e(asset('storage/'.$new->photos->first()->file_path)); ?>" alt="" style="width:408px; height:245px; !important;"  >
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3"></h4>
                            <p><?php echo e($new->name); ?></p>
                            <a class="fw-medium" href="<?php echo e(route('show',['category_id'=>22,'id'=>$new->id])); ?>"><?php echo e(__('lan.batafsil')); ?><i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- Xorijiy End -->
    <!-- statistika Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5"><?php echo e(__('lan.xal_index')); ?></h1>
            </div>
            <div class="row g-4">
                <?php $__currentLoopData = $inews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?php echo e(asset('storage/'.$new->photos->first()->file_path)); ?>" alt="" style="width:408px; height:245px; !important;"  >
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3"></h4>
                            <p><?php echo e($new->name); ?></p>
                            <a class="fw-medium" href="<?php echo e(route('show',['category_id'=>36,'id'=>$new->id])); ?>"><?php echo e(__('lan.batafsil')); ?><i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- statistika End -->


    <!-- Ma'lumotlar Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5"><?php echo e(__('lan.malumot')); ?></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="assets/img/i2.jfif" alt="" style="width:275px; height:183px; !important;">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <a href="<?php echo e(route('categoryId',13)); ?>"><h5 class="mb-0"><?php echo e(__('lan.ijti_ama_tad')); ?></h5></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="assets/img/i3.jfif" alt="" style="width:275px; height:183px; !important;">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                             <a href="<?php echo e(route('categoryId',15)); ?>"><h5 class="mb-0"><?php echo e(__('lan.kitobxonlik')); ?></h5> </a>
                         </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="assets/img/i4.jfif" alt="" style="width:275px; height:183px; !important;">

                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                             <a href="<?php echo e(route('show',['category_id'=>18,'id'=>5])); ?>"><h5 class="mb-0"><?php echo e(__('lan.jin_va_jin_saq')); ?></h5> </a>
                         </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="assets/img/kriminalogiya.jpg" alt="" style="width:275px; height:183px; !important;">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                             <a href="<?php echo e(route('categoryId',33)); ?>"><h5 class="mb-0"><?php echo e(__('lan.krimina_ins_jur')); ?></h5>  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ma'lumotlar End -->


    <!-- About Start -->
    <div class="container-xxl py-5 bg-light">
        <div class="containerr">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5"><?php echo e(__('lan.ins_haq')); ?></h1>
            </div>
            <div class="containerr">
                <div class="stat-card">
                    <div class="overflow-hidden  position-relative d-flex justify-content-center ">
                        <img class="img-fluid" src="assets/img/talaba.png" width="50px" alt="">
                    </div>
                    <div class="number"><?php echo e($researchcount); ?></div>
                    <div class="label"><?php echo e(__('lan.maqolalar')); ?></div>
                </div>

                <div class="stat-card">
                    <div class="overflow-hidden  position-relative d-flex justify-content-center ">
                        <img class="img-fluid" src="assets/img/training.png" width="50px" alt="">

                    </div>
                    <div class="number"><?php echo e($newscount); ?></div>
                    <div class="label"><?php echo e(__('lan.yangilik')); ?></div>
                </div>

                <div class="stat-card">
                    <div class="overflow-hidden  position-relative d-flex justify-content-center ">
                        <img class="img-fluid" src="assets/img/book.png" width="50px" alt="">


                    </div>
                    <div class="number"><?php echo e($category2PartnersCount); ?></div>
                    <div class="label"><?php echo e(__('lan.xor_ham')); ?></div>
                </div>

                <div class="stat-card">
                    <div class="overflow-hidden  position-relative d-flex justify-content-center ">
                        <img class="img-fluid" src="assets/img/partnership.png" width="50px" alt="">
                    </div>
                    <div class="number"><?php echo e($category1PartnersCount); ?></div>
                    <div class="label"><?php echo e(__('lan.mah_ham')); ?></div>
                </div>
            </div>
            <style>
                .containerr {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 20px;
                    justify-content: center;
                }

                .stat-card {
                    background-color: white;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    width: 250px;
                    padding: 20px;
                    text-align: center;
                    transition: transform 0.3s ease;
                }

                .stat-card:hover {
                    transform: translateY(-5px);
                    .number{
                        color: greenyellow;
                    }
                    .label{
                        color: blue;
                    }
                }

                .number {
                    font-size: 25px;
                    font-weight: bold;
                    color: #2c3e50;
                    margin-bottom: 10px;
                }

                .label {
                    font-size: 16px;
                    color: #7f8c8d;
                    text-transform: uppercase;
                }
            </style>

        </div>
    </div>

    <!-- About End -->


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
<?php /**PATH /var/www/Kriminalogiya/resources/views/pages/main.blade.php ENDPATH**/ ?>