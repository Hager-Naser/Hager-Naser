<?php $__env->startSection('title' , 'All Product'); ?>
<?php $__env->startSection('content'); ?>
<div class="col-12">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Name (EN)</th>
                <th>Name (AR)</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Creation Date</th>
                <th>Update Date</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?></td>
                <td><?php echo e($product->code); ?></td>
                <td><?php echo e($product->name_en); ?></td>
                <td><?php echo e($product->name_ar); ?></td>
                <td><?php echo e($product->price); ?> EGP</td>
                <td><?php echo e($product->quantity); ?></td>
                <td><?php echo e($product->status); ?></td>
                <td><?php echo e($product->created_at); ?></td>
                <td><?php echo e($product->updated_at); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\programs\xampp\htdocs\phpcourse\project\Project-laravel\resources\views/products/all.blade.php ENDPATH**/ ?>