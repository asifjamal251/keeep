<?php $__env->startSection('title','Create Menu'); ?>
<?php $__env->startSection('head'); ?>
    <div class="page-head">
        <h3 class="m-b-less">
            Create Menu
        </h3>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<section class="wrapper main-wrapper" style=''>
    <div class="clearfix"></div>
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body">
                <?php echo Form::open(['route'=>'employee.menu.store']); ?>

                        <div class="form-group">
                            <?php echo Form::label('menu_name', 'Menu Name', ['class'=>'control-label']); ?>

                        <?php echo Form::text('menu_name', null, ['class'=>'form-control']); ?>

                        <b class="text-danger"><?php echo e($errors->first('menu_name')); ?></b>
                        </div>


                        <div class="form-group">
                            <?php echo Form::label('icon', 'Icon', ['class'=>'control-label']); ?>

                            <?php echo Form::text('icon', null, ['class'=>'form-control']); ?>

                            <b class="text-danger"><?php echo e($errors->first('icon')); ?></b>
                        </div>

                        <div class="form-group">
                            <?php echo Form::label('status', 'Status', ['class'=>'control-label']); ?>

                        <?php echo Form::select('status', array(1 => 'Active', '0' => 'Deactive'), null, array('class' => 'form-control'));; ?>

                        <b class="text-danger"><?php echo e($errors->first('status')); ?></b>
                        </div>                       
                    
                    <div class="form-group">
                        <button class="btn btn-success pull-right">Create</button>
                        <a style=" margin-right: 14px;padding: 7px;width: 71px;background: #dcd7d7;" class="btn btn-default pull-right" id="back">Back</a>
                    </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
  $("#back").click(function(){
    window.location.href="<?php echo e(route('employee.'.request()->segment(2).'.index')); ?>"
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('employee.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/menu/create.blade.php ENDPATH**/ ?>