<script>
        $(document).ready(function(){

             // Toastr Notification Demo
             <?php if(Session::has('success_message')): ?>
                    toastr.success("<?php echo e(Session::get('success_message')); ?>");   
             <?php endif; ?>

            <?php if(Session::has('delete_message')): ?>
                    toastr.error("<?php echo e(Session::get('delete_message')); ?>");
            <?php endif; ?>

            // // the error meassage will hide in 2 second
            //   $(".alert-danger").delay(2000).slideUp(200);
            // // the success meassage will hide in 2 second
            //   $(".alert-success").delay(2000).slideUp(200);

        });
  </script>





<?php /**PATH C:\xampp\htdocs\projects\n\resources\views/partials/error.blade.php ENDPATH**/ ?>