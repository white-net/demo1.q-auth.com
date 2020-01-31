

<?php $ajaxCtl = app('App\Http\Controllers\AjaxController'); ?>

<?php $__env->startSection('title', __('display.profileEdit title')); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="col-md-8 offset-md-2">
    <?php if($procMsg): ?>
      <div class="text-center" style="height:60px;margin-top:10px;">
        <span style="font-weight: bold;"> <?php echo $procMsg ?? ''; ?></span>
      </div>
    <?php else: ?> 
      <div class="text-center" style="height:60px;margin-top:10px;">
        <span style="font-weight: bold;"> <?php echo $editNone ?? ''; ?></span>
      </div>

      <form action="<?php echo e(route('user.editProfile')); ?>" method="POST">
        <div class="form-group">
          <label for="InputName"> <?php echo e(__('display.profileEdit name label')); ?></label>
          <input type="text" class="form-control" name="userName" id="InputName" aria-describedby="nameHelp" placeholder="<?php echo e(__('display.profileEdit name holder')); ?>" value="<?php echo e($nameValue ?? ''); ?>">
        </div>
        <div class="form-group">
          <label for="InputEmail"><?php echo e(__('display.profileEdit mail label')); ?></label>
          <span style="color:red">*</span>
          <input type="email" class="form-control" id="InputEmail" name="Email" required="required" aria-describedby="emailHelp" placeholder="<?php echo e(__('display.profileEdit mail holder')); ?>" value="<?php echo e($mailValue ?? ''); ?>">
          <small class="form-text text-muted">
            <font color="red"> <?php echo $mailExist ?? ""; ?></font>
          </small>
        </div>
        <div class="form-group">
          <label for="InputEmail"><?php echo e(__('display.profileEdit newMail label')); ?></label>
          <input type="email" class="form-control" id="InputNewEmail" name="newEmail" aria-describedby="emailHelp" placeholder="<?php echo e(__('display.profileEdit newMail holder')); ?>" value="<?php echo e($newMailValue ?? ''); ?>">
        </div>
        <div class="form-group">
          <label for="InputEmail"><?php echo e(__('display.profileEdit newMail1 label')); ?></label>
          <input type="email" class="form-control" id="InputNewEmail1" name="newEmail1" aria-describedby="emailHelp" placeholder="<?php echo e(__('display.profileEdit newMail1 holder')); ?>" value="<?php echo e($newMailValue1 ?? ''); ?>">
          <small class="form-text text-muted">
            <font color="red"> <?php echo $mailSameCheck ?? ""; ?></font>
          </small>
        </div>

        <div class="form-group text-center" style="padding-top:15px">
          <button type="submit" id="btnSubmit" class="btn btn-primary"><?php echo e(__('display.profileEdit button')); ?></button>
        </div>
        <?php echo e(csrf_field()); ?>

      </form>
      <?php endif; ?>
    </div>


  </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(url('/')); ?>/css/qauthdemo.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo1.q-auth.com/resources/views/user/editProfile.blade.php ENDPATH**/ ?>