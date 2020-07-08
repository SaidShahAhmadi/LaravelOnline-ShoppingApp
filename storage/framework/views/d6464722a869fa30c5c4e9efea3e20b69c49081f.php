<?php $__env->startSection('title', 'Shopping Cart'); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
    <div class="container">
        <a href="#">Home</a>
        
        <strong> > </strong>
        <span>Shopping Cart</span>
    </div>
</div> <!-- end breadcrumbs -->

<br>
<div class="container">
    <div class="row">
        <div class="col-md-7">
           <div class="card">
            <div class="card-header"><h3> <span class="badge badge-danger"><?php echo e(Cart::count()); ?> </span> item(s) in Shopping Cart</h3></div>
               <div class="card-body">
                
                 <?php if(Cart::count() > 0): ?>
                    <div class="cart-table">
                        
                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="cart-table-row row">

                            <div class="col-md-6">
                                <div class="cart-table-row-left">
                                    <a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><img src="<?php echo e(asset('storage/'.$item->model->image)); ?>" alt="item" class="cart-table-img"></a>
                                    <div>
                                        <select class="quantity custom-select input-sm" data-id="<?php echo e($item->rowId); ?>"> 
                                            <?php for($i = 1; $i < 5 + 1 ; $i++): ?>
                                                <option <?php echo e($item->qty == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                                            <?php endfor; ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            

                                <div class="col-md-5">
                                    <div class="cart-table-actions">  
                                        <div class="cart-item-details">
                                            
                                            <div class="cart-table-item"><a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><?php echo e($item->model->name); ?></a></div>
                                            <div class="cart-table-description"><?php echo e($item->model->details); ?></div>
                                        </div>


                                        <span class="badge badge-dark">Price: <?php echo e(asDollars($item->subtotal)); ?></span>
                                        

                                        <div class="form-inline ">
                                            <form action="<?php echo e(route('cart.destroy', $item->rowId)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                                <button type="submit" class="btn btn-outline-danger btn-sm btn-size">Remove</button>
                                            </form>
                                                
                                            <form action="<?php echo e(route('cart.switchToSaveForLater', $item->rowId)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-outline-success  btn-size">Save for Later</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            
                        </div> <!-- end cart-table-row -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> <!-- end cart-table -->
               </div><!-- end card-body -->
           </div> <!-- end card -->

           
           <br>
           <div class="cart-buttons">
                <a href="<?php echo e(route('shop.index')); ?>" class="button">Continue Shopping</a>
                <a href="<?php echo e(route('checkout.index')); ?>" class="button-primary">PLACE ORDER</a>
           </div>
        </div> <!-- end col-md-7 -->

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">PRICE DETAILS</div>
                    <div class="card-body">
                        <div class="cart-totals">
                            

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action
                                        align-items-center justify-content-between d-flex "> Price (<?php echo e(Cart::count()); ?> items)
                                    <span><?php echo e(asDollars(Cart::subtotal())); ?> </span> 
                                </li>

                                <li class="list-group-item list-group-item-action
                                        align-items-center justify-content-between d-flex "> Delivery Fee
                                    <span style="color:#388E3C">FREE </span> 
                                </li>

                                <li class="list-group-item list-group-item-action
                                        align-items-center justify-content-between d-flex "> Tax (20%)
                                    <span><?php echo e(asDollars(Cart::tax())); ?> </span> 
                                </li>

                                <li class="list-group-item list-group-item-action
                                        align-items-center justify-content-between d-flex "> Total Amount
                                    <span class="badge badge-dark  "><?php echo e(asDollars(Cart::total())); ?> </span> 
                                </li>  
                            </ul>
                        </div> <!-- end cart-totals -->
                        <?php else: ?>
                            <h3 class="alert alert-warning">No items in Cart!</h3>
                        <?php endif; ?>
                       
                    </div> <!-- card-body -->
                </div>  <!-- card -->
                
              
            </div><!-- col-md-5 -->

            
    </div><!-- end row -->



    
 

    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3> <span class="badge badge-danger"><?php echo e(Cart::instance('saveForLater')->count()); ?> </span> item(s) Saved For Later</h3></div>
                   <div class="card-body"> 
    
                        
                        <?php if(Cart::instance('saveForLater')->count() > 0): ?>

                        <div class="saved-for-later cart-table">
                            
                            <?php $__currentLoopData = Cart::instance('saveForLater')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="cart-table-row row">

                                <div class="col-md-3">
                                    <div class="cart-table-row-left">
                                        <a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><img src="<?php echo e(asset('storage/'.$item->model->image)); ?>" alt="item" class="cart-table-img"></a>
                            
                                    </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="cart-table-row-right">

                                        <div class="cart-item-details">
                                            <div class="cart-table-item"><a href="<?php echo e(route('shop.show', $item->model->slug)); ?>"><?php echo e($item->model->name); ?></a></div>
                                            <div class="cart-table-description"><?php echo e($item->model->details); ?></div>
                                                <div>
                                                    <span class="badge badge-dark">Price: <?php echo e(asDollars(Cart::subtotal())); ?></span> 
                                                </div>
                                        </div>

                                        <div class="cart-table-actions">
                                            <form action="<?php echo e(route('saveForLater.destroy', $item->rowId)); ?>" method="POST">
    
                                            <form action="<?php echo e(route('cart.destroy', $item->rowId)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                                <button type="submit" class="btn  btn-outline-danger">Remove</button>
                                            </form>
    
                                            <form action="<?php echo e(route('saveForLater.switchToCart', $item->rowId)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-outline-primary savelater">Move to Cart</button>
                                            </form>
                                        </div>
                                        
                                    </div> <!-- cart-table-row-right -->
                                </div> 
                            </div> <!-- end cart-table-row row -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div> <!-- end saved-for-later -->

                        <?php else: ?>

                        <h3 class="alert alert-warning">You have no items Saved for Later.</h3>
                        <?php endif; ?>
        
                   </div> <!-- end card-body--> 
            </div><!-- end card-->
        </div><!-- col-md-12 -->
    </div><!-- end row -->
    <br>
</div><!-- end container -->

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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/cart.blade.php ENDPATH**/ ?>