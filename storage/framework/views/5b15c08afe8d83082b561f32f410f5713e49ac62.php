

<?php $ajaxCtl = app('App\Http\Controllers\AjaxController'); ?>

<?php $__env->startSection('title', __('display.change title') ); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="text-center" style="margin:5px;padding:10px;font-weight: bold;font-size:24px;"><?php echo e(__('display.change title')); ?></div>
    <div class="col-md-8 offset-md-2">
      <?php if($procMsg): ?>
      <div class="text-center" style="height:60px;margin-top:10px;">
        <span style="font-weight: bold;"> <?php echo $procMsg ?? ''; ?></span>
      </div>
      <?php else: ?>
      <form action="<?php echo e(route('user.changeDev')); ?>" name="conformChangeDev" method="POST">
        <div class="form-group">
          <label for="InputEmail"><?php echo e(__('display.change mail label')); ?></label>
          <input type="email" class="form-control" id="InputEmail" name="Email" required="required" aria-describedby="emailHelp" placeholder="<?php echo e(__('display.change mail holder')); ?>" value="<?php echo e($mailValue ?? ''); ?>">
          <small class="form-text text-muted">
            <font color="red"> <?php echo e($mailExist ?? ""); ?></font>
          </small>

        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-8">
              <label for="InputDevID"><?php echo e(__('display.change mobileChk label1')); ?></label>
              <input type="text" class="form-control" id="InputDevID" required="required" aria-describedby="devIDHelp" placeholder="未確認" disabled>
              <small id="devIDHelp" class="form-text text-muted"><?php echo __('display.change mobileChk label2'); ?></small>
              <small class="form-text text-muted"> <?php echo $ajaxCtl->SmartPhoneLabel(); ?></small>
            </div>
            <div class="col-md-4">
              <!-- QR認証のQRコード表示部分 スタート-->
              <div style="text-align: center;">
                <?php echo $ajaxCtl->SmartPhoneLink(); ?>

              </div>
              <div id="result" style="text-align: center;margin:20px;">
              </div>
              <!-- QR認証のQRコード表示部分 エンド-->
            </div>
          </div>
        </div>
        <div class="form-group text-center" style="padding-top:15px">
          <button type="submit" id="btnSubmit" class="btn btn-primary"><?php echo e(__('display.change button')); ?></button>
        </div>
        <?php echo e(csrf_field()); ?>

      </form>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <?php if(!$procMsg): ?>
  <script src="<?php echo e(url('/')); ?>/js/jquery.qrcode.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/js/changeUser.js"></script>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(url('/')); ?>/css/qauthdemo.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo1.q-auth.com/resources/views/user/changeDev.blade.php ENDPATH**/ ?>