<?php $__env->startPush('links'); ?>
<style type="text/css">
    table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td,table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting{
    border-bottom-width: 0;
    padding: 10px!important;
}
table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after, table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before{
    display: none;
}
</style>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('main'); ?>

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Backlog List</h5>

    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                <?php echo Form::select('status', [10=>'Processed',9=>'Unprocess',13=>'Assign'], null, ['id' => 'status', 'class' => 'form-control', 'placeholder' => 'Select Status','onChange'=>'status(this)']); ?>

                <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
            </div>
       </div>
    </div>
    <button onclick="selectEditorModel()" type="button" class="btn btn-primary btn-sm selectEditor">
        Select Editor
    </button>
</div>
</div>

<div class="card">
    <div class="card-content">
         <div class="card-header" id="heading-links">
            <span class="card-title pull-left" style="text-transform: capitalize;"><b>Name:</b> <?php echo e($user->name); ?></span>
            <span class="card-title pull-right" style="text-transform: lowercase;"><b style="text-transform: capitalize;">Email:</b><?php echo e($user->email); ?></span>

             
        </div>
         <hr>

        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <table id="dataTableAjax" class="display dataTableAjax table table-striped table-bordered dom-jQuery-events" >
                        <thead>
                            <tr>
                                <th width="2%"><input type="checkbox" class="masterCheckbox" onChange="masterCheckbox(this)"></th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Editor</th>
                                <th>Edited Image</th>
                                <th>User Action</th>
                                <th>Printed</th>
                                <th>Shiped</th>
                                <th>Created at</th>
                                <th width="165px" style="">Action</th>
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




<div class="modal fade text-left" id="assignOther" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Select New Editor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group<?php echo e($errors->has('reason') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('reason', 'Cancel Reason'); ?>

                    <?php echo Form::text('reason', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Cancel Reason']); ?>

                    <small class="text-danger"><?php echo e($errors->first('reason')); ?></small>
                </div>

                <div class="form-group<?php echo e($errors->has('editor_id') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('editor_id', 'Select New Editor'); ?>

                    <?php echo Form::select('editor_id',\App\Admin::orderBy('name','asc')->where('role_id',3)->pluck('name','id'), null, ['id' => 'editor_id', 'class' => 'form-control', 'required' => 'required', 'placeholder'=>'Select New Editor']); ?>

                    <small class="text-danger editor_id"><?php echo e($errors->first('editor_id')); ?></small>
                    <small class="text-danger backlog_id"><?php echo e($errors->first('editor_id')); ?></small>
                </div>

                <?php echo Form::hidden('backlog_id', '',['id'=>'backlogID']); ?>

            </div>
            <div class="modal-footer block">
                <button type="button" class="btn grey btn-outline-warning float-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary float-right" onclick="assignOtherEditor(1)">Cancel And Assign Other Editor</button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>


<script type="text/javascript">

var selectedRows = new Array
    var currentRows = new Array
   
    function masterCheckbox(element){
        Array.from(document.getElementsByName('selectRow')).map(checkbox=>{
            if(element.checked){
                checkbox.checked = true;
            }else{
                checkbox.checked = false
            }
            selectRow(checkbox.value)

        });
       
    }

    
  
    function selectRow(id){
        if(selectedRows.indexOf(id) >= 0){
            selectedRows.splice((selectedRows.indexOf(id)), 1);
        }
        
        else{
            selectedRows =  [...new Set(selectedRows.concat([id]))];
        }
    }


  //alert('hello');  

            var table2 = $('#dataTableAjax').DataTable({
            	"drawCallback": function( settings ) {
                    $('[data-toggle="tooltip"]').tooltip();
                },
                "processing": true,
                "serverSide": true,
                'ajax': {
                    'url': '<?php echo e(route('admin.backlog.user.image',$user)); ?>',
                    'data': function(d) {
                        d._token = '<?php echo e(csrf_token()); ?>';
                        d._method = 'PATCH';
                        d.status = $('#status').val();
                    }

                },
                fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ){
                    if (document.querySelector('.masterCheckbox').checked == true) {
                        document.querySelector('.masterCheckbox').checked = false;
                        selectedRows = new Array;
                    }
                },

                "columns": [
                    { orderable : false, render: function ( data, type, row ){
                        if (row['statuscheck'] == 9) {

                            return '<input type="checkbox" class="selectionRow" onChange="selectRow('+row['id']+')" name="selectRow" value="'+row['id']+'" '+((selectedRows.indexOf(row['id']) >= 0)?'checked':'')+' />';
                        } else{
                            return " ";
                        }
                    } }, 
                    { "data": "image" },    
                    { "data": "status" },
                    { "data": "editor" },
                    { "data": "edited_image" },
                    { "data": "user_action" },
                    { "data": "printed", 
                        render: function(data, type, row) {
                            if (type === 'display') {
                                var select = '';
                                if( row['printStatus']=='0' && row['keep_status'] == '7'){
                                    select+='<div class="form-group" style="margin:0"><select id="printStatus'+row['id']+'" class="form-control" onchange="printStatus(this,'+row['id']+')" name="printStatus"><option value="1">Yes</option><option selected="selected" value="0">No</option></select><small class="text-danger"></small><input id="printBacklog'+row['id']+'" type="hidden" name="backlog" value="'+row['id']+'"></div> ';
                                }

                                else if( row['printStatus']=='1' && row['keep_status'] == '7'){
                                    select+='<div class="form-group" style="margin:0"><select id="printStatus'+row['id']+'" class="form-control" onchange="printStatus(this,'+row['id']+')" name="printStatus"><option selected="selected" value="1">Yes</option><option  value="0">No</option></select><small class="text-danger"></small><input id="printBacklog'+row['id']+'" type="hidden" name="backlog" value="'+row['id']+'"></div> ';
                                } else{
                                    select+="N/A"
                                }
                                
                                return select;
                            }
                            return ' ';
                        },
                    },
                    { "data": "shiped",
                        render: function(data, type, row) {
                            if (type === 'display') {
                                var select = '';
                                if( row['shippedStatus']=='0' && row['keep_status'] == '7' && row['printStatus']=='1'){
                                    select+='<div class="form-group" style="margin:0"><select id="shippedStatus'+row['id']+'" class="form-control" onchange="shippedStatus(this,'+row['id']+')" name="shippedStatus"><option value="1">Yes</option><option selected="selected" value="0">No</option></select><small class="text-danger"></small><input id="shippedBacklog'+row['id']+'" type="hidden" name="backlog" value="'+row['id']+'"></div> ';
                                }

                                else if( row['shippedStatus']=='1' && row['keep_status'] == '7' && row['printStatus']=='1'){
                                    select+='<div class="form-group" style="margin:0"><select id="shippedStatus'+row['id']+'" class="form-control" onchange="shippedStatus(this,'+row['id']+')" name="shippedStatus"><option selected="selected" value="1">Yes</option><option value="0">No</option></select><small class="text-danger"></small><input id="shippedBacklog'+row['id']+'" type="hidden" name="backlog" value="'+row['id']+'"></div> ';
                                } else{
                                    select+="N/A"
                                }
                                
                                return select;
                            }
                            return ' ';
                        },
                    },
                    { "data": "created_at" }, 
                    {
                        "data": "action",
                        render: function(data, type, row) {
                            if (type === 'display') {
                                var btn = '';
                                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_backlog')): ?>

                                if( row['changeStatus']=='10' || row['changeStatus']=='4'){
                                    btn+='<button type="button" onclick="updateData(\'<?php echo e(route('admin.keep.changeStatus')); ?>\',{id:'+row['id']+',status:14})" class="btn btn-social-icon btn-outline-primary btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Reassign"><i class="ft-corner-right-up"></i></button> ';

                                    btn+='<button type="button" onclick="updateData(\'<?php echo e(route('admin.keep.changeStatus')); ?>\',{id:'+row['id']+',status:6})" class="btn btn-social-icon btn-outline-success btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Approve"><i class="ft-check-square"></i></button> ';

                                    btn+='<button type="button" onclick="assignOther(\''+row['id']+'\')" class="btn btn-social-icon btn-outline-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cancel And Assign To Other Editor"><i class="ft-x-square"></i></button> ';

                                }

                                <?php endif; ?>

                                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'edit_backlog')): ?>
                                    btn+='<a class="btn btn-xs btn-social-icon btn-outline-info" href="'+window.location.href+'/'+row['id']+'/edit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil-square-o"></i></a> ';
                                <?php endif; ?>
                                 <?php if (\Illuminate\Support\Facades\Blade::check('can', 'delete_backlog')): ?>
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

    function assignOther(id) {
         $("#assignOther").modal();
         $("#backlogID").val(id);
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



    function printStatus(element, id){
        var status = $('#printStatus'+id).val();
        var backlog = $('#printBacklog'+id).val();
        if (confirm('Are you sure to change print status.')){  
        $.ajax({
            url:'<?php echo e(route('admin.keep.printStatus')); ?>',
            method: 'post',
            data:{'id':backlog,'status':status,'_method':'PUT','_token':'<?php echo e(csrf_token()); ?>'},
            dataType:'json',

            success: function(result) {
                toastr.success(result.message);
                table2.draw('page');

            },
            error: function(response) {
             
                toastr.error(response.message);
                table2.draw('page');

           }
        });
    }
    table2.draw('page');
    return false;

    }


    function shippedStatus(element, id){
        var status = $('#shippedStatus'+id).val();
        var backlog = $('#shippedBacklog'+id).val();
        if (confirm('Are you sure to change shipping status.')){  
        $.ajax({
            url:'<?php echo e(route('admin.keep.shippedStatus')); ?>',
            method: 'post',
            data:{'id':backlog,'status':status,'_method':'PUT','_token':'<?php echo e(csrf_token()); ?>'},
            dataType:'json',

            success: function(result) {
                toastr.success(result.message);
                table2.draw('page');

            },
            error: function(response) {
             
                toastr.error(response.message);
                table2.draw('page');

           }
        });
    }
    table2.draw('page');
    return false;

    }

    </script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/user/backlog/list.blade.php ENDPATH**/ ?>