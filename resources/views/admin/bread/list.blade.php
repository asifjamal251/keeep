@extends('admin.layouts.master')
@section('title','List Bread')
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Bread List</h3>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
          @can('add_bread')
        <a class="btn btn-primary btn-sm text-right" href="{{ adminRoute('create')}}">Add Bread</a>
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
                            @foreach ($menus as $menuKey => $menuValue)
                                <tr>
                                    <td>{{ $menuKey }}</td>
                                    <td width="30%">
                                        <a href="{{ adminRoute('edit',$menuValue)}}" class="btn btn-primary btn-sm">Edit Bread</a>
                                        <button onclick="deleteForm('{{ adminRoute('destroy',$menuValue) }}')" class="btn btn-danger btn-sm">Delete Bread</button>
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