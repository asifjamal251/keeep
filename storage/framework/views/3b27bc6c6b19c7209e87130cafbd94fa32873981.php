<?php $__env->startSection('title','Create Post'); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/vendors/css/forms/toggle/switchery.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/css/plugins/forms/switch.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/dropify/css/dropify.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/summernote/dist/summernote.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Post Create</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_slider')): ?>
                <a href="<?php echo e(route('admin.post.create')); ?>" class="btn btn-primary btn-sm">Add Post</a>
            <?php endif; ?>
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
          <?php echo Form::open(['method' => 'POST', 'route' => 'admin.post.store', 'class' => 'form-horizontal','files'=>true]); ?>


            <div class="row my-1">
                <div class="col-lg-7 col-7">

                        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('title', 'Post Title'); ?>

                            <?php echo Form::text('title', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Post Title']); ?>

                            <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('subtitle') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('subtitle', 'Subtitle'); ?>

                            <?php echo Form::text('subtitle', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Post Subtitle']); ?>

                            <small class="text-danger"><?php echo e($errors->first('subtitle')); ?></small>
                        </div>


                        <div class="form-group<?php echo e($errors->has('body') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('body', 'Content'); ?>

                            <?php echo Form::textarea('body', null, ['class' => 'form-control summernote', 'required' => 'required']); ?>

                            <small class="text-danger"><?php echo e($errors->first('body')); ?></small>
                        </div>
                    
                        <div class="btn-group">
                            <?php echo Form::submit("Add Post", ['class' => 'btn btn-info']); ?>

                        </div>

                </div>

                <div class="col-lg-5 col-5">

                    
                    <div class="form-group">
                        <div class="checkbox<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('status', 'Status'); ?><br>
                             <?php echo Form::checkbox('status', '1', 1, ['id' => 'switch1','class'=>'switch']); ?> 
                        </div>
                        <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                    </div>

                    <div class="form-group <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">

                            <?php echo Form::label('image', 'Image'); ?>


                            <?php echo Form::file('image', ['class'=>'dropify']); ?>


                            <small class="text-danger"><?php echo e($errors->first('image')); ?></small>

                    </div>
                    
                </div>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\react\resources\views/admin/post/create.blade.php ENDPATH**/ ?>