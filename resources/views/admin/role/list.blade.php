@extends('admin.layouts.master')
@section('title','List Role')
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Bread List</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            @can('add_role')
                <a href="{{ route('admin.role.create') }}" class="btn btn-primary btn-sm">Add Role</a>
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

                    <table class="table table-striped table-bordered dom-jQuery-events">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>Asction</th>
                            </tr>
                        </thead>

                        <tbody>
                           @foreach ($roles as $role)
                               <tr>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <a href="{{ route('admin.role.edit',$role->id) }}" title="e" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                      
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>

                </div>
            </div>
        </div>
             
    </div>
</div>



@endsection


@push('scripts')

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
                                 btn+='<a  href="{{ request()->url() }}/'+row[4]+'/edit"><i class="icon-note"></i></a> &nbsp; &nbsp; ';
                                
                               
                                return btn;
                            }
                            return data;
                        },
                    }      
                ]
            });

           
        });
    </script>

@endpush