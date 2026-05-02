<?php if (isset($component)) { $__componentOriginal27ace535957143cef069f9d3d7f387f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ace535957143cef069f9d3d7f387f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => ['title' => ''.e(__('lan.rahbariyat')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('lan.rahbariyat')).'']); ?>
<div class="home-luxury">

    
    <?php
        $heroBg = collect([
            'assets/img/banner2.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner1.jpg',
            'assets/img/bg1.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));
    ?>

    <section class="lx-page-hero">
        <?php if($heroBg): ?>
            <div class="lx-page-hero-bg" aria-hidden="true">
                <img src="<?php echo e(asset($heroBg)); ?>" alt="" loading="lazy">
            </div>
        <?php endif; ?>

        <div class="lx-page-hero-decor" aria-hidden="true">
            <img src="<?php echo e(asset('assets/img/kti-logo.png')); ?>" alt="">
        </div>

        <div class="container">
            <div class="lx-breadcrumb" data-aos="fade-up">
                <a href="<?php echo e(route('main')); ?>"><?php echo e(__('lan.bosh_sahifa') ?? 'Bosh sahifa'); ?></a>
                <span class="sep">—</span>
                <span><?php echo e(__('lan.rahbariyat')); ?></span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">Institut</span>
            <h1 class="lx-page-title" data-aos="fade-up"><?php echo e(__('lan.rahbariyat')); ?></h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                <?php echo e($boss->count()); ?> <?php echo e(__('lan.lavozim') ?? 'lavozim'); ?>

            </p>
        </div>
    </section>

    
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            <div class="lx-section-head" data-aos="fade-up">
                <span class="lx-eyebrow">Bizning jamoa</span>
                <h2 class="lx-section-title"><?php echo e(__('lan.ins_rahbariyat') ?? __('lan.rahbariyat')); ?></h2>
                <p class="lx-section-sub">
                    Institutimiz rahbariyati tarkibi va vakolatlari haqida ma'lumotlar.
                </p>
            </div>

            <?php if($boss->count()): ?>
                <div class="lx-leaders-grid">
                    <?php $__currentLoopData = $boss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $bos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $photo = $bos->photos->first();
                            $modalId = 'bossModal' . $bos->id;
                            $initial = mb_strtoupper(mb_substr(trim($bos->name ?? '?'), 0, 1));
                        ?>

                        <a href="#"
                           role="button"
                           class="lx-leader-card"
                           data-bs-toggle="modal"
                           data-bs-target="#<?php echo e($modalId); ?>"
                           data-aos="fade-up"
                           data-aos-delay="<?php echo e(($i % 3) * 120); ?>">
                            <div class="lx-leader-photo">
                                <div class="lx-leader-photo-empty" aria-hidden="true">
                                    <span><?php echo e($initial); ?></span>
                                </div>
                                <?php if($photo): ?>
                                    <img src="<?php echo e(asset('storage/'.$photo->file_path)); ?>"
                                         alt="<?php echo e($bos->name); ?>"
                                         loading="lazy"
                                         onerror="this.style.display='none'">
                                <?php endif; ?>
                                <div class="lx-leader-overlay">
                                    <span class="lx-leader-view">
                                        <?php echo e(__('lan.batafsil')); ?> &rarr;
                                    </span>
                                </div>
                            </div>
                            <div class="lx-leader-info">
                                <div class="lx-leader-eyebrow"><?php echo e($bos->post); ?></div>
                                <h3 class="lx-leader-name"><?php echo e($bos->name); ?></h3>
                            </div>
                        </a>

                        
                        <div class="modal fade lx-modal"
                             id="<?php echo e($modalId); ?>"
                             tabindex="-1"
                             aria-labelledby="<?php echo e($modalId); ?>Label"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div>
                                            <div class="lx-leader-eyebrow" style="margin-bottom:6px;"><?php echo e($bos->post); ?></div>
                                            <h5 class="modal-title" id="<?php echo e($modalId); ?>Label"><?php echo e($bos->name); ?></h5>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo e(__('lan.yopish')); ?>">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M18 6 6 18M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <?php if(!empty($bos->phone)): ?>
                                            <div class="lx-modal-row">
                                                <span class="lx-modal-label"><?php echo e(__('lan.telefon')); ?></span>
                                                <span class="lx-modal-value">
                                                    <a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $bos->phone)); ?>"><?php echo e($bos->phone); ?></a>
                                                </span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(!empty($bos->email)): ?>
                                            <div class="lx-modal-row">
                                                <span class="lx-modal-label"><?php echo e(__('lan.email')); ?></span>
                                                <span class="lx-modal-value">
                                                    <a href="mailto:<?php echo e($bos->email); ?>"><?php echo e($bos->email); ?></a>
                                                </span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(!empty($bos->worktime)): ?>
                                            <div class="lx-modal-row">
                                                <span class="lx-modal-label"><?php echo e(__('lan.ish_jadvali')); ?></span>
                                                <span class="lx-modal-value"><?php echo e($bos->worktime); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="lx-btn lx-btn-dark" data-bs-dismiss="modal">
                                            <span><?php echo e(__('lan.yopish')); ?></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p style="text-align:center; color: var(--lx-text-soft); padding: 60px 0;">
                    <?php echo e(__('lan.malumot_yoq') ?? "Ma'lumot topilmadi."); ?>

                </p>
            <?php endif; ?>

            <div class="lx-back-wrap" data-aos="fade-up">
                <a href="<?php echo e(route('main')); ?>" class="lx-btn lx-btn-dark">
                    <span class="arrow-back">&larr;</span>
                    <span><?php echo e(__('lan.bosh')); ?></span>
                </a>
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
<?php /**PATH /Users/aktamovshahzod/Desktop/projects/mehriddin/Kriminalogiya/resources/views/pages/boshliq.blade.php ENDPATH**/ ?>