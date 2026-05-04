<!--! ================================================================ !-->
<?php $__currentLoopData = $academia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit<?php echo e($academy->id); ?>">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Rahbariyat</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="<?php echo e(route('rahbariyat.update', $academy->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(uz):</label>
                            <input type="text" name="name_uz" value="<?php echo e(old('name_uz',$academy->name_uz)); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(ru):</label>
                            <input type="text" name="name_ru" value="<?php echo e(old('name_ru',$academy->name_ru)); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(en):</label>
                            <input type="text" name="name_en" value="<?php echo e(old('name_en',$academy->name_en)); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(kr):</label>
                            <input type="text" name="name_kr" value="<?php echo e(old('name_kr',$academy->name_kr)); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(uz):</label>
                        <input type="text" name="post_uz" value="<?php echo e(old('post_uz',$academy->post_uz)); ?>" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(ru):</label>
                        <input type="text" name="post_ru" value="<?php echo e(old('post_ru',$academy->post_ru)); ?>" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(en):</label>
                        <input type="text" name="post_en" value="<?php echo e(old('post_en',$academy->post_en)); ?>" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(kr):</label>
                        <input type="text" name="post_kr" value="<?php echo e(old('post_kr',$academy->post_kr)); ?>" class="form-control">
                    </div>
                    <?php if($academy->photos()->exists()): ?>
                        <!-- Munosabat mavjudligini tekshirish -->
                        <?php $__currentLoopData = $academy->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- Munosabatni chaqirish va kolleksiyani aylanish -->
                            <img src="<?php echo e(asset('storage/' . $photo->file_path)); ?>" alt="Question Image"
                                 class="img-fluid mt-2" width="150">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Rasmi:</label>
                            <input type="file" name="photo" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Elektron pochtasi:</label>
                        <input type="text" name="email" value="<?php echo e(old('email',$academy->email)); ?>" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Tel_raqami:</label>
                        <input type="text" name="phone" value="<?php echo e(old('phone',$academy->phone)); ?>" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Ish vaqti:</label>
                        <input type="text" name="worktime" value="<?php echo e(old('worktime',$academy->worktime)); ?>" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary d-inline-block mt-4">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
<?php /**PATH C:\Users\user\Desktop\kriminologiya sayt\Kriminalogiya.tar\Kriminalogiya\resources\views\components\admin\rahbariyat\rahbariyat-modal-edit.blade.php ENDPATH**/ ?>