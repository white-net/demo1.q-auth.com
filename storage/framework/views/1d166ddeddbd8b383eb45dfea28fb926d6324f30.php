

<?php $__env->startSection('title', __('display.stop proc title') ); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="text-center" style="margin:5px;padding:10px;font-weight: bold;font-size:24px;"><?php echo e(__('display.stop proc title')); ?></div>
    <div class="col-md-8 offset-md-2">
    <?php if($procMsg): ?>
      <div class="text-center" style="height:60px;margin-top:10px;">
        <span style="font-weight: bold;">  <?php echo $procMsg ?? ''; ?></span>
      </div>
    <?php else: ?> 
      <form action="<?php echo e(route('user.stopproc')); ?>" name="conformStop" method="POST">
        <div class="form-group">
          <div><label for="InputEmail"><?php echo e(__('display.stop proc Label')); ?></label></div>
          <div>&nbsp; </div>
          <label class="checkbox-inline">
            <input type="checkbox" required="required" value="conform"> <?php echo e(__('display.stop proc checkbox')); ?>

          </label>
          <input type="hidden" name="reqToken" value="<?php echo e($token ?? ''); ?>">
        </div>
        <div class="form-group text-center" style="padding-top:15px">
          <button type="submit" id="btnSubmit" class="btn btn-primary"><?php echo e(__('display.stop proc button')); ?></button>
        </div>
        <?php echo e(csrf_field()); ?>

      </form>
    <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(url('/')); ?>/css/qauthdemo.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo1.q-auth.com/resources/views/user/stopProc.blade.php ENDPATH**/ ?>