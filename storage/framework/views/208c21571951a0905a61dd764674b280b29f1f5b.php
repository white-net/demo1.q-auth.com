

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-10 offset-md-1" style="background:#F2F2F2;padding-top:25px;padding-bottom:20px">
        <h3 style="color:darkcyan"><?php echo e(__('display.profile title')); ?></h3>

        <div style="margin-top: 30px;">
            <table class="table">
                <tr>
                    <th><?php echo e(__('display.profile name label')); ?></th>
                    <td><?php echo e($name); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('display.profile mail label')); ?></th>
                    <td><?php echo e($email); ?></td>
                </tr>
            </table>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(url('/')); ?>/css/qauthdemo.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/demo1.q-auth.com/resources/views/user/profile.blade.php ENDPATH**/ ?>