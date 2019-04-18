<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    <div class="head">
                        <h1>Sửa thông tin <?php echo e($user->name); ?></h1>
                    </div>
                    <div class="content">
                        <form method="post" action="<?php echo e(route('update.infor', $id)); ?>" role="form">
                            <?php echo e(method_field('put')); ?>

                            <?php echo e(csrf_field()); ?>

                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Tên người dùng</td>
                                    <td>
                                        <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control" placeholder="tên nhân viên">
                                        <?php if($errors->has('name') ): ?>
                                            <?php echo e($errors->first('name')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>
                                        <input type="text" name="address" value="<?php echo e($user->address); ?>" class="form-control" placeholder="địa chỉ">
                                        <?php if($errors->has('address') ): ?>
                                            <?php echo e($errors->first('address')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">Sửa thông tin</button></td>
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