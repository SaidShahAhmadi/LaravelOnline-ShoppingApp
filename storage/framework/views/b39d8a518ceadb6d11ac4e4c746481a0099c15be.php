<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="breadcrumbs">
        <div class="container">
            <a href="/">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="<?php echo e(route('shop.index')); ?>">Shop</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Macbook Pro</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="product-section container">
        <div class="product-section-image">
            <img src="<?php echo e(asset('img/products/'.$product->slug.'.jpg')); ?>" alt="product">
            
        </div>

  
        <div class="product-section-information">
            <h1 class="product-section-title"><?php echo e($product->name); ?></h1>
            <div class="product-section-subtitle"><?php echo e($product->details); ?></div>
            <div class="product-section-price"><?php echo e($product->price); ?></div>

            <p>
                <?php echo e($product->description); ?>

            </p>

            <p>&nbsp;</p>

            
            <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                <button type="submit" class="button button-plain">Add to Cart</button>
            </form>
        </div>
    </div> <!-- end product-section -->

    <?php echo $__env->make('partials.might-like', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\n\resources\views/product.blade.php ENDPATH**/ ?>