<?php $__env->startSection('title','Change Password'); ?>
<?php $__env->startPush('links'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Change Password</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <?php echo Form::open(['route'=>['admin.change-password'],'method'=>'put','files'=>true,'autocomplete' => 'off']); ?>


            <div style="width: 400px; margin: 0 auto;">

                <div class="form-group<?php echo e($errors->has('current_password') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('current_password', 'Current Password'); ?>


                    <?php echo Form::password('current_password', ['class' => 'form-control', 'required' => 'required','placeholder'=>'Current Password']); ?>


                    <small class="text-danger"><?php echo e($errors->first('current_password')); ?></small>

                </div>

                <div class="form-group<?php echo e($errors->has('new_password') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('new_password', 'New Password'); ?>


                    <?php echo Form::password('new_password', ['class' => 'form-control', 'required' => 'required','placeholder'=>'New Password']); ?>


                    <small class="text-danger"><?php echo e($errors->first('new_password')); ?></small>

                </div>

                <div class="form-group<?php echo e($errors->has('new_password_confirmation') ? ' has-error' : ''); ?>">

                    <?php echo Form::label('new_password_confirmation', 'Confirm Password'); ?>


                    <?php echo Form::password('new_password_confirmation', ['class' => 'form-control', 'required' => 'required','placeholder'=>'Confirm Password','autocomplete'=>'off']); ?>


                    <small class="text-danger"><?php echo e($errors->first('new_password_confirmation')); ?></small>

                </div>

                <button href="#" class="btn btn-primary" type="submit" id="password_modal_save">Change Password</button>
            </div>


            <?php echo Form::close(); ?>


        </div>
             
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>


<script type="text/javascript">

   
 </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sanix\ios\resources\views/admin/admin/profile/changepassword.blade.php ENDPATH**/ ?>