<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
    <div class="container">
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shop</span>
    </div>
</div> <!-- end breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="products-section">
                <div class="sidebar">
                    <h3>By Category</h3>
                    <ul>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            <li ><a href="<?php echo e(route('shop.index', ['category' => $category->slug])); ?>"><?php echo e($category->name); ?></a></li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div> <!-- end sidebar -->
        
                <div>
                 
                    <div class="products-header">
                        <h1 class="stylish-heading"><?php echo e($categoryName); ?></h1>
                        <div>
                            <h2>Price: </h2>
                            <a href="<?php echo e(route('shop.index', ['category'=> request()->category, 'sort' => 'low_high'])); ?>">Low to High</a> |
                            <a href="<?php echo e(route('shop.index', ['category'=> request()->category, 'sort' => 'high_low'])); ?>">High to Low</a>
                        </div>
                    </div>
        
                    <div class="products text-center">
                    
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="product">
                                
                                <a href="<?php echo e(route('shop.show', $product->slug)); ?>"><img src="<?php echo e(asset('img/products/'.$product->slug.'.jpg')); ?>" alt="product"></a>
                                <a href="<?php echo e(route('shop.show', $product->slug)); ?>"><div class="product-name"><?php echo e($product->name); ?></div></a>
                                <div class="product-price"><?php echo e($product->price); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div style="text-align: left">No items found</div>
                        <?php endif; ?>
                    </div> <!-- end products -->
        
                    <div class="spacer"></div>
                    <?php echo e($products->appends(request()->input())->links()); ?>

                         
                </div>
            </div>
        
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\n\resources\views/shop.blade.php ENDPATH**/ ?>