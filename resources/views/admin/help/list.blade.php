@extends('admin.layouts.master')
@section('title','List Tag')
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Tag List</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <!-- <div class="btn-group" role="group">
            @can('add_slider')
                <a href="{{ route('admin.tag.create') }}" class="btn btn-primary btn-sm">Add Tag</a>
            @endcan
       </div> -->
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
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
                "drawCallback": function( settings ) {
                    $('[data-toggle="tooltip"]').tooltip();
                },
                "processing": true,
                "serverSide": true,
                'ajax': {
                    'url': '{{ route('admin.help.index') }}',
                    'data': function(d) {
                        d._token = '{{ csrf_token() }}';
                        d._method = 'PATCH';
                    }

                },
                "columns": [
                    { "data": "sn" }, 
                    { "data": "name" }, 
                    { "data": "email" },
                    { "data": "subject" },
                    { "data": "status" },
                    { "data": "created_at" }, 
                    {
                        "data": "action",
                        render: function(data, type, row) {
                            if (type === 'display') {
                                var btn = '';
                                 btn+='<a class="btn btn-xs btn-social-icon btn-outline-secondary" href="'+window.location.href+'/'+row['id']+'/edit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View Message"><i class="fa fa-eye"></i></a> ';

                                // @can('delete_category')
                                //     btn += '<button type="button" onclick="deleteAjax(\''+window.location.href+'/'+row['id']+'\')" class="btn btn-xs btn-social-icon btn-outline-danger"><i class="fa fa-trash"></i></button>&nbsp;';
                                // @endcan
                               

                                return btn;
                            }
                            return ' ';
                        },
                }]

            });

    </script>


@endpush