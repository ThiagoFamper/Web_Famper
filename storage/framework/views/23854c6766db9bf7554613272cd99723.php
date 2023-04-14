

<?php $__env->startSection('content'); ?>
    <h1>Tipos</h1>
    <?php echo e($tipos); ?>

    <h2>Listando os tipos</h2>
    <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($tipo); ?></p>
        <p>Titulo: <?php echo e($tipo->titulo); ?></p>
        <p>Icone: <?php echo e($tipo->icon); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Fontes\ProgWeb2023_Famper\Reservado\resources\views/tipo.blade.php ENDPATH**/ ?>