<?php $__env->startSection('title','Edit Profile'); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/dropify/css/dropify.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Edit Profile</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
           
                <a href="/admin/password" class="btn btn-primary btn-sm">Change Password</a>
           
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
           <?php echo Form::open(['route'=>['admin.profile.update',$admin->id],'method'=>'put']); ?>


           <div class="row">

                    <div class="col-md-6">

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('email', 'Email'); ?>

                            <?php echo Form::text('email', $admin->email, ['class' => 'form-control', 'readonly' => 'readonly']); ?>

                            <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('name', 'Name'); ?>

                            <?php echo Form::text('name', $admin->name, ['class' => 'form-control', 'placeholder' => 'name']); ?>

                            <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                        </div>
                        <div class="form-group<?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('mobile', 'Mobile'); ?>

                            <?php echo Form::text('mobile', $admin->mobile, ['class' => 'form-control', 'placeholder' => 'Mobile']); ?>

                            <small class="text-danger"><?php echo e($errors->first('mobile')); ?></small>
                        </div>

                        

                       

                    </div>

                    <div class="col-md-6">

                        <div class="form-group<?php echo e($errors->has('avatar') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('avatar', 'Profile Photo'); ?>

                            <?php echo Form::file('avatar', ['class' => 'dropify','data-default-file'=>@$admin->avatar]); ?>


                            <?php echo Form::hidden('checkfile',$admin->avatar?asset($admin->avatr):'', ['id' => 'checkfile']); ?>


                            <small class="text-danger"><?php echo e($errors->first('avatar')); ?></small>
                        </div>

                        

                    </div>
                    <div class="col-md-6">
                <button href="#" class="btn btn-primary" type="submit" id="password_modal_save">Update Profile</button>
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

<script type="text/javascript">

     jQuery(document).ready(function() {


         $('.dropify-clear').click(function() {
          $("#checkfile").val('');
         });

    });
 </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sanix\ios\resources\views/admin/admin/profile/edit.blade.php ENDPATH**/ ?>