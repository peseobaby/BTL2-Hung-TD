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
                        <?php if(isset($purse)): ?>
                            <h1>Thông tin ví của <?php echo e($purse->user->name); ?></h1>
                                <table width="100%" cellspacing="0" cellpadding="10">
                                    <tr>
                                        <td>ID</td>
                                        <td><?php echo e($purse->id); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo e($purse->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Số tiền</td>
                                        <td><?php echo e($purse->money); ?></td>
                                    </tr>    
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('purse.edit',$purse->id)); ?>"><button class="edit">Sửa</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(asset('')); ?>deletepurse/<?php echo e($purse->id); ?>" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('delete')); ?>

                                                <button type="submit" class="delete">Xóa</button>
                                            </form>
                                        </td>
                                         <td>
                                            <a href="<?php echo e(route('purse.trade',$purse->id)); ?>"><button class="edit">Chuyển khoản</button></a>
                                        </td>
                                    </tr>
                            </table>
                        <?php else: ?>
                            <table width="100%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Bạn chưa có ví , hãy tạo ví : </td>
                                    <td>
                                        <a href="<?php echo e(route('purse.create')); ?>"><button class="create">Tạo ví</button></a>
                                    </td>
                                </tr>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>