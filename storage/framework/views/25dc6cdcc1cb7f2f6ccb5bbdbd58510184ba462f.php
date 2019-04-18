<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý danh mục</div>
                <div class="card-body">
                    <?php if(session('alert')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('alert')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <h1>Lịch sử giao dịch</h1>
                        <a href="<?php echo e(route('purse.trade', $purse->id)); ?>" class ="button" >Thêm giao dịch</a><br/><br/>
                        <table id="tradetable" width="100%" class="display">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Danh mục</td>
                                    <td>Từ tài khoản</td>
                                    <td>Đến tài khoản</td>
                                    <td>Số tiền</td>
                                    <td>Thời gian</td>
                                    <td>Options</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($trade->id); ?></td>
                                        <td><?php echo e($trade->category->name); ?></td>
                                        <td><?php echo e($trade->from); ?></td>
                                        <td><?php echo e($trade->to); ?></td>
                                        <td><?php echo e($trade->money); ?></td>
                                        <td><?php echo e($trade->updated_at); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('trade.destroy', $trade->id)); ?>" method="post" 
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('delete')); ?>

                                                <button type="submit" class="delete">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </tbody>                                  
                        </table>
                        <button><a href="<?php echo e(route('export.expense', $purse->id)); ?>">Xuất danh sách thu theo tháng</a>
                        </button>
                        <button><a href="<?php echo e(route('export.receipt', $purse->id)); ?>">Xuất danh sách chi theo tháng</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#tradetable').DataTable();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>