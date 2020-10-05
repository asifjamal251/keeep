<?php $__env->startSection('title','List Role'); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Bread List</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_role')): ?>
                <a href="<?php echo e(route('admin.role.create')); ?>" class="btn btn-primary btn-sm">Add Role</a>
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

                    <table class="table table-striped table-bordered dom-jQuery-events">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>Asction</th>
                            </tr>
                        </thead>

                        <tbody>
                           <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr>
                                    <td><?php echo e($role->name); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.role.edit',$role->id)); ?>" title="e" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                      
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        
                    </table>

                </div>
            </div>
        </div>
             
    </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<script type="text/javascript">
        $(document).ready(function() {    
            $('#dataTableAjax').DataTable({
                "processing": true,
                "serverSide": true,
                'ajax' : {
                 'url':window.location.href,                  
               },
                "columns": [
                    { "name": "si" },
                    { "name": "name" },
                    { "name": "state" },
                    { "name": "country" },
                    { "name": "id",  
                        render: function ( data, type, row ) {
                            if (type === 'display' ) {
                                var btn='';
                                 btn+='<a  href="<?php echo e(request()->url()); ?>/'+row[4]+'/edit"><i class="icon-note"></i></a> &nbsp; &nbsp; ';
                                
                               
                                return btn;
                            }
                            return data;
                        },
                    }      
                ]
            });

           
        });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sanix\ios\resources\views/admin/role/list.blade.php ENDPATH**/ ?>