<?php $__env->startSection('title','Transaction'); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Transaction</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
           
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Transaction Details</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <table id="dataTableAjax" class="display table" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo e('trx'.$transaction->id); ?>

                                </td>
                                <td>
                                    <?php echo e($transaction->user->name); ?>

                                </td>
                                <td>
                                    <?php echo e($transaction->user->email); ?>

                                </td>
                                <td>
                                    <?php echo e($transaction->transactionType->name); ?>

                                </td>
                                <td>
                                    <?php echo e($transaction->amount); ?>

                                </td>
                                <td>
                                    <?php echo e($transaction->status); ?>

                                </td>
                                <td>
                                    <?php echo e($transaction->created_at->format('d F Y | h:s A')); ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
             
    </div>
</div>



<?php if($transaction->orderItems->count() > 0): ?>


<?php
    $shipping = App\Model\UserAddress::find($transaction->order->shipping_id);
?>






<div class="card">

    <div class="card-header">
        <h4 class="card-title">Order Details</h4>
    </div>


    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">


                    <table id="dataTableAjax" class="display table" >
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>
                                    <?php echo e($transaction->order->id); ?>

                                </td>

                                <td>
                                    $<?php echo e($transaction->order->shipping_charge); ?>

                                </td>

                                <td>
                                    $<?php echo e($transaction->order->discount); ?>

                                </td>

                                <td>
                                    $<?php echo e($transaction->order->shipping_charge); ?>

                                </td>

                                <td>
                                    <?php echo e($transaction->status); ?>

                                </td>

                                <td>
                                    <?php echo e($transaction->order->created_at->format('d F Y | h:s A')); ?>

                                </td>
                                
                            </tr>

                        </tbody>
                    </table>



                </div>
            </div>


            <div class="table-responsive">
            <table class="table table-column">
                <thead>
                    <tr>
                        <th>Billing Details</th>
                        <th>Shipping Details</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Name: <?php echo e($shipping->name); ?></td>
                        <td>Name: <?php echo e($shipping->name); ?></td>
                    </tr>
                    <tr>
                        <td>Email: <?php echo e($shipping->email); ?></td>
                        <td>Email: <?php echo e($shipping->email); ?></td>
                    </tr>

                    <tr>
                        <td>Mobile: <?php echo e($shipping->mobile); ?></td>
                        <td>Mobile: <?php echo e($shipping->mobile); ?></td>
                    </tr>

                    <tr>
                        <td>Address: <?php echo e($shipping->address); ?></td>
                        <td>Address: <?php echo e($shipping->address); ?></td>
                    </tr>
                    <tr>
                        <td>State: <?php echo e($shipping->state); ?></td>
                        <td>State: <?php echo e($shipping->state); ?></td>
                    </tr>
                    <tr>
                        <td>City: <?php echo e($shipping->city); ?></td>
                        <td>City: <?php echo e($shipping->city); ?></td>
                    </tr>

                </tbody>
            </table>
        </div>


        </div>
    </div>
</div>


<div class="card">

    <div class="card-header">
        <h4 class="card-title">Order Item Details</h4>
    </div>


    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">


                    <table id="dataTableAjax" class="display table" >
                        <thead>
                            <tr>
                                <th>Si</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Shipping Charge</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $transaction->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($loop->index+1); ?>

                                </td>

                                <td>
                                    <img width="80" src="<?php echo e(asset($item->image)); ?>">
                                </td>

                                <td>
                                    <?php echo e($item->qty); ?>

                                </td>

                                <td>
                                    $<?php echo e($item->shipping_charge); ?>

                                </td>

                                <td>
                                    <?php echo e($item->created_at->format('d F Y | h:s A')); ?>

                                </td>
                                
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<?php if($transaction->keep != '' or $transaction->keep != null): ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <img src="<?php echo e(asset($transaction->keep->image)); ?>">

                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<?php if($transaction->transaction_type_id == 2): ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    fgfgdfg

                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>





<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>





<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/transaction/view.blade.php ENDPATH**/ ?>