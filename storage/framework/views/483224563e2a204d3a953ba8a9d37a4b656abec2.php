

<?php $__env->startSection('title', $mailTitle ?? __('display.sendMail title') ); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="col-md-8 offset-md-2" style="text-align:center;font-weight: bold;">
       <?php echo $mailSendCompleteMsg ?? ''; ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(url('/')); ?>/css/qauthdemo.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo1.q-auth.com/resources/views/user/sendMailComplete.blade.php ENDPATH**/ ?>