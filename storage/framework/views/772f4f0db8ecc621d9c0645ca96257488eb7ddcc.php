<?php $__env->startPush('links'); ?>
<!--nestable-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin-assets/app-assets/js/nestable/jquery.nestable.css')); ?>" />
<?php $__env->stopPush(); ?>


<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0"><?php if (\Illuminate\Support\Facades\Blade::check('can', 'browse_menu')): ?> Menu List <?php endif; ?></h3>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
           <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.menu.create')); ?>">Add Menu</a>
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    


                    <div class="dd" id="nestable_list_2">
            <ol class="dd-list">
                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="dd-item dd3-item" data-id="<?php echo e($menu->slug); ?>">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content"><?php echo e($menu->name); ?>

                        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_menu')): ?>
                        <a href="<?php echo e(route('admin.menu.edit',$menu->slug)); ?>" class="btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Edit</a>
                        <?php endif; ?>
                        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'delete_menu')): ?>
                        <?php if($menu->childs->isEmpty()): ?>
                        <span style="margin:0px 10px 0px 10px" class="pull-right">/</span>
                        <button onclick="deleteAjax('<?php echo e(route('admin.menu.destroy',$menu->slug)); ?>',function(){window.location.reload(); })" class="btn btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Delete</button>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <?php if($menu->childs->count()): ?>
                    <ol class="dd-list" id="<?php echo e($menu->slug); ?>">
                        <?php $__currentLoopData = $menu->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="dd-item dd3-item" data-id="<?php echo e($child->slug); ?>">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content"><?php echo e($child->name); ?>

                                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_menu')): ?>
                                <a href="<?php echo e(route('admin.menu.edit',$child->slug)); ?>" class="btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Edit</a>
                                <?php endif; ?>
                                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'delete_menu')): ?>
                                <span style="margin:0px 10px 0px 10px" class="pull-right">/</span>
                                <button onclick="deleteAjax('<?php echo e(route('admin.menu.destroy',$child->slug)); ?>',function(){window.location.reload(); })" class="btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Delete</button>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                    <?php endif; ?>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        </div>



                </div>
            </div>
        </div>
             
    </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<?php $__env->startPush('scripts'); ?>
<!--nestable -->
<script src="<?php echo e(asset('admin-assets/app-assets/js/nestable/jquery.nestable.js')); ?>"></script>
<script>
var updateOutput = function(e) {
    var list = e.length ? e : $(e.target),
        output = list.data('output');
    output.val(JSON.stringify(list.nestable('serialize')));
};
$('#nestable_list_2').nestable({
    group: 1,
    maxDepth: 2
}).on('change', function(e) {
    var list = e.length ? e : $(e.target),
        output = list.data('output');
    var data = list.nestable('serialize');
    <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_menu')): ?>
    $.ajax({
        url: '<?php echo e(route('admin.menu.update','')); ?>/1',
        data: {
            'data': list.nestable('serialize'),
            '_method': 'put',
            '_token': '<?php echo e(csrf_token()); ?>',
            '_list': 'nestable'
        },
        method: 'post',
        success: function(response) {
            toastr.success(response.message);
            setTimeout(function() {
                window.location.reload();
            }, 500);
        },
        error: function(response) {
            toastr.error(response.message);
        }
    });
    <?php endif; ?>
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sanix\ios\resources\views/admin/menu/list.blade.php ENDPATH**/ ?>