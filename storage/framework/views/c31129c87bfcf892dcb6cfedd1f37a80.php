<!--! [Start] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvas" xmlns="http://www.w3.org/1999/html">
    <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
        <div class="d-flex align-items-center">
            <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                 data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i
                    class="feather-arrow-left"></i></div>
            <span class="vr text-muted mx-4"></span>
            <a href="javascript:void(0);">
                <h2 class="fs-14 fw-bold text-truncate-1-line">Yaratish</h2>
                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Yaratish</span>
            </a>
        </div>

    </div>
    <div class="offcanvas-body">
        <form action="<?php echo e(route('explorations.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            
            <input type="text" name="name_uz" placeholder="Name UZ">
            <input type="text" name="name_ru" placeholder="Name RU">
            <input type="text" name="name_en" placeholder="Name EN">
            <input type="text" name="name_kr" placeholder="Name KR">

            
            <textarea name="purpose_uz" placeholder="Maqsadi UZ"></textarea>
            <textarea name="purpose_ru" placeholder="Maqsadi RU"></textarea>
            <textarea name="purpose_en" placeholder="Maqsadi EN"></textarea>
            <textarea name="purpose_kr" placeholder="Maqsadi KR"></textarea>

            
            <textarea name="tasks_uz" placeholder="Vazifalari UZ"></textarea>
            <textarea name="tasks_ru" placeholder="Vazifalari RU"></textarea>
            <textarea name="tasks_en" placeholder="Vazifalari EN"></textarea>
            <textarea name="tasks_kr" placeholder="Vazifalari KR"></textarea>

            
            <textarea name="expected_results_uz" placeholder="Natijalar UZ"></textarea>
            <textarea name="expected_results_ru" placeholder="Natijalar RU"></textarea>
            <textarea name="expected_results_en" placeholder="Natijalar EN"></textarea>
            <textarea name="expected_results_kr" placeholder="Natijalar KR"></textarea>

            
            <input type="text" name="leader_uz" placeholder="Rahbar UZ">
            <input type="text" name="leader_ru" placeholder="Rahbar RU">
            <input type="text" name="leader_en" placeholder="Rahbar EN">
            <input type="text" name="leader_kr" placeholder="Rahbar KR">

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label class="form-label" for="categories">Kategoriyalari:</label>
                    <select name="categories[]" class="form-select form-control">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name_uz); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label class="form-label">Rasmi:</label>
                    <input type="file" name="photos[]" class="form-control" multiple required>
                </div>
            </div>

            <button type="submit">
                Saqlash
            </button>
        </form>
    </div>

</div>
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
<?php /**PATH C:\Users\user\Desktop\kriminologiya sayt\Kriminalogiya.tar\Kriminalogiya\resources\views\components\admin\exploration\partner-modal-create.blade.php ENDPATH**/ ?>