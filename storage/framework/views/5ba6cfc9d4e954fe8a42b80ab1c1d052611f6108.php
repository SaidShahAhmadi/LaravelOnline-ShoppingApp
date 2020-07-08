<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Laravel Ecommerce | <?php echo $__env->yieldContent('title', ''); ?></title>

        <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
        <script src="<?php echo e(asset('/js/jquery.js')); ?>" ></script>
        <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>" ></script>
        <script src="<?php echo e(asset('toastr/toastr.min.js')); ?>"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">

        <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('toastr/toastr.min.css')); ?>" rel="stylesheet">
    

        <?php echo $__env->yieldContent('extra-css'); ?>
    </head>


<body class="<?php echo $__env->yieldContent('body-class', ''); ?>">
    <?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="">
        <?php echo $__env->make('partials.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

       
   </div>
<main class="py-4">
           <?php echo $__env->yieldContent('content'); ?>
       </main>
  
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('extra-js'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\new\resources\views/layout.blade.php ENDPATH**/ ?>