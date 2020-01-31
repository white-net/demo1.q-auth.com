

<?php $ajaxCtl = app('App\Http\Controllers\AjaxController'); ?>

<?php $__env->startSection('title', $mailTitle ?? __('display.sendMail title') ); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="text-center" style="margin:5px;padding:10px;font-weight: bold;font-size:24px;"><?php echo e($mailTitle ?? ''); ?></div>
    <div class="col-md-8 offset-md-2">
      <form action="<?php echo e($url); ?>" method="POST">
        <div class="form-group">
          <label for="InputEmail"><?php echo e(__('display.sendMail mail label')); ?></label>
          <input type="email" class="form-control" id="InputEmail" name="Email" required="required" aria-describedby="emailHelp" placeholder="<?php echo e(__('display.sendMail mail holder')); ?>" value="<?php echo e($mailValue ?? ''); ?>">
          <small class="form-text text-muted">
            <span style="color:blue"> <?php echo e($mailMsg ?? ''); ?></span>
          </small>
          <small class="form-text text-muted">
            <span style="color:red;font-weight: bold;"> <?php echo $mailExist ?? ''; ?></span>
          </small>
        </div>
        <div class="form-group text-center" style="padding-top:15px">
          <button type="submit" id="btnSubmit" class="btn btn-primary"><?php echo e(__('display.sendMail button')); ?></button>
        </div>
        <?php echo e(csrf_field()); ?>

      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(url('/')); ?>/css/qauthdemo.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo1.q-auth.com/resources/views/user/sendMail.blade.php ENDPATH**/ ?>