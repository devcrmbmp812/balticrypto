<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BaltiCrypto ICO">
    <meta name="keywords" content="BaltiCrypto ICO">
    <meta name="author" content="BaltiCrypto ICO">
   <!--  <link rel="icon" href="<?php echo e(url('assets/images/fav.png')); ?>" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo e(url('assets/images/fav.png')); ?>" type="image/x-icon"/> -->
    <link rel="icon" href="<?php echo e(asset('assets/images/fav.png')); ?>" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/fav.png')); ?>" type="image/x-icon"/>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </head>
  <body>
    <!-- Loader Start-->
   <!--  <div class="spinner-wrapper">
      <div class="spin-bg">
        <img src="assets/images/logo-2.png" />
      </div>
    </div> -->
    <!-- Loader Ends-->
    <?php echo $__env->make('layouts.headerHome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layouts.footerHome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('layouts.footerScript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0074/2778.js" async="async"></script>
  </body>
</html>