<?php $__env->startSection('title','List Projects'); ?>

<?php $__env->startPush('links'); ?>

<link rel="stylesheet" href="<?php echo e(asset('admin-assets/dropify/css/dropify.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Site Setting</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        
    </div>
</div>
</div>

<div class="row my-1">
    <div class="col-lg-6 col-6">

        <div class="card">
            <div class="card-content">
                <div class="card-body">

                    <?php echo Form::open(['method' => 'POST', 'route' => 'admin.site-setting.logo', 'class' => 'form-horizontal','files'=>true]); ?>

                    
                        <div class="form-group<?php echo e($errors->has('site_title') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('site_title', 'Site Title'); ?>

                            <?php echo Form::text('site_title', $logo->site_title, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Site Logo']); ?>

                            <small class="text-danger"><?php echo e($errors->first('site_title')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('site_description') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('site_description', 'Site site_Description'); ?>

                            <?php echo Form::text('site_description', $logo->site_description, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Site Description']); ?>

                            <small class="text-danger"><?php echo e($errors->first('site_description')); ?></small>
                        </div>

                        <div class="form-group <?php echo e($errors->has('logo') ? ' has-error' : ''); ?>">

                            <?php echo Form::label('logo', 'Site Logo'); ?>


                            <?php echo Form::file('logo', ['class'=>'dropify','data-default-file'=>asset(@$logo->logo)]); ?>


                            <?php echo Form::hidden('checkfile',@$logo->logo, ['id' => 'checkfile']); ?>


                            <small class="text-danger"><?php echo e($errors->first('logo')); ?></small>

                        </div> 




                        <div class="form-group <?php echo e($errors->has('favicon') ? ' has-error' : ''); ?>">

                            <?php echo Form::label('favicon', 'Site Favicon Icon'); ?>


                            <?php echo Form::file('favicon', ['class'=>'dropify','data-default-file'=>asset(@$logo->favicon)]); ?>


                            <?php echo Form::hidden('checkfile',@$logo->favicon, ['id' => 'checkfile']); ?>


                            <small class="text-danger"><?php echo e($errors->first('favicon')); ?></small>

                        </div> 


                        <div class="btn-group">
                            <?php echo Form::submit("Save", ['class' => 'btn btn-success']); ?>

                        </div>
                    
                    <?php echo Form::close(); ?>

                 
                   

                </div>
            </div>
        </div>
             
    </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<script src="<?php echo e(asset('admin-assets/dropify/js/dropify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/dropify/dropify.js')); ?>"></script>


<script type="text/javascript">

 </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sanix\ios\resources\views/admin/setting/site-setting.blade.php ENDPATH**/ ?>