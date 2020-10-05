<?php $__env->startSection('title','List Post'); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Post List</h5>
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
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <table id="dataTableAjax" class="display dataTableAjax table table-striped table-bordered dom-jQuery-events" >
                        <thead>
                            <tr>
                                <th width="2%">Si</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th width="3%">Status</th>
                                <th style="width: 10%!important">Image</th>
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
                    'url': '<?php echo e(route('admin.post.index')); ?>',
                    'data': function(d) {
                        d._token = '<?php echo e(csrf_token()); ?>';
                        d._method = 'PATCH';
                    }

                },
                "columns": [
                    { "data": "sn" }, 
                    { "data": "name" }, 
                    { "data": "slug" },   
                    { "data": "status" },
                    { "data": "image" },
                    { "data": "created_at" }, 
                    {
                        "data": "action",
                        render: function(data, type, row) {
                            if (type === 'display') {
                                var btn = '';
                                btn += '<a class="btn btn-social-icon btn-outline-info btn-xs" href="<?php echo e(request()->url()); ?>/' + row['id'] + '"><i class="fa fa-eye"></i></a>&nbsp;';

                                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_category')): ?>
                                    btn += '<button type="button" onclick="deleteAjax(\''+window.location.href+'/'+row['id']+'\')" class="btn btn-xs btn-social-icon btn-outline-danger"><i class="fa fa-trash"></i></button>&nbsp;';
                                <?php endif; ?>

                                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'delete_category')): ?>
                                    btn += '<button type="button" onclick="deleteAjax(\''+window.location.href+'/'+row['id']+'\')" class="btn btn-xs btn-social-icon btn-outline-danger"><i class="fa fa-trash"></i></button>&nbsp;';
                                <?php endif; ?>
                               

                                return btn;
                            }
                            return ' ';
                        },
                }]

            });

    </script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\react\resources\views/admin/post/list.blade.php ENDPATH**/ ?>