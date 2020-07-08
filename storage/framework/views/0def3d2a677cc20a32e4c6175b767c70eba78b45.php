<?php $__env->startSection('title', 'Thank You'); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-class', 'sticky-footer'); ?>

<?php $__env->startSection('content'); ?>

   <div class="thank-you-section">
       <h1>Thank you for <br> Your Order!</h1>
       <p>A confirmation email was sent</p>
       <div class="spacer"></div>
       <div>
           <a href="<?php echo e(url('/')); ?>" class="button">Home Page</a>
       </div>
   </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\n\resources\views/thankyou.blade.php ENDPATH**/ ?>