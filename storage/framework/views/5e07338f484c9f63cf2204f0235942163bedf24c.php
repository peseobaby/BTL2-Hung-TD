<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                     <?php if(session('alert')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('alert')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <h1>Cập nhật mật khẩu tài khoản <?php echo e($user->name); ?></h1>
                        <form method="post" action="<?php echo e(route('change', $user->id)); ?>">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('post')); ?>

                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Mật khẩu cũ <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="password" name="oldpassword" class="form-control" placeholder="nhập mật khẩu cũ">
                                        <?php if($errors->has('oldpassword')): ?>
                                            <span style="color: red">
                                            <?php echo e($errors->first('oldpassword')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="password" name="password" class="form-control" placeholder="nhập mật khẩu">
                                        <?php if($errors->has('password')): ?>
                                            <span style="color: red">
                                            <?php echo e($errors->first('password')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nhập lại mật khẩu <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="password" name="password_confirmation" class="form-control" 
                                        placeholder="nhập mật khẩu">
                                        <?php if($errors->has('password_confirmation')): ?>
                                            <span style="color: red">
                                            <?php echo e($errors->first('password_confirmation')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">Đổi mật khẩu</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>