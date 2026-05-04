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
            <form action="<?php echo e(route('explorations.update', $exploration->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <div class="mb-3">
                    <label>Name UZ</label>
                    <input type="text" name="name_uz" class="form-control"
                           value="<?php echo e(old('name_uz', $exploration->name_uz)); ?>">
                </div>

                <div class="mb-3">
                    <label>Name RU</label>
                    <input type="text" name="name_ru" class="form-control"
                           value="<?php echo e(old('name_ru', $exploration->name_ru)); ?>">
                </div>

                <div class="mb-3">
                    <label>Name EN</label>
                    <input type="text" name="name_en" class="form-control"
                           value="<?php echo e(old('name_en', $exploration->name_en)); ?>">
                </div>

                <div class="mb-3">
                    <label>Name KR</label>
                    <input type="text" name="name_kr" class="form-control"
                           value="<?php echo e(old('name_kr', $exploration->name_kr)); ?>">
                </div>

                
                <div class="mb-3">
                    <label>Maqsadi UZ</label>
                    <textarea name="purpose_uz" class="form-control" rows="4"><?php echo e(old('purpose_uz', $exploration->purpose_uz)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Maqsadi RU</label>
                    <textarea name="purpose_ru" class="form-control" rows="4"><?php echo e(old('purpose_ru', $exploration->purpose_ru)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Maqsadi EN</label>
                    <textarea name="purpose_en" class="form-control" rows="4"><?php echo e(old('purpose_en', $exploration->purpose_en)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Maqsadi KR</label>
                    <textarea name="purpose_kr" class="form-control" rows="4"><?php echo e(old('purpose_kr', $exploration->purpose_kr)); ?></textarea>
                </div>

                
                <div class="mb-3">
                    <label>Vazifalari UZ</label>
                    <textarea name="tasks_uz" class="form-control" rows="4"><?php echo e(old('tasks_uz', $exploration->tasks_uz)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Vazifalari RU</label>
                    <textarea name="tasks_ru" class="form-control" rows="4"><?php echo e(old('tasks_ru', $exploration->tasks_ru)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Vazifalari EN</label>
                    <textarea name="tasks_en" class="form-control" rows="4"><?php echo e(old('tasks_en', $exploration->tasks_en)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Vazifalari KR</label>
                    <textarea name="tasks_kr" class="form-control" rows="4"><?php echo e(old('tasks_kr', $exploration->tasks_kr)); ?></textarea>
                </div>

                
                <div class="mb-3">
                    <label>Kutilayotgan natijalar UZ</label>
                    <textarea name="expected_results_uz" class="form-control" rows="4"><?php echo e(old('expected_results_uz', $exploration->expected_results_uz)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Kutilayotgan natijalar RU</label>
                    <textarea name="expected_results_ru" class="form-control" rows="4"><?php echo e(old('expected_results_ru', $exploration->expected_results_ru)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Kutilayotgan natijalar EN</label>
                    <textarea name="expected_results_en" class="form-control" rows="4"><?php echo e(old('expected_results_en', $exploration->expected_results_en)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Kutilayotgan natijalar KR</label>
                    <textarea name="expected_results_kr" class="form-control" rows="4"><?php echo e(old('expected_results_kr', $exploration->expected_results_kr)); ?></textarea>
                </div>

                
                <div class="mb-3">
                    <label>Loyiha rahbari UZ</label>
                    <input type="text" name="leader_uz" class="form-control"
                           value="<?php echo e(old('leader_uz', $exploration->leader_uz)); ?>">
                </div>

                <div class="mb-3">
                    <label>Loyiha rahbari RU</label>
                    <input type="text" name="leader_ru" class="form-control"
                           value="<?php echo e(old('leader_ru', $exploration->leader_ru)); ?>">
                </div>

                <div class="mb-3">
                    <label>Loyiha rahbari EN</label>
                    <input type="text" name="leader_en" class="form-control"
                           value="<?php echo e(old('leader_en', $exploration->leader_en)); ?>">
                </div>

                <div class="mb-3">
                    <label>Loyiha rahbari KR</label>
                    <input type="text" name="leader_kr" class="form-control"
                           value="<?php echo e(old('leader_kr', $exploration->leader_kr)); ?>">
                </div>

                <button type="submit" class="btn btn-primary">
                    Yangilash
                </button>
            </form>
        </div>
    </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
<?php /**PATH C:\Users\user\Desktop\kriminologiya sayt\Kriminalogiya.tar\Kriminalogiya\resources\views\components\admin\exploration\partner-modal-edit.blade.php ENDPATH**/ ?>