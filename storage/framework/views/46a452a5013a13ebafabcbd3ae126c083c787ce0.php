<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<section class="wrapper main-wrapper" style=''>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Edit Unit</h1> </div>
            <div class="pull-right hidden-xs">
                <ol class="breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i>Home</a>
                    </li>
                   
                    <li class="active">
                        <strong>Edit Unit</strong>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
     <?php echo Form::open(['route'=>['admin.'.request()->segment(2).'.update',$unit->id],'method'=>'put']); ?>

   

  

   <div class="form-group">
    <label for="name">Unit Name</label>
  <?php echo e(Form::text('unit_name',$unit->name,['class'=>'form-control'])); ?>

    <p class="text-danger"><?php echo e($errors->first('unit_name')); ?></p>
  </div>
    <div class="form-group">
    <label for="name">Unit Symbol</label>
  <?php echo e(Form::text('unit_symbol',$unit->symb,['class'=>'form-control'])); ?>

    <p class="text-danger"><?php echo e($errors->first('unit_symbol')); ?></p>
  </div>
  
  <div class="form-group">
   <button type="submit" class="btn btn-info">Update Unit</button>
    </div>
<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/help/edit.blade.php ENDPATH**/ ?>