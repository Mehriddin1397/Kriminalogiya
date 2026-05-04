<?php if (isset($component)) { $__componentOriginal27ace535957143cef069f9d3d7f387f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ace535957143cef069f9d3d7f387f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => ['title' => ''.e(__('lan.boglanish')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('lan.boglanish')).'']); ?>
<div class="home-luxury">

    
    <?php
        $heroBg = collect([
            'assets/img/banner1.jpg',
            'assets/img/banner4.jpg',
            'assets/img/aa.jpg',
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
                <span><?php echo e(__('lan.boglanish')); ?></span>
            </div>

            <span class="lx-eyebrow" data-aos="fade-up">Aloqa</span>
            <h1 class="lx-page-title" data-aos="fade-up"><?php echo e(__('lan.boglanish')); ?></h1>
            <div class="lx-page-divider" data-aos="fade-up"></div>
            <p class="lx-page-meta" data-aos="fade-up">
                <?php echo e(__('lan.kriminalog')); ?>

            </p>
        </div>
    </section>

    
    <section class="lx-section" style="background: var(--lx-cream);">
        <div class="container">

            
            <?php if(isset($contact)): ?>
                <div class="lx-contact-quick">

                    <?php if(!empty($contact->address)): ?>
                        <div class="lx-contact-quick-card" data-aos="fade-up" data-aos-delay="0">
                            <div class="lx-contact-quick-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <span class="lx-contact-quick-label"><?php echo e(__('lan.address')); ?></span>
                            <div class="lx-contact-quick-value"><?php echo e($contact->address); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($contact->phone)): ?>
                        <a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $contact->phone)); ?>"
                           class="lx-contact-quick-card" data-aos="fade-up" data-aos-delay="120">
                            <div class="lx-contact-quick-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.94.36 1.86.7 2.74a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.34-1.34a2 2 0 0 1 2.11-.45c.88.34 1.8.57 2.74.7a2 2 0 0 1 1.72 2z"/>
                                </svg>
                            </div>
                            <span class="lx-contact-quick-label"><?php echo e(__('lan.telefon') ?? 'Telefon'); ?></span>
                            <div class="lx-contact-quick-value"><?php echo e($contact->phone); ?></div>
                        </a>
                    <?php endif; ?>

                    <?php if(!empty($contact->email)): ?>
                        <a href="mailto:<?php echo e($contact->email); ?>"
                           class="lx-contact-quick-card" data-aos="fade-up" data-aos-delay="240">
                            <div class="lx-contact-quick-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <path d="m22 6-10 7L2 6"/>
                                </svg>
                            </div>
                            <span class="lx-contact-quick-label">Email</span>
                            <div class="lx-contact-quick-value"><?php echo e($contact->email); ?></div>
                        </a>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            
            <div class="lx-contact-grid">

                <div class="lx-contact-map" data-aos="fade-up">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.7171271314264!2d69.35085011134264!3d41.33676407118661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef5000b14d5e3%3A0x4aaeaebef082e1c2!2sKriminologiya%20tadqiqot%20instituti!5e0!3m2!1suz!2s!4v1745345559699!5m2!1suz!2s"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            aria-hidden="false"
                            tabindex="0"></iframe>
                </div>

                <div class="lx-contact-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="lx-contact-card-head">
                        <div class="lx-contact-card-eyebrow">Kriminalogiya Instituti</div>
                        <h2 class="lx-contact-card-title"><?php echo e(__('lan.boglanish')); ?></h2>
                    </div>

                    <ul class="lx-contact-card-list">
                        <?php if(isset($contact)): ?>
                            <?php if(!empty($contact->address)): ?>
                                <li>
                                    <span class="lx-contact-card-label"><?php echo e(__('lan.address')); ?></span>
                                    <span class="lx-contact-card-value"><?php echo e($contact->address); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($contact->worktime)): ?>
                                <li>
                                    <span class="lx-contact-card-label"><?php echo e(__('lan.ish_jadvali') ?? 'Ish vaqti'); ?></span>
                                    <span class="lx-contact-card-value"><?php echo e($contact->worktime); ?></span>
                                </li>
                            <?php else: ?>
                                <li>
                                    <span class="lx-contact-card-label"><?php echo e(__('lan.ish_jadvali') ?? 'Ish vaqti'); ?></span>
                                    <span class="lx-contact-card-value"><?php echo e(__('lan.ish_vaqt')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($contact->phone)): ?>
                                <li>
                                    <span class="lx-contact-card-label"><?php echo e(__('lan.telefon') ?? 'Telefon'); ?></span>
                                    <span class="lx-contact-card-value">
                                        <a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $contact->phone)); ?>"><?php echo e($contact->phone); ?></a>
                                    </span>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($contact->email)): ?>
                                <li>
                                    <span class="lx-contact-card-label">Email</span>
                                    <span class="lx-contact-card-value">
                                        <a href="mailto:<?php echo e($contact->email); ?>"><?php echo e($contact->email); ?></a><br>
                                        <a href="mailto:kti@iiv.uz">kti@iiv.uz</a>
                                    </span>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>

            
            <div class="lx-contact-form-wrap" id="contact-form" data-aos="fade-up">

                <aside class="lx-contact-form-side">
                    <span class="lx-eyebrow">Xabar yuboring</span>
                    <h3>Biz bilan bog'laning</h3>
                    <div class="lx-side-divider"></div>
                    <p>
                        Savollaringiz, takliflaringiz yoki hamkorlik haqida formani to'ldiring —
                        eng qisqa muddatda javob beramiz.
                    </p>

                    <ul>
                        <?php if(isset($contact)): ?>
                            <?php if(!empty($contact->phone)): ?>
                                <li>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.94.36 1.86.7 2.74a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.34-1.34a2 2 0 0 1 2.11-.45c.88.34 1.8.57 2.74.7a2 2 0 0 1 1.72 2z"/>
                                    </svg>
                                    <a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $contact->phone)); ?>"><?php echo e($contact->phone); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($contact->email)): ?>
                                <li>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                                        <path d="m22 6-10 7L2 6"/>
                                    </svg>
                                    <a href="mailto:<?php echo e($contact->email); ?>"><?php echo e($contact->email); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($contact->address)): ?>
                                <li>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    <?php echo e($contact->address); ?>

                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </aside>

                <form action="<?php echo e(route('contact.send')); ?>" method="post" class="lx-contact-form" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="lx-form-head">
                        <span class="lx-eyebrow">Aloqa formasi</span>
                        <h2>Xabar yuborish</h2>
                    </div>

                    <?php if(session('contact_success')): ?>
                        <div class="lx-form-success" role="status">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path d="M20 6 9 17l-5-5"/>
                            </svg>
                            <span><?php echo e(session('contact_success')); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="lx-form-row">
                        <div class="lx-form-field <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label for="lxName">Ism va familiya<span class="req">*</span></label>
                            <input id="lxName" type="text" name="name" value="<?php echo e(old('name')); ?>"
                                   placeholder="Aliyev Vali" required maxlength="150">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="lx-form-error"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="lx-form-field <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                            <label for="lxPhone">Telefon raqam<span class="req">*</span></label>
                            <input id="lxPhone" type="tel" name="phone" value="<?php echo e(old('phone')); ?>"
                                   placeholder="+998 90 123 45 67" required maxlength="50">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="lx-form-error"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="lx-form-field lx-form-field--full <?php echo e($errors->has('message') ? 'has-error' : ''); ?>">
                        <label for="lxMessage">Xabar<span class="req">*</span></label>
                        <textarea id="lxMessage" name="message" rows="5"
                                  placeholder="Savolingizni yoki taklifingizni yozing..."
                                  required maxlength="5000"><?php echo e(old('message')); ?></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="lx-form-error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="lx-form-actions">
                        <button type="submit" class="lx-btn lx-btn-dark">
                            <span>Yuborish</span>
                            <span class="arrow">&rarr;</span>
                        </button>
                        <span class="lx-form-note">
                            <span class="req" style="color: var(--lx-crimson);">*</span> Majburiy maydonlar
                        </span>
                    </div>
                </form>

            </div>

            
            <?php if(isset($contact)): ?>
                <div class="lx-contact-social" data-aos="fade-up">
                    <div class="lx-contact-social-eyebrow">Ijtimoiy tarmoqlar</div>
                    <div class="lx-contact-social-row">
                        <?php if(!empty($contact->telegram_link)): ?>
                            <a href="<?php echo e($contact->telegram_link); ?>" target="_blank" rel="noopener"
                               class="lx-contact-social-link" aria-label="Telegram">
                                <i class="fab fa-telegram"></i>
                            </a>
                        <?php endif; ?>
                        <?php if(!empty($contact->facebook_link)): ?>
                            <a href="<?php echo e($contact->facebook_link); ?>" target="_blank" rel="noopener"
                               class="lx-contact-social-link" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                        <?php if(!empty($contact->youtube_link)): ?>
                            <a href="<?php echo e($contact->youtube_link); ?>" target="_blank" rel="noopener"
                               class="lx-contact-social-link" aria-label="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        <?php endif; ?>
                        <?php if(!empty($contact->whatsapp_link)): ?>
                            <a href="<?php echo e($contact->whatsapp_link); ?>" target="_blank" rel="noopener"
                               class="lx-contact-social-link" aria-label="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
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
<?php /**PATH C:\Users\user\Desktop\kriminologiya sayt\Kriminalogiya.tar\Kriminalogiya\resources\views/pages/contact.blade.php ENDPATH**/ ?>