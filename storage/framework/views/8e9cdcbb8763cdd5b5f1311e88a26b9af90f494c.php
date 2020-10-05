<?php $__env->startSection('title','List Bread'); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Bread List</h3>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
          <?php if (\Illuminate\Support\Facades\Blade::check('can', 'add_bread')): ?>
        <a class="btn btn-primary btn-sm text-right" href="<?php echo e(adminRoute('create')); ?>">Add Bread</a>
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
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuKey => $menuValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($menuKey); ?></td>
                                    <td width="30%">
                                        <a href="<?php echo e(adminRoute('edit',$menuValue)); ?>" class="btn btn-primary btn-sm">Edit Bread</a>
                                        <button onclick="deleteForm('<?php echo e(adminRoute('destroy',$menuValue)); ?>')" class="btn btn-danger btn-sm">Delete Bread</button>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/bread/list.blade.php ENDPATH**/ ?>