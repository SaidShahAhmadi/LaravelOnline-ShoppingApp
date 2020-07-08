<ul>
    <?php if(auth()->guard()->guest()): ?>
            <li><a href="<?php echo e(route('register')); ?>">Sing Up</a></li>
            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
            <?php else: ?>
            
            <li>
                <a class="" href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <?php echo e(__('Logout')); ?>

                </a>
            </li>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
            </form>
    <?php endif; ?>


<li><a href="<?php echo e(route('cart.index')); ?>">Cart
    <span class="cart-count">
        <?php if(Cart::instance('default')->count() > 0): ?>
        <span><?php echo e(Cart::instance('default')->count()); ?></span></span>
        <?php endif; ?>
    </a>
</li>

</ul>
















        <?php /**PATH C:\xampp\htdocs\new\resources\views/partials/menus/main-right.blade.php ENDPATH**/ ?>