@extends('admin.layouts.master')
@section('title','List Gallery')
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Image List</h5>

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
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edited Image</th>
                                <th>User Action</th>
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
                <div class="form-group{{ $errors->has('editor_id') ? ' has-error' : '' }}">
                    {!! Form::label('editor_id', 'Select Editor') !!}
                    {!! Form::select('editor_id',\App\Admin::orderBy('name','asc')->where('role_id',3)->pluck('name','id'), null, ['id' => 'editor_id', 'class' => 'form-control', 'required' => 'required', 'placeholder'=>'Select Editor']) !!}
                    <small class="text-danger editor_id">{{ $errors->first('editor_id') }}</small>
                    <small class="text-danger backlog_id">{{ $errors->first('editor_id') }}</small>
                </div>
            </div>
            <div class="modal-footer block">
                <button type="button" class="btn grey btn-outline-warning float-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary float-right" onclick="assignEditor(1)">Assign Editor</button>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')


<script type="text/javascript">



  //alert('hello');  

            var table2 = $('#dataTableAjax').DataTable({
            	"drawCallback": function( settings ) {
                    $('[data-toggle="tooltip"]').tooltip();
                },
                "processing": true,
                "serverSide": true,
                'ajax': {
                    'url': '{{ route('admin.image.index') }}',
                    'data': function(d) {
                        d._token = '{{ csrf_token() }}';
                        d._method = 'PATCH';
                        d.status = $('#status').val();
                    }

                },

                "columns": [
                     
                    { "data": "id" },    
                    { "data": "image" },    
                    { "data": "status" },
                    { "data": "edited_image" },
                    { "data": "user_action" },
                    { "data": "created_at" }, 
                    {
                        "data": "action",
                        render: function(data, type, row) {
                            if (type === 'display') {
                                var btn = '';
                                console.log(row['statusKeep'])
                                 @can('edit_image')
                                 if( row['statusKeep'] == null || row['statusKeep'] == 4 ){
                                    btn+='<a class="btn btn-xs btn-social-icon btn-outline-info" href="'+window.location.href+'/'+row['id']+'/edit"><i class="fa fa-pencil-square-o"></i></a> ';
                                }
                                @endcan
                                 @can('delete_image')
                                    btn += '<button type="button" onclick="deleteAjax(\'/admin/backlog/'+row['id']+'\')" class="btn btn-xs btn-social-icon btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>&nbsp;';
                                @endcan
                                
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
            url:'{{ route('admin.editor.assign') }}',
            method: 'post',
            data:{'backlog_id':selectedRows,'editor_id':editor_id,'_token':'{{ csrf_token() }}'},
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


@endpush