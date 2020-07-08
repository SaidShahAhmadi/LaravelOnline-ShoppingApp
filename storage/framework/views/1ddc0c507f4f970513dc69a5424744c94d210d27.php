<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="breadcrumbs">
        <div class="container">
            <a href="/">Home</a>
          <strong> > </strong>

            
            <a href="<?php echo e(route('shop.index')); ?>">Shop</a>
            
          <strong> > </strong>
            <span>Macbook Pro</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="product-section container">
    
        <div class="product-section-image">

            <img src="<?php echo e(productImage($product->image)); ?>" alt="product" 
            class="active"  id="currentImage">

        </div>

        <div class="product-section-information">
            <h1 class="product-section-title"><?php echo e($product->name); ?></h1>
            <div class="product-section-subtitle"><?php echo e($product->details); ?></div>
            <div class="product-section-price"><?php echo e(asDollars($product->price)); ?></div>

            <p>
                <?php echo $product->description; ?>

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
                <div class="product-section-images ">

                    <div class="img-thumbnail selected ">
                        <img class="" src="<?php echo e(productImage($product->image)); ?>" alt="product">
                   </div>

                    <?php if($product->images): ?>
                        <?php $__currentLoopData = json_decode($product->images,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="img-thumbnail ">
                                     <img class="" src="<?php echo e(productImage($image)); ?>" alt="product">
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                
                </div>
    </div> <!-- end product-section -->

    <?php echo $__env->make('partials.might-like', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
        <script>

            ( function(){

                    const currentImage = document.querySelector('#currentImage');
                    const images = document.querySelectorAll('.img-thumbnail');

                    images.forEach((element) => element.addEventListener('mouseenter', thumbnailClick));

                    function thumbnailClick(e) {
                        // currentImage.src = this.querySelector('img').src;

                        currentImage.classList.remove('active');

                        currentImage.addEventListener('transitionend', () => {

                             currentImage.src = this.querySelector('img').src;
                             currentImage.classList.add('active');

                        })

                    images.forEach((element) => element.classList.remove('selected'));
                    this.classList.add('selected');

                        
                    }

            })();

        </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/product.blade.php ENDPATH**/ ?>