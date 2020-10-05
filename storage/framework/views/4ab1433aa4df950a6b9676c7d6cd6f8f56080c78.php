<?php $__env->startSection('title','List Gallery'); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Orders</h5>

    </div>

    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
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




<div class="modal fade text-left" id="editorSelection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Select Editor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group<?php echo e($errors->has('editor_id') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('editor_id', 'Select Editor'); ?>

                    <?php echo Form::select('editor_id',\App\Admin::orderBy('name','asc')->where('role_id',3)->pluck('name','id'), null, ['id' => 'editor_id', 'class' => 'form-control', 'required' => 'required', 'placeholder'=>'Select Editor']); ?>

                    <small class="text-danger editor_id"><?php echo e($errors->first('editor_id')); ?></small>
                    <small class="text-danger backlog_id"><?php echo e($errors->first('editor_id')); ?></small>
                </div>
            </div>
            <div class="modal-footer block">
                <button type="button" class="btn grey btn-outline-warning float-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary float-right" onclick="assignEditor(1)">Assign Editor</button>
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
                    'url': '<?php echo e(route('admin.order.index')); ?>',
                    'data': function(d) {
                        d._token = '<?php echo e(csrf_token()); ?>';
                        d._method = 'PATCH';
                        d.status = $('#status').val();
                    }

                },

                "columns": [
                     
                    { "data": "sn" },    
                    { "data": "name" },    
                    { "data": "email" },
                    { "data": "status" },
                    { "data": "created_at" }, 
                    {
                        "data": "action",
                        render: function(data, type, row) {
                            if (type === 'display') {
                                var btn = '';
                                
                                 btn += '<a class="btn btn-social-icon btn-outline-success btn-xs" href="<?php echo e(request()->url()); ?>/' + row['id'] + '"><i class="fa fa-eye"></i></a>&nbsp;';

                                 <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_order')): ?>
                                 if( row['statusKeep'] == null || row['statusKeep'] == 4 ){
                                    btn+='<a class="btn btn-xs btn-social-icon btn-outline-info" href="'+window.location.href+'/'+row['id']+'/edit"><i class="fa fa-pencil-square-o"></i></a> ';
                                }
                                <?php endif; ?>
                                 <?php if (\Illuminate\Support\Facades\Blade::check('can', 'delete_image')): ?>
                                    btn += '<button type="button" onclick="deleteAjax(\'/admin/backlog/'+row['id']+'\')" class="btn btn-xs btn-social-icon btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>&nbsp;';
                                <?php endif; ?>
                                
                                return btn;
                            }
                            return ' ';
                        },
                }]

            });
    function status(element){
        table2.draw();
    }

    function selectEditorModel() {
        
         if(selectedRows.length > 0){
            $("#editorSelection").modal();
         } else{
            toastr.error('Image selection is empty!');
         }
    }

    function assignEditor(type){
        var editor_id = $('#editor_id').val();
        $.ajax({
            url:'<?php echo e(route('admin.editor.assign')); ?>',
            method: 'post',
            data:{'backlog_id':selectedRows,'editor_id':editor_id,'_token':'<?php echo e(csrf_token()); ?>'},
            dataType:'json',

            success: function(result) {
                $("#editorSelection").modal('hide');
                toastr.success(result.message);
                table2.draw('page');

            },
            error: function(response) {
                $.each(response.responseJSON.errors, function(key, val) {
                $('small.' + key).html(val);
            });
           }
        });
    }

    </script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/order/list.blade.php ENDPATH**/ ?>