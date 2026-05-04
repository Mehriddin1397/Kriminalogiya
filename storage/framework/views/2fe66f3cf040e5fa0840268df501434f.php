<!--! ================================================================ !-->
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit<?php echo e($category->id); ?>">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Kategoriya</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line">Kategoriya o'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="<?php echo e(route('categories.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(uz):</label>
                    <input type="text" class="form-control" name="name_uz" value="<?php echo e($category->name_uz); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(ru):</label>
                    <input type="text" class="form-control" name="name_ru" value="<?php echo e($category->name_ru); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(en):</label>
                    <input type="text" class="form-control" name="name_en" value="<?php echo e($category->name_en); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(kr):</label>
                    <input type="text" class="form-control" name="name_kr" value="<?php echo e($category->name_kr); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(uz):</label>
                    <input type="text" class="form-control" name="slug_uz" value="<?php echo e($category->slug_uz); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(ru):</label>
                    <input type="text" class="form-control" name="slug_ru" value="<?php echo e($category->slug_ru); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(en):</label>
                    <input type="text" class="form-control" name="slug_en" value="<?php echo e($category->slug_en); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(kr):</label>
                    <input type="text" class="form-control" name="slug_kr" value="<?php echo e($category->slug_kr); ?>" required>
                </div>
                <div class="form-group mb-4">
                    <label for="object_type">Obyekt turi:</label>
                    <select name="object_type" required class="form-select form-control">
                        <option value="academia" <?php echo e(old('object_type', $category->object_type ?? '') == 'academia' ? 'selected' : ''); ?>>
                            Ilmiy kengash
                        </option>
                        <option value="bibliophilia" <?php echo e(old('object_type', $category->object_type ?? '') == 'bibliophilia' ? 'selected' : ''); ?>>
                            Kitobxonlik
                        </option>
                        <option value="crimes" <?php echo e(old('object_type', $category->object_type ?? '') == 'crimes' ? 'selected' : ''); ?>>
                            Jinoyatlar
                        </option>
                        <option value="institut" <?php echo e(old('object_type', $category->object_type ?? '') == 'institut' ? 'selected' : ''); ?>>
                            Institut va ishga qabul
                        </option>
                        <option value="jurnal" <?php echo e(old('object_type', $category->object_type ?? '') == 'jurnal' ? 'selected' : ''); ?>>
                            Jurnallar
                        </option>
                        <option value="news" <?php echo e(old('object_type', $category->object_type ?? '') == 'news' ? 'selected' : ''); ?>>
                            Yangiliklar
                        </option>
                        <option value="research" <?php echo e(old('object_type', $category->object_type ?? '') == 'research' ? 'selected' : ''); ?>>
                            Tadqiqotlar
                        </option>
                        <option value="scholars" <?php echo e(old('object_type', $category->object_type ?? '') == 'scholars' ? 'selected' : ''); ?>>
                            Tadqiqotchilar va amaliy yordam
                        </option>
                        <option value="partner" <?php echo e(old('object_type', $category->object_type ?? '') == 'partner' ? 'selected' : ''); ?>>
                            Hamkorlar
                        </option>
                        <option value="expertise" <?php echo e(old('object_type', $category->object_type ?? '') == 'expertise' ? 'selected' : ''); ?>>
                            Ilmiy salohiyat va hamkorlar
                        </option>
                        <option value="articles" <?php echo e(old('object_type', $category->object_type ?? '') == 'articles' ? 'selected' : ''); ?>>
                            Maqola va disertatsiya mavzulari
                        </option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Yangilash</button>
            </form>
        </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
<?php /**PATH C:\Users\user\Desktop\kriminologiya sayt\Kriminalogiya.tar\Kriminalogiya\resources\views/components/admin/category/category-modal-edit.blade.php ENDPATH**/ ?>