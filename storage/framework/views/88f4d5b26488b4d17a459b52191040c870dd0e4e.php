<header>
    <div class="top-nav container">
        <div class="logo"><a href="/">Laravel Ecommerce</a></div>
        <?php if(! request()->is('checkout')): ?>
        <ul>
            <li><a href="<?php echo e(route('shop.index')); ?>">Shop</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
            <li>
                <a href="<?php echo e(route('cart.index')); ?>">Cart <span class="cart-count">
                    
                </a>
            </li>
        </ul>
        <?php endif; ?>  
    </div> <!-- end top-nav -->
</header>
<?php /**PATH C:\xampp\htdocs\projects\n\resources\views/partials/nav.blade.php ENDPATH**/ ?>