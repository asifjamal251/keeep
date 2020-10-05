<?php $__env->startSection('title','List Order'); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Order No.: </h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <div class="form-group">
                <select id="status" class="form-control" onchange="status(this)" name="status"><option selected="selected" value="">Select Status</option><option value="1">Processed</option><option value="0">Unprocess</option><option value="2">Assign</option></select>
                <small class="text-danger"></small>
            </div>
       </div>
    </div>
        
</div>



</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <table id="dataTableAjax" class="display dataTableAjax table table-striped table-bordered dom-jQuery-events" >
                        <thead>
                            <tr>
                                <th>Si</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Shipping Charge</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index+1); ?></td>
                                <td><img src="<?php echo e(asset($item->image)); ?>" width="50"></td>
                                <td><?php echo e($item->qty); ?></td>
                                <td><?php echo e($item->shipping_charge); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        
                    </table>

                </div>





            </div>
        </div>
             
    </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/order/view.blade.php ENDPATH**/ ?>