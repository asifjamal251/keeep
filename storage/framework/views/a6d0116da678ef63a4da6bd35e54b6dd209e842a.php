<?php $__env->startSection('title','Create Post'); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/vendors/css/forms/toggle/switchery.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/css/plugins/forms/switch.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/vendors/css/forms/selects/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/dropify/css/dropify.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/summernote/dist/summernote.css')); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/css/core/colors/palette-gradient.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Admin Create</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_slider')): ?>
                <a href="<?php echo e(route('admin.admin.index')); ?>" class="btn btn-primary btn-sm">Admin List</a>
            <?php endif; ?>
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <?php echo Form::open(['route'=>'admin.admin.store','autocomplete'=>'off']); ?>

                <div class="form-group">
                    <label for="name">Name</label>
                    <?php echo e(Form::text('name',null,['class'=>'form-control','placeholder'=>'Name'])); ?>

                    <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                </div>
                <div class="form-group">
                    <?php echo Form::label('role','Role', []); ?>

                    <?php echo Form::select('role', $roles, null, ['class'=>'form-control','placeholder'=>'Select role']); ?>

                    <p class="text-danger"><?php echo e($errors->first('role')); ?></p>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <?php echo e(Form::text('email',null,['class'=>'form-control', 'autocomplete'=>'off','placeholder'=>'Email'])); ?>

                    <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-info" >Add Admin</button>
                </div>
            <?php echo Form::close(); ?>


        </div>
             
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('admin-assets/summernote/dist/summernote.js')); ?>"></script>
<script src="<?php echo e(asset('admin-assets/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')); ?>"
  type="text/javascript"></script>
<script src="<?php echo e(asset('admin-assets/dropify/js/dropify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/dropify/dropify.js')); ?>"></script>
<script src="<?php echo e(asset('admin-assets/app-assets/vendors/js/forms/toggle/switchery.min.js')); ?>" type="text/javascript"></script>
 <script src="<?php echo e(asset('admin-assets/app-assets/js/scripts/forms/switch.js')); ?>" type="text/javascript"></script>

 <script src="<?php echo e(asset('admin-assets/app-assets/vendors/js/forms/select/select2.full.min.js')); ?>" type="text/javascript"></script>
 <script src="<?php echo e(asset('admin-assets/app-assets/js/scripts/forms/select/form-select2.js')); ?>" type="text/javascript"></script>

   <script src="<?php echo e(asset('admin-assets/app-assets/js/scripts/customizer.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">

    jQuery(document).ready(function() {



        $('.summernote').summernote({

height: 350, // set editor height

minHeight: null, // set minimum height of editor

maxHeight: null, // set maximum height of editor

focus: false, // set focus to editable area after initializing summernote

popover: { image: [], link: [], air: [] }

});



        $('.inline-editor').summernote({

            airMode: true

        });



    });
 </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/admin/create.blade.php ENDPATH**/ ?>