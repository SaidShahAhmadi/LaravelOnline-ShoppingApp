<?php $__env->startSection('title', 'Checkout'); ?>

<?php $__env->startSection('extra-css'); ?>


<script src="https://js.stripe.com/v3/"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

        <?php if(count($errors)): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $error; ?></strong>  
                </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <h1 class="checkout-heading stylish-heading">Checkout</h1>
        <div class="checkout-section">
            <div>
            <form action="<?php echo e(route('checkout.store')); ?>" method="POST" id="payment-form">
                    <?php echo e(csrf_field()); ?>

                    <h2>Billing Details</h2>

                    <div class="form-group">
                        <label for="email">Email Address</label>

                        <?php if(auth()->user()): ?>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>" readonly>
                        <?php else: ?>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo e(old('address')); ?>" required>
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo e(old('city')); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" name="province" value="<?php echo e(old('province')); ?>" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="<?php echo e(old('postalcode')); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="spacer"></div>

                    <h2>Payment Details</h2>

                    <div class="form-group">
                        <label for="name_on_card">Name on Card</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                    </div>

                    <div class="form-group">
                        <label for="card-element">
                            Credit or debit card
                          </label>
                          <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                          </div>
                          <!-- Used to display form errors. -->
                          <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="spacer"></div>
                    <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>
                </form>
            </div>



            <div class="checkout-table-container">
                <h2>Your Order</h2>

                <div class="checkout-table">
                    
                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="<?php echo e(asset('storage/'.$item->model->image)); ?>" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item"><?php echo e($item->model->name); ?></div>
                                <div class="checkout-table-description"><?php echo e($item->model->details); ?></div>
                                
                                 <span class="checkout-table-price badge badge-dark"><?php echo e(asDollars(Cart::total())); ?></span>

                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <span class="checkout-table-quantity badge badge-pill badge-danger"><?php echo e($item->qty); ?></span>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Subtotal <br>
                        
                        <?php if( session()->has('coupon')): ?>
                            
                            Discount ( <?php echo e(session()->get('coupon') ['name']); ?> ) : 
                            <form action="<?php echo e(route('coupon.destroy')); ?>" method="POST" style="display:inline">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>

                                <button type="submit" class="cart-options badge badge-pill badge-danger" style="font-size:12px;">Remove</button>
                            </form>
                            <br>

                            <hr>
                            New Subtotal  <br>
                        <?php endif; ?>
                        Tax (20%)<br>
                        <span class="checkout-totals-total">Total</span>

                    </div>

                    <div class="checkout-totals-right">
                            <?php echo e(asDollars(Cart::subtotal())); ?> <br> 
                        
                        <?php if( session()->has('coupon')): ?>
                            <?php echo e(asDollars($discount)); ?> <br>
                            <hr>
                                <?php echo e(asDollars($newSubtotal)); ?>

                            <br>
                        <?php endif; ?>
                        <?php echo e(asDollars($newTax)); ?> <br>
                        <span class="checkout-totals-total"><?php echo e(asDollars($newTotal)); ?></span> 

                    </div>
                </div> <!-- end checkout-totals -->

                
                <?php if( ! session()->has('coupon')): ?>
                    <a href="#" class="have-code">Have a Code?</a>
                    <span class="checkout-table-description " style="color:gray;">Enter your coupon code to get discount</span>
                    <div class="have-code-container">
                        
                        <form action="<?php echo e(route('coupon.store')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="coupon_code" id="coupon_code">
                            <button type="submit" class="button button-plain">Apply</button>
                        </form>
                    </div> <!-- end have-code-container -->
                <?php endif; ?>

            </div>


        </div> <!-- end checkout-section -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>

    

    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('pk_test_naghw4hjKHcmsaFijVhdnGqO00OPT0OqsI');

            // Create an instance of Elements
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete-order').disabled = true;

              var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              }

              stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;

                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });

             function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);

              // Submit the form
              form.submit();
            }
        })();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/checkout.blade.php ENDPATH**/ ?>