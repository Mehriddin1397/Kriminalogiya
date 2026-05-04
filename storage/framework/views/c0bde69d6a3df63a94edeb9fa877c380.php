<url>
<?php if(! empty($tag->url)): ?>
    <loc><?php echo e(url($tag->url)); ?></loc>
<?php endif; ?>
<?php if(count($tag->alternates)): ?>
<?php $__currentLoopData = $tag->alternates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alternate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <xhtml:link rel="alternate" hreflang="<?php echo e($alternate->locale); ?>" href="<?php echo e(url($alternate->url)); ?>" />
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(! is_null($tag->lastModificationDate)): ?>
    <lastmod><?php echo e($tag->lastModificationDate->format(DateTime::ATOM)); ?></lastmod>
<?php endif; ?>
<?php if(! is_null($tag->changeFrequency)): ?>
    <changefreq><?php echo e($tag->changeFrequency); ?></changefreq>
<?php endif; ?>
<?php if(! is_null($tag->priority)): ?>
    <priority><?php echo e(number_format($tag->priority, 1)); ?></priority>
<?php endif; ?>
    <?php echo $__env->renderEach('sitemap::image', $tag->images, 'image'); ?>
    <?php echo $__env->renderEach('sitemap::video', $tag->videos, 'video'); ?>
    <?php echo $__env->renderEach('sitemap::news', $tag->news, 'news'); ?>
</url>
<?php /**PATH C:\Users\user\Desktop\kriminologiya sayt\Kriminalogiya.tar\Kriminalogiya\vendor\spatie\laravel-sitemap\resources\views\url.blade.php ENDPATH**/ ?>