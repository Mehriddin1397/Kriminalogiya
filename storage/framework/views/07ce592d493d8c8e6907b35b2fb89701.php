<footer class="lx-footer">
    <div class="lx-footer-inner">
        <div class="container">

            <div class="lx-footer-grid">

                
                <div class="lx-footer-brand" data-aos="fade-up">
                    <a href="<?php echo e(route('main')); ?>" class="lx-footer-logo">
                        <img src="<?php echo e(asset('assets/img/kti-logo.png')); ?>" alt="KTI">
                        <span class="lx-footer-logo-text">
                            <span class="small">Kriminologiya Instituti</span>
                            <span class="big"><?php echo e(__('lan.kriminalog')); ?></span>
                        </span>
                    </a>

                    <p class="lx-footer-tagline">
                        Ilm-fan asosida adolat va xavfsizlikni mustahkamlash. Kriminalogiya
                        sohasidagi tadqiqotlar, xalqaro hamkorlik va innovatsion yondashuv.
                    </p>

                    <div class="lx-footer-social">
                        <?php if(isset($contact)): ?>
                            <?php if(!empty($contact->telegram_link)): ?>
                                <a href="<?php echo e($contact->telegram_link); ?>" target="_blank" rel="noopener" aria-label="Telegram">
                                    <i class="fab fa-telegram"></i>
                                </a>
                            <?php endif; ?>
                            <?php if(!empty($contact->facebook_link)): ?>
                                <a href="<?php echo e($contact->facebook_link); ?>" target="_blank" rel="noopener" aria-label="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>
                            <?php if(!empty($contact->youtube_link)): ?>
                                <a href="<?php echo e($contact->youtube_link); ?>" target="_blank" rel="noopener" aria-label="YouTube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            <?php endif; ?>
                            <?php if(!empty($contact->whatsapp_link)): ?>
                                <a href="<?php echo e($contact->whatsapp_link); ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="lx-footer-col" data-aos="fade-up" data-aos-delay="100">
                    <h4 class="lx-footer-title"><?php echo e(__('lan.services')); ?></h4>
                    <ul class="lx-footer-links">
                        <li><a href="<?php echo e(route('categoryId', 34)); ?>"><?php echo e(__('lan.ish_qab')); ?></a></li>
                        <li><a href="<?php echo e(route('show', ['category_id' => 30, 'id' => 3])); ?>"><?php echo e(__('lan.dis_mav')); ?></a></li>
                        <li><a href="<?php echo e(route('categoryId', 31)); ?>"><?php echo e(__('lan.tadqiq')); ?></a></li>
                        <li><a href="<?php echo e(route('show', ['category_id' => 35, 'id' => 1])); ?>"><?php echo e(__('lan.pul_xiz')); ?></a></li>
                    </ul>
                </div>

                
                <div class="lx-footer-col" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="lx-footer-title"><?php echo e(__('lan.sayt_xaritasi')); ?></h4>
                    <ul class="lx-footer-links">
                        <li><a href="<?php echo e(route('categoryId', 14)); ?>"><?php echo e(__('lan.maqolalar')); ?></a></li>
                        <li><a href="<?php echo e(route('categoryId', 15)); ?>"><?php echo e(__('lan.kitobxonlik')); ?></a></li>
                        <li><a href="<?php echo e(route('categoryId', 22)); ?>"><?php echo e(__('lan.xor_yan')); ?></a></li>
                        <li><a href="<?php echo e(route('categoryId', 8)); ?>"><?php echo e(__('lan.mah_yan')); ?></a></li>
                        <li><a href="<?php echo e(route('boss')); ?>"><?php echo e(__('lan.rahbariyat')); ?></a></li>
                    </ul>
                </div>

                
                <div class="lx-footer-col" data-aos="fade-up" data-aos-delay="300">
                    <h4 class="lx-footer-title"><?php echo e(__('lan.address')); ?></h4>
                    <ul class="lx-footer-contact">
                        <?php if(isset($contact)): ?>
                            <?php if(!empty($contact->address)): ?>
                                <li>
                                    <span class="icon">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                            <circle cx="12" cy="10" r="3"/>
                                        </svg>
                                    </span>
                                    <span>
                                        <span class="label"><?php echo e(__('lan.address')); ?></span>
                                        <?php echo e($contact->address); ?>

                                    </span>
                                </li>
                            <?php endif; ?>

                            <?php if(!empty($contact->phone)): ?>
                                <li>
                                    <span class="icon">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.94.36 1.86.7 2.74a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.34-1.34a2 2 0 0 1 2.11-.45c.88.34 1.8.57 2.74.7a2 2 0 0 1 1.72 2z"/>
                                        </svg>
                                    </span>
                                    <span>
                                        <span class="label"><?php echo e(__('lan.telefon') ?? 'Telefon'); ?></span>
                                        <a href="tel:<?php echo e(preg_replace('/[^0-9+]/', '', $contact->phone)); ?>"><?php echo e($contact->phone); ?></a>
                                    </span>
                                </li>
                            <?php endif; ?>

                            <?php if(!empty($contact->email)): ?>
                                <li>
                                    <span class="icon">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                                            <path d="m22 6-10 7L2 6"/>
                                        </svg>
                                    </span>
                                    <span>
                                        <span class="label">Email</span>
                                        <a href="mailto:<?php echo e($contact->email); ?>"><?php echo e($contact->email); ?></a><br>
                                        <a href="mailto:kti@iiv.uz">kti@iiv.uz</a>
                                    </span>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <li>
                            <span class="icon">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M12 6v6l4 2"/>
                                </svg>
                            </span>
                            <span>
                                <span class="label"><?php echo e(__('lan.ish_vaqt')); ?></span>
                            </span>
                        </li>
                    </ul>
                </div>

            </div>

            
            <div class="lx-footer-bottom">
                <div>
                    &copy; <?php echo e(date('Y')); ?>

                    <a href="https://kti.iiv.uz">Kriminologiya tadqiqot instituti</a>.
                    <?php echo e(__('lan.bar_huq_him')); ?>

                </div>

                <div class="lx-footer-credit">
                    Designed by
                    <a href="https://mekhriddin.vercel.app/" target="_blank" rel="noopener"><strong>Mehriddin Soyibov</strong></a>
                </div>

                
                <div class="lx-footer-rating">
                    <script language="javascript" type="text/javascript">
                        top_js = "1.0";
                        top_r = "id=47852&r=" + escape(document.referrer) + "&pg=" + escape(window.location.href);
                        document.cookie = "smart_top=1; path=/";
                        top_r += "&c=" + (document.cookie ? "Y" : "N");
                    </script>
                    <script language="javascript1.1" type="text/javascript">
                        top_js = "1.1";
                        top_r += "&j=" + (navigator.javaEnabled() ? "Y" : "N");
                    </script>
                    <script language="javascript1.2" type="text/javascript">
                        top_js = "1.2";
                        top_r += "&wh=" + screen.width + 'x' + screen.height + "&px=" +
                            (((navigator.appName.substring(0, 3) == "Mic")) ? screen.colorDepth : screen.pixelDepth);
                    </script>
                    <script language="JavaScript" type="text/javascript">
                        top_rat = "&col=80312D&t=ffffff&p=F4AD00";
                        top_r += "&js=" + top_js + "";
                        document.write('<a href="http://www.uz/ru/res/visitor/index?id=47852" target=_top><img src="img/111.jpg?' + top_r + top_rat + '" width=88 height=31 border=0 alt="Top.uz"></a>');
                    </script>
                    <noscript>
                        <a href="http://www.uz/ru/res/visitor/index?id=47852" target="_top">
                            <img height="31" src="img/111.jpg" width="88" border="0" alt="Top.uz">
                        </a>
                    </noscript>
                </div>
            </div>

        </div>
    </div>
</footer>
<?php /**PATH C:\Users\user\Desktop\kriminologiya sayt\Kriminalogiya.tar\Kriminalogiya\resources\views\components\footer.blade.php ENDPATH**/ ?>