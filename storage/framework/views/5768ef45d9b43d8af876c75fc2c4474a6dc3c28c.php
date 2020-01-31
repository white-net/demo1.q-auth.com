

<?php $__env->startSection('title', __('display.Log in')); ?>

<?php $__env->startSection('content'); ?>
  <div class="row">
  <div class="col-md-6 col-md-offset-3">
  <h3><?php echo e(__('display.Sign In')); ?></h3>
  <?php if(count($errors) >0): ?>
  <div class="alert alert-danger">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <p><?php echo e($error); ?></p>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php endif; ?>
  <form action="<?php echo e(route('user.signin')); ?>" method="post">
  <div class="form-group">
  <label for="email"><?php echo e(__('display.E-Mail')); ?></label>
  <input type="text" id="email" name="email" class="form-control">
  </div>
  <div class="form-group">
  <label for="password"><?php echo e(__('display.Password')); ?></label>
  <input type="password" id="password" name="password" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary"><?php echo e(__('display.Log in')); ?></button>
  <?php echo e(csrf_field()); ?>

  </form>
  </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo1.q-auth.com/resources/views/user/signin.blade.php ENDPATH**/ ?>