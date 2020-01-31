<?php $UserCtl = app('App\Http\Controllers\UserController'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"><?php echo e(__('display.Title')); ?></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-01">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="nav navbar-nav">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-alt"></i><?php echo e(__('display.Account')); ?>

          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if($UserCtl->chkAuth()): ?>
            <a class="dropdown-item" href="<?php echo e(url('/').'/user/editProfile'); ?>"><i class="fas fa-user-edit" aria-hidden="true"></i> <?php echo e(__('display.Account Modify')); ?></a>
            <a class="dropdown-item" href="<?php echo e(url('/').'/user/changeDev'); ?>"><i class="fas fa-exchange-alt" aria-hidden="true"></i> <?php echo e(__('display.Change')); ?></a>
            <?php else: ?>
            <a class="dropdown-item" href="<?php echo e(route('user.regUser')); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo e(__('display.Sign Up')); ?></a>
            <a class="dropdown-item" href="<?php echo e(url('/').'/user/stopauthmail'); ?>"><i class="fas fa-user-slash" aria-hidden="true"></i> <?php echo e(__('display.Stop')); ?></a>
            <a class="dropdown-item" href="<?php echo e(url('/').'/user/restartauthmail'); ?>"><i class="far fa-user" aria-hidden="true"></i> <?php echo e(__('display.Restart')); ?></a>
            <?php endif; ?>
          </div>
        </li>
        <?php if($UserCtl->chkAuth()): ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('user.logout')); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i><?php echo e(__('display.Log Out')); ?></a></li>
        <?php else: ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('user.login')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> <?php echo e(__('display.Log In')); ?></a></li>
        <?php endif; ?>
      </ul>
    </div>

  </div>
</nav><?php /**PATH /var/www/demo1.q-auth.com/resources/views/partials/header.blade.php ENDPATH**/ ?>