<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Laravel Ecommerce Example</title>
    
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('/js/jquery.js')); ?>" ></script>
    <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('toastr/toastr.min.js')); ?>"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('toastr/toastr.min.css')); ?>" rel="stylesheet">
    
</head>
<body>
    <header class="with-background">
        <div class="top-nav container">

            <div class="top-nav-left">
                <div class="logo">Ecommerce</div>
                
                   <?php echo e(menu('main', 'partials.menus.main')); ?>

            </div>


            <div class="top-nav-right">
                <?php echo $__env->make('partials.menus.main-right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            
           
            

        </div> <!-- end top-nav -->
        <div class="hero container">
            <div class="hero-copy">
                <h1>Laravel Ecommerce Demo</h1>
                <p>Includes multiple products, categories, a shopping cart and a checkout system with Stripe integration.</p>
                <div class="hero-buttons">
                    <a href="#" class="button button-white">Blog Post</a>
                    <a href="#" class="button button-white">GitHub</a>
                </div>
            </div> <!-- end hero-copy -->
            
            <div class="hero-image">
                <img src="img/eCommerce-website-cyprus-pws.jpg" alt="hero image">
            </div> <!-- end hero-image -->
        </div> <!-- end hero -->
    </header>
    
    <div class="featured-section">
        
        <div class="container">
            <h1 class="text-center">Laravel Ecommerce</h1>
            
            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic.</p>
            
            <div class="text-center button-container">
                <a href="#" class="button">Featured</a>
                <a href="#" class="button">On Sale</a>
            </div>
            
            
            
            <div class="products text-center">
                
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product">
                    <a href="<?php echo e(route('shop.show', $product->slug)); ?>"><img src="<?php echo e(asset('storage/'.$product->image)); ?>" alt="product"></a>
                    <a href="<?php echo e(route('shop.show', $product->slug)); ?>"><div class="product-name"><?php echo e($product->name); ?></div></a>
                    <div class="product-price"><?php echo e(asDollars($product->price)); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                
            </div> <!-- end products -->
            
            <div class="text-center button-container">
                <a href="<?php echo e(route('shop.index')); ?>" class="button">View more products</a>
            </div>
            
        </div> <!-- end container -->
        
    </div> <!-- end featured-section -->
    
    <div class="blog-section">
        <div class="container">
            <h1 class="text-center">From Our Blog</h1>
            
            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic.</p>
            
            <div class="blog-posts">
                <div class="blog-post" id="blog1">
                    <a href="#"><img src="/img/blog1.png" alt="Blog Image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 1</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                </div>
                <div class="blog-post" id="blog2">
                    <a href="#"><img src="/img/blog2.png" alt="Blog Image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 2</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                </div>
                <div class="blog-post" id="blog3">
                    <a href="#"><img src="/img/blog3.png" alt="Blog Image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 3</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                </div>
            </div>
        </div> <!-- end container -->
    </div> <!-- end blog-section -->
    
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    
</body>
</html>
<?php /**PATH C:\xampp\htdocs\new\resources\views/landing-page.blade.php ENDPATH**/ ?>