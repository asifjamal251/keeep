<?php $__env->startSection('title','List Slider'); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Slider List</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_slider')): ?>
                <a href="<?php echo e(route('admin.slider.create')); ?>" class="btn btn-primary btn-sm">Add Slider</a>
            <?php endif; ?>
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <table id="dataTableAjax" class="display dataTableAjax table table-striped table-bordered dom-jQuery-events" >
                        <thead>
                            <tr>
                                <th>Si</th>
                                <th>Title</th>
                                <th width="30%">Sub Title</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                    </table>

                </div>
            </div>
        </div>
             
    </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>


<script type="text/javascript">

  //alert('hello');  

            var table2 = $('#dataTableAjax').DataTable({
                "processing": true,
                "serverSide": true,
                'ajax': {
                    'url': '<?php echo e(route('admin.slider.index')); ?>',
                    'data': function(d) {
                        d._token = '<?php echo e(csrf_token()); ?>';
                        d._method = 'PATCH';
                    }

                },
                "columns": [
                    { "data": "sn" }, 
                    { "data": "title" }, 
                    { "data": "sub_title" },  
                    { "data": "status" },
                    { "data": "created_at" }, 
                    {
                        "data": "action",
                        render: function(data, type, row) {
                            if (type === 'display') {
                                var btn = '';
                                btn += '<a class="btn btn-info btn-xs" href="<?php echo e(request()->url()); ?>/' + row['id'] + '"><i class="fa fa-eye"></i></a>&nbsp;';
                                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'delete_project')): ?>
                                    btn += '<button type="button" onclick="deleteAjax(\''+window.location.href+'/'+row['id']+'\')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>&nbsp;';
                                <?php endif; ?>
                               

                                return btn;
                            }
                            return ' ';
                        },
                }]

            });

    </script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\react\resources\views/admin/slider/list.blade.php ENDPATH**/ ?>