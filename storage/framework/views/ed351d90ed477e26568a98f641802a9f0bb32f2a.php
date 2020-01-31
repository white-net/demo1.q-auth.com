<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/img/favicon.ico">
  <link href="<?php echo e(url('/')); ?>/css/bootstrap.min.css" rel="stylesheet"><!-- Loading Bootstrap -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">

  <?php echo $__env->yieldContent('styles'); ?>
</head>

<body>
  <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="container">
    <?php echo $__env->yieldContent('content'); ?>
  </div>

  <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!--
  Bootstrap core JavaScript
  ==================================================
  -->

  <script src="<?php echo e(url('/')); ?>/js/jquery-3.4.1.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/js/bootstrap.min.js"></script>

  <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html><?php /**PATH /var/www/demo1.q-auth.com/resources/views/layouts/master_auth.blade.php ENDPATH**/ ?>