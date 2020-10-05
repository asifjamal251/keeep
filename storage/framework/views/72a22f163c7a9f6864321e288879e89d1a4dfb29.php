<?php $__env->startSection('title','List Post'); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Admin List</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_admin')): ?>
                <a href="<?php echo e(route('admin.admin.create')); ?>" class="btn btn-primary btn-sm">Add Admin</a>
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
                                <th>Id</th>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
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
                "drawCallback": function( settings ) {
                    $('[data-toggle="tooltip"]').tooltip();
                },

                "processing": true,
                "serverSide": true,
                'ajax': {
                    'url': '<?php echo e(route('admin.admin.index')); ?>',
                    'data': function(d) {
                        d._token = '<?php echo e(csrf_token()); ?>';
                        d._method = 'PATCH';
                    }

                },
                "columns": [
                    { "data": "sn" },
                    { "data": "role" },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "status" },
                    {
                        "data": "action",
                        render: function(data, type, row) {

                            if (type === 'display') {
                                var btn = '';
                                btn += '<a class="btn btn-social-icon btn-outline-success btn-xs" href="<?php echo e(request()->url()); ?>/' + row['id'] + '"><i class="fa fa-eye"></i></a>&nbsp;';

                                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_admin')): ?>
                                    btn+='<a class="btn btn-xs btn-social-icon btn-outline-info" href="'+window.location.href+'/'+row['id']+'/edit"><i class="fa fa-pencil-square-o"></i></a> ';
                                <?php endif; ?>

                                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'change_status_admin')): ?>
                                
                                if( row['changeStatus']=='1' && row['id'] != 2){
                                    btn+='<button type="button" onclick="updateData(\'<?php echo e(route('admin.admin.change-status')); ?>\',{admin_id:'+row['id']+',status:0})" class="btn btn-social-icon btn-outline-warning btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Deactivate"><i class="ft-x-square"></i></button> ';
                                }
                                if( row['changeStatus']=='0' && row['id'] != 2){
                                    btn+='<button type="button" onclick="updateData(\'<?php echo e(route('admin.admin.change-status')); ?>\',{admin_id:'+row['id']+',status:1})" class="btn btn-social-icon btn-outline-info btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Active"><i class="ft-check-square"></i></button> ';
                                }

                                <?php endif; ?>


                                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'delete_admin')): ?>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/admin/list.blade.php ENDPATH**/ ?>