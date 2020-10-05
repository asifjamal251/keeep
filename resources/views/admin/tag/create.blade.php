@extends('admin.layouts.master')
@section('title','Create Tag')
@push('links')

@endpush
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Tag Create</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            @can('add_slider')
                <a href="{{ route('admin.tag.create') }}" class="btn btn-primary btn-sm">Add Tag</a>
            @endcan
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
          {!! Form::open(['method' => 'POST', 'route' => 'admin.tag.store', 'class' => 'form-horizontal','files'=>true]) !!}

            <div class="row my-1">
                <div class="col-lg-4 col-4">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Tag Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Tag Name']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                    
                        <div class="btn-group">
                            {!! Form::submit("Add Tag", ['class' => 'btn btn-info']) !!}
                        </div>

                </div>

                <div class="col-lg-8 col-8">

                    <table id="dataTableAjax" class="display dataTableAjax table table-striped table-bordered dom-jQuery-events" >
                        <thead>
                            <tr>
                                <th>Si</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                    </table>

                    
                </div>
            </div>
            {!! Form::close() !!}

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
                    'url': '{{ route('admin.tag.index') }}',
                    'data': function(d) {
                        d._token = '{{ csrf_token() }}';
                        d._method = 'PATCH';
                    }

                },
                "columns": [
                    { "data": "sn" }, 
                    { "data": "name" }, 
                    { "data": "slug" },
                    { "data": "created_at" }, 
                    {
                        "data": "action",
                        render: function(data, type, row) {
                            if (type === 'display') {
                                var btn = '';
                                btn += '<a class="btn btn-social-icon btn-outline-info btn-xs" href="{{ request()->url() }}/' + row['id'] + '"><i class="fa fa-eye"></i></a>&nbsp;';
                                @can('delete_category')
                                    btn += '<button type="button" onclick="deleteAjax(\''+window.location.href+'/'+row['id']+'\')" class="btn btn-xs btn-social-icon btn-outline-danger"><i class="fa fa-trash"></i></button>&nbsp;';
                                @endcan
                               

                                return btn;
                            }
                            return ' ';
                        },
                }]

            });

</script>


@endpush