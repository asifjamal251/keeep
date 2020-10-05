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

<?php echo Form::open(['method' => 'POST', 'route' => 'admin.site-setting.logo', 'class' => 'form-horizontal','files'=>true]); ?>

    <div class="row my-1">

        <div class="col-lg-6 col-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="form-group<?php echo e($errors->has('product_price') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('product_price', 'Product Price ($)'); ?>

                            <?php echo Form::text('product_price', $logo->product_price, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Product Price']); ?>

                            <small class="text-danger"><?php echo e($errors->first('product_price')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('shipping_price') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('shipping_price', 'Shipping Price ($)'); ?>

                            <?php echo Form::text('shipping_price', $logo->shipping_price, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Shipping Price']); ?>

                            <small class="text-danger"><?php echo e($errors->first('shipping_price')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('email', 'Email Address'); ?>

                            <?php echo Form::email('email', $logo->email, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']); ?>

                            <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('mobile', 'Mobile No.'); ?>

                            <?php echo Form::text('mobile', $logo->mobile, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Mobile No.']); ?>

                            <small class="text-danger"><?php echo e($errors->first('mobile')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('address', 'Full Address'); ?>

                            <?php echo Form::textarea('address', $logo->address, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Address']); ?>

                            <small class="text-danger"><?php echo e($errors->first('address')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('notification_title') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('notification_title', 'Notification Title'); ?>

                            <?php echo Form::text('notification_title', $logo->notification_title, ['class' => 'form-control', 'required' => 'required']); ?>

                            <small class="text-danger"><?php echo e($errors->first('notification_title')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('notification_content') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('notification_content', 'Notification Content'); ?>

                            <?php echo Form::text('notification_content', $logo->notification_content, ['class' => 'form-control', 'required' => 'required']); ?>

                            <small class="text-danger"><?php echo e($errors->first('notification_content')); ?></small>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="form-group<?php echo e($errors->has('site_title') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('site_title', 'Site Title'); ?>

                            <?php echo Form::text('site_title', $logo->site_title, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Site Logo']); ?>

                            <small class="text-danger"><?php echo e($errors->first('site_title')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('site_description') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('site Description', 'Site Description'); ?>

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
                    </div>
                </div>
            </div>
        </div>        
    </div>
            
<?php echo Form::close(); ?>

 
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('admin-assets/dropify/js/dropify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/dropify/dropify.js')); ?>"></script>
<script type="text/javascript">
 </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/setting/site-setting.blade.php ENDPATH**/ ?>