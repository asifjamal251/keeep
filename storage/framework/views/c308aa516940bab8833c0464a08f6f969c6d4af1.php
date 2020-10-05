<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/plyr/plyr.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
       
          <h3 class="content-header-title mb-0">Dashboard</h3>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
            
            </div>
           
          </div>
        </div>
      </div>

<div class="card">
              <div class="card-header border-0-bottom">
                <h4 class="card-title">Resent Upload Images</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <div class="row my-1">
                    <div class="col-lg-6 col-12">

                      <h1>Hello</h1>


                     </div>
                   </div>
                </div>
              </div>
            </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('admin-assets/plyr/plyr.js')); ?>"></script>

<script type="text/javascript">
  
  const player = new Plyr('#player', {
    title: 'Example Title',
    autoplay: false,
    captions: false,
    quality: { default: 576, options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360, 240] },
});


</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sanix\app\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>