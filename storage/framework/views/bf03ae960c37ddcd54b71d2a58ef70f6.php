<!DOCTYPE html>
<html>
<head>
    <title>2FA Code</title>
</head>
<body>
<h2>Ikki bosqichli xavfsizlik</h2>
<form method="POST" action="<?php echo e(route('verify.code')); ?>">
    <?php echo csrf_field(); ?>
    <label for="code">Maxsus kodni kiriting:</label>
    <input type="text" name="code" required>
    <button type="submit">Tasdiqlash</button>
</form>

<?php if($errors->any()): ?>
    <div style="color: red;">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\user\Desktop\kriminologiya sayt\Kriminalogiya.tar\Kriminalogiya\resources\views/auth/verify-code.blade.php ENDPATH**/ ?>