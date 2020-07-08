<ul>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e($menu_item->link()); ?>">
                <?php echo e($menu_item->title); ?>

                <?php if($menu_item->title === 'Cart'): ?>
                <span class="cart-count">
                    <?php if(Cart::instance('default')->count() > 0): ?>
                        <span><?php echo e(Cart::instance('default')->count()); ?></span></span>
                    <?php endif; ?>
                <?php endif; ?>
            </a>
        </li>   
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
    
    
    
    <?php /**PATH C:\xampp\htdocs\new\resources\views/partials/menus/main.blade.php ENDPATH**/ ?>