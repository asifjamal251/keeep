@extends('admin.layouts.master')
@section('title','List Projects')
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Projects List</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            @can('add_project')
                <a href="{{ route('admin.project.create') }}" class="btn btn-primary btn-sm">Add Project</a>
            @endcan
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
                                <th>Job No.</th>
                                <th>PO Date</th>
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



@endsection


@push('scripts')



<script type="text/javascript">

  //alert('hello');  

            var table2 = $('#dataTableAjax').DataTable({
                "processing": true,
                "serverSide": true,
                'ajax': {
                    'url': '{{ route('admin.project.index') }}',
                    'data': function(d) {
                        d._token = '{{ csrf_token() }}';
                        d._method = 'PATCH';
                    }

                },
                "columns": [
                    { "data": "sn" }, 
                    { "data": "job_no" }, 
                    { "data": "po_date" },  
                    { "data": "status" },
                    { "data": "created_at" }, 
                    {
                        "data": "action",
                        render: function(data, type, row) {
                            if (type === 'display') {
                                var btn = '';
                                btn += '<a class="btn btn-info btn-xs" href="{{ request()->url() }}/' + row['id'] + '"><i class="fa fa-eye"></i></a>&nbsp;';
                                @can('delete_project')
                                    btn += '<button type="button" onclick="deleteAjax(\''+window.location.href+'/'+row['id']+'\')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>&nbsp;';
                                @endcan
                               

                                return btn;
                            }
                            return ' ';
                        },
                }]

            });

    </script>

@endpush