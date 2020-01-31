

<?php $ajaxCtl = app('App\Http\Controllers\AjaxController'); ?>

<?php $__env->startSection('title', __('display.Sign Up')); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
    <div class="col-md-8 offset-md-2">
      <form action="<?php echo e(route('user.regUser')); ?>" method="POST">
        <div class="form-group">
          <label for="InputName"> <?php echo e(__('display.reg name label')); ?></label>
          <input type="text" class="form-control" name="userName" id="InputName" required="required" aria-describedby="nameHelp" placeholder="<?php echo e(__('display.reg name holder')); ?>" value="<?php echo e($nameValue ?? ''); ?>">
        </div>
        <div class="form-group">
          <label for="InputEmail"><?php echo e(__('display.reg mail label')); ?></label>
          <input type="email" class="form-control" id="InputEmail" name="Email" required="required" aria-describedby="emailHelp" placeholder="<?php echo e(__('display.reg mail holder')); ?>" value="<?php echo e($mailValue ?? ''); ?>">
          <small class="form-text text-muted">
            <font color="red"> <?php echo e($mailExist ?? ""); ?></font>
          </small>

        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-8">
              <label for="InputDevID"><?php echo e(__('display.reg mobileChk label1')); ?></label>
              <input type="text" class="form-control" id="InputDevID" required="required" aria-describedby="devIDHelp" placeholder="<?php echo e(__('display.reg mobileChk holderNO')); ?>" disabled>
              <small id="devIDHelp" class="form-text text-muted"><?php echo __('display.reg mobileChk label2'); ?></small>
              <small class="form-text text-muted"> <?php echo $ajaxCtl->SmartPhoneLabel(); ?></small>
            </div>
            <div class="col-md-4">
              <!-- QR認証のQRコード表示部分 スタート-->
              <div style="text-align: center;">
                <?php echo $ajaxCtl->SmartPhoneLink(); ?>

              </div>
              <!-- QR認証のQRコード表示部分 エンド-->
            </div>
          </div>
        </div>

        <div style="text-align: center;margin:20px;">
          <a href="https://itunes.apple.com/jp/genre/ios-仕事効率化/id6007?mt=8" target="_blank">
            <img src="/img/app_btn_s2.jpg" style="position: absolute; opacity: 0;">
            <img src="/img/app_btn.jpg" width="150" alt="Download on the App Store">
          </a>
          <!-- <img src="/img/app_qr.jpg" width="75" height="75" alt="" class="pr64"> -->
          <a href="https://play.google.com/store/apps" target="_blank">
            <img src="/img/g_btn_s2.jpg" style="position: absolute; opacity: 0;">
            <img src="/img/g_btn.jpg" width="150" alt="GET IN ON Google Play">
          </a>
          <!-- <img src="./img/g_qr.jpg" width="75" height="75" alt=""> -->
        </div>
    </div>


    <div class="form-group text-center" style="padding-top:15px">
      <button type="submit" id="btnSubmit" class="btn btn-primary"><?php echo e(__('display.reg button')); ?></button>
    </div>
    <input type="hidden" class="form-control" name="thisfname" value="<?php echo explode('?', $_SERVER["REQUEST_URI"])[0] ?>">
    <?php echo e(csrf_field()); ?>

    </form>
  </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url('/')); ?>/js/jquery.qrcode.min.js"></script>
<script src="<?php echo e(url('/')); ?>/js/regUser.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(url('/')); ?>/css/qauthdemo.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo1.q-auth.com/resources/views/user/regUser.blade.php ENDPATH**/ ?>