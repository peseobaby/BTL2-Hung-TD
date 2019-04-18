<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    <div class="head">
                        <h1>Sửa thông tin ví <?php echo e($purse->name); ?></h1>
                    </div>
                    <div class="content">
                        <form method="post" action="<?php echo e(route('purse.update', $purse->id)); ?>" role="form">
                            <?php echo e(method_field('put')); ?>

                            <?php echo e(csrf_field()); ?>

                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Tên ví</td>
                                    <td>
                                        <input type="text" name="name" value="<?php echo e($purse->name); ?>" class="form-control" placeholder="tên nhân viên">
                                        <?php if($errors->has('name') ): ?>
                                            <?php echo e($errors->first('name')); ?>

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