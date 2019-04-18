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
                    <div class="head">
                        <h1>Chuyển tiền từ ví <?php echo e($purse->name); ?></h1>
                    </div>
                    <div class="content">
                        <form method="post" action="<?php echo e(route('purse.send', $purse->id)); ?>" role="form">
                            <?php echo e(csrf_field()); ?>

                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Số tiền hiện có</td>
                                    <td><?php echo e($purse->money); ?></td>
                                </tr>
                                <tr>
                                    <td>Ví cần chuyển</td>
                                    <td>
                                        <input type="number" name="id" class="form-control" placeholder="Tài khoản cần chuyển">
                                        <?php if($errors->has('id') ): ?>
                                            <?php echo e($errors->first('id')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số tiền cần chuyển</td>
                                    <td>
                                        <input type="number" name="money"  class="form-control" placeholder="Số tiền cần chuyển">
                                        <?php if($errors->has('money') ): ?>
                                            <?php echo e($errors->first('money')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu cá nhân</td>
                                    <td>
                                        <input type="text" name="password"  class="form-control" placeholder="mật khẩu">
                                        <?php if($errors->has('password') ): ?>
                                            <?php echo e($errors->first('password')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Xác thực mật khẩu cá nhân</td>
                                    <td>
                                        <input type="text" name="password_confirmation"  class="form-control" placeholder="xác thực mật khẩu">
                                        <?php if($errors->has('password_confirmation') ): ?>
                                            <?php echo e($errors->first('password_confirmation')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">Giao dịch</button></td>
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