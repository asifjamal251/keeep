<?php $__env->startSection('title','Create Bread'); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Bread List</h3>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            
        <a class="btn btn-primary btn-sm text-right" href="<?php echo e(adminRoute('create')); ?>">Add Bread</a>
        
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <?php echo Form::open(['route'=>'admin.bread.store']); ?>

                        <div class="form-group">
                            <label for="">Name</label>
                            <?php echo Form::text('name', '' , ['class'=>'form-control']); ?>

                             <b class="text-danger"><?php echo e($errors->first('name')); ?></b>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success pull-right">Create</button>
                            <a style=" margin-right: 14px;padding: 7px;width: 71px;background: #dcd7d7;" class="btn btn-default pull-right" id="back">Back</a>
                        </div>
                    <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
             
    </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\react\resources\views/admin/bread/create.blade.php ENDPATH**/ ?>