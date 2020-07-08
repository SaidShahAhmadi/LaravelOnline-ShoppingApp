<header>
    <div class="top-nav container">
        <div class="top-nav-left">
             <div class="logo"><a href="/">Ecommerce</a></div>

                <?php if(! (request()->is('checkout') || request()->is('guestCheckout'))): ?>
                        
                        <?php echo e(menu('main', 'partials.menus.main')); ?>

                <?php endif; ?> 
        </div>

        <div class="top-nav-right">
            <?php if(! (request()->is('checkout') || request()->is('guestCheckout'))): ?>
         
                <?php echo $__env->make('partials.menus.main-right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
        
    </div> <!-- end top-nav -->
</header>


 <?php /**PATH C:\xampp\htdocs\new\resources\views/partials/nav.blade.php ENDPATH**/ ?>