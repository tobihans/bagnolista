<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Bagnolista')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <?php echo $__env->yieldPushContent('styles'); ?>

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Page Content -->
            <main class="pt-6 min-h-screen mb-2">
                <?php echo e($slot); ?>

            </main>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </body>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script>
        window.Alpine.start();
    </script>
</html>
<?php /**PATH /home/tobi/Code/php/bagnolista/resources/views/layouts/app.blade.php ENDPATH**/ ?>