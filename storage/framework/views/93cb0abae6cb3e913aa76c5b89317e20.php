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
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Hamkorlar</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="<?php echo e(route('partner.update', $academy->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(uz):</label>
                            <input type="text" name="name_uz" value="<?php echo e(old('name_uz',$academy->name_uz)); ?>" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(ru):</label>
                            <input type="text" name="name_ru" value="<?php echo e(old('name_ru',$academy->name_ru)); ?>" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(en):</label>
                            <input type="text" name="name_en" value="<?php echo e(old('name_en',$academy->name_en)); ?>" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(kr):</label>
                            <input type="text" name="name_kr" value="<?php echo e(old('name_kr',$academy->name_kr)); ?>" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Link:</label>
                            <input type="text" name="link" value="<?php echo e(old('link',$academy->link)); ?>" class="form-control">
                        </div>
                        <?php if($academy->photos()->exists()): ?>
                            <!-- Munosabat mavjudligini tekshirish -->
                            <?php $__currentLoopData = $academy->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Munosabatni chaqirish va kolleksiyani aylanish -->
                                <img src="<?php echo e(asset('storage/' . $photo->file_path)); ?>" alt="Question Image"
                                     class="img-fluid mt-2" width="150">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="form-group mb-4">
                            <label class="form-label">Rasmi:</label>
                            <input type="file" name="photo" class="form-control" >
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="categories">Kategoriyalari:</label>
                            <select name="categories[]" class="form-select form-control" >
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php if($academy->categories->contains($category->id)): ?> selected <?php endif; ?>><?php echo e($category->name_uz); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
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
<?php /**PATH C:\Users\user\Desktop\kriminologiya sayt\Kriminalogiya.tar\Kriminalogiya\resources\views\components\admin\partner\partner-modal-edit.blade.php ENDPATH**/ ?>