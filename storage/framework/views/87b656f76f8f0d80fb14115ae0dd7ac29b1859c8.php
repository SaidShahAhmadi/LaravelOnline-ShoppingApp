<?php $__env->startSection('title', 'Shopping Cart'); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
    <div class="container">
        <a href="#">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shopping Cart</span>
    </div>
</div> <!-- end breadcrumbs -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
    <div class="cart-section">
        <div>
            
            <?php if(Cart::count() > 0): ?>

            <h2> <span class="badge badge-danger"><?php echo e(Cart::count()); ?> </span> item(s) in Shopping Cart</h2>
            <div class="cart-table">
                
                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><img src="<?php echo e(asset('img/products/'.$item->model->slug.'.jpg')); ?>" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            
                            <div class="cart-table-item"><a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><?php echo e($item->model->name); ?></a></div>
                            <div class="cart-table-description"><?php echo e($item->model->details); ?></div>
                        </div>
                    </div>

                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">  

                        <span class="badge badge-dark">Price: <?php echo e(asDollars($item->subtotal)); ?></span>
                        
                            <form action="<?php echo e(route('cart.destroy', $item->rowId)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>

                                <button type="submit" class="cart-options btn btn-outline-danger btn-sm">Remove</button>
                            </form>
                                
                            <form action="<?php echo e(route('cart.switchToSaveForLater', $item->rowId)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <button type="submit" class="btn btn-outline-success">Save for Later</button>
                            </form>
                        </div>
                        <div>
                            <select class="quantity custom-select " data-id="<?php echo e($item->rowId); ?>"> 
                                <?php for($i = 1; $i < 5 + 1 ; $i++): ?>
                                    <option <?php echo e($item->qty == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                                <?php endfor; ?>
                                
                            </select>
                        </div>
                        
                        

                    </div>
                </div> <!-- end cart-table-row -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div> <!-- end cart-table -->

        <a href="#" class="have-code">Have a Code?</a>

            <div class="have-code-container">
                <form action="#">
                    <input type="text">
                    <button type="submit" class="button button-plain">Apply</button>
                </form>
            </div> <!-- end have-code-container -->

            <div class="cart-totals">
                <div class="cart-totals-left">
                    Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
                </div>

                <div class="cart-totals-right">
                    <div>
                        Subtotal <br>
                        Tax (20%)<br>
                        <span class="cart-totals-total">  Total </span> 
                    </div>
                    <div class="cart-totals-subtotal">
                        
                        <?php echo e(asDollars(Cart::subtotal())); ?> <br>
                        <?php echo e(asDollars(Cart::tax())); ?> <br>
                       <span class="cart-totals-total"><?php echo e(asDollars(Cart::total())); ?></span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="<?php echo e(route('shop.index')); ?>" class="button">Continue Shopping</a>
                <a href="<?php echo e(route('checkout.index')); ?>" class="button-primary">Proceed to Checkout</a>
            </div>

            <?php else: ?>
                <h3 class="alert alert-warning">No items in Cart!</h3>
                <div class="spacer"></div>
                <a href="<?php echo e(route('shop.index')); ?>" class="button">Continue Shopping</a>
                <div class="spacer"></div>

            <?php endif; ?>
            


        
            <?php if(Cart::instance('saveForLater')->count() > 0): ?>

            <h2><?php echo e(Cart::instance('saveForLater')->count()); ?> item(s) Saved For Later</h2>

            <div class="saved-for-later cart-table">
                
                <?php $__currentLoopData = Cart::instance('saveForLater')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><img src="<?php echo e(asset('img/products/'.$item->model->slug.'.jpg')); ?>" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><?php echo e($item->model->name); ?></a></div>
                            <div class="cart-table-description"><?php echo e($item->model->details); ?></div>
                                <div>
                                    <span class="badge badge-dark">Price: <?php echo e(asDollars(Cart::subtotal())); ?></span> 
                                </div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="<?php echo e(route('saveForLater.destroy', $item->rowId)); ?>" method="POST">

                            <form action="<?php echo e(route('cart.destroy', $item->rowId)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>

                                <button type="submit" class="cart-options btn-danger">Remove</button>
                            </form>

                            <form action="<?php echo e(route('saveForLater.switchToCart', $item->rowId)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <button type="submit" class="cart-options savelater">Move to Cart</button>
                            </form>
                        </div>
                        
                       
                    </div>
                </div> <!-- end cart-table-row -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div> <!-- end saved-for-later -->

            <?php else: ?>

            <h3 class="alert alert-warning">You have no items Saved for Later.</h3>
            <?php endif; ?>

        </div>

    </div> <!-- end cart-section -->
        </div>
    </div>
</div>

    <?php echo $__env->make('partials.might-like', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>


    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '<?php echo e(route('cart.index')); ?>'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '<?php echo e(route('cart.index')); ?>'
                    });
                })
            })
        })();
    </script>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\n\resources\views/cart.blade.php ENDPATH**/ ?>