<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trang chủ</div>

                <div class="card-body">
                    <?php if(session('alert')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('alert')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <h1>Tạo ví</h1>
                        <a href="<?php echo e(route('purse', Auth::id())); ?>" class="button">Trở về</a> <br/> <br/>
                        <form method="post" action="<?php echo e(route('purse', Auth::id())); ?>" role="form">
                            <?php echo e(csrf_field()); ?>

                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Tên ví <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="text" name="name" class="form-control" placeholder="tên ví">
                                        <?php if($errors->has('name')): ?>
                                            <span style="color: red">
                                            <?php echo e($errors->first('name')); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">Tạo ví</button></td>
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