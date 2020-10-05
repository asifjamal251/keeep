<?php $__env->startSection('title','Keep'); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/dropify/css/dropify.min.css')); ?>">
<style type="text/css">
    button.dropify-clear {
        display: none!important;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Edit User Image</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">


           
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">

          <div class="card-body">
            <span class="card-title pull-left" style="text-transform: capitalize;"><b>Name:</b> <?php echo e($backlog->user->name); ?></span>
            <span class="card-title pull-right" style="text-transform: lowercase;"><b style="text-transform: capitalize;">Email:</b><?php echo e($backlog->user->email); ?></span>

             
        </div>
    </div>
</div>

          <?php echo Form::open(['route'=>['admin.backlog.update',@$backlog->id],'method'=>'put','files'=>true]); ?>


            <div class="row my-1">
                <div class="col-lg-6 col-6">

                    <div class="card text-white bg-danger">
                        <div class="card-content">

                            <div class="card-header" id="heading-links">
                              <h4 class="card-title">Unprocess Image</h4>
                            </div>


                         <div class="card-body">


                        <div class="form-group <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">

                                <?php echo Form::file('image', ['id'=>'backlog_img','class'=>'dropify','data-default-file'=>@$backlog->image]); ?>


                                <small class="text-danger"><?php echo e($errors->first('image')); ?></small>

                        </div>

                       
                       
                        <a id="dd" href="<?php echo e(asset(@$keep->image)); ?>" class="btn btn-danger btn-darken-3" download>Download Image</a>

                        </div>

                        </div>
                        </div>
                         </div>



                         <div class="col-lg-6 col-6">

                            <div class="card text-white bg-primary">
                        <div class="card-content">

                            <div class="card-header" id="heading-links">
                              <h4 class="card-title">Processed Image</h4>
                            </div>

                         <div class="card-body">


                         <div class="form-group <?php echo e($errors->has('image_keey') ? ' has-error' : ''); ?>">

                                <?php echo Form::file('image_keep', ['id'=>'keep_img','class'=>'dropify','data-default-file'=>asset(@$keep->image)]); ?>


                                <small class="text-danger"><?php echo e($errors->first('image_keey')); ?></small>

                        </div>

                        <?php echo Form::hidden('backlog_id', $backlog->id); ?>

                        <?php echo Form::hidden('user_id', $backlog->user_id); ?>


                         <div class="btn-group">
                                <?php echo Form::submit("Update Image", ['class' => 'btn btn-primary btn-darken-3']); ?>

                        </div>




</div>
</div>
</div>
                    
                </div>
            </div>
            <?php echo Form::close(); ?>


        </div>
             
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('admin-assets/dropify/js/dropify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/dropify/dropify.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sanix\app\resources\views/admin/user/backlog/edit.blade.php ENDPATH**/ ?>