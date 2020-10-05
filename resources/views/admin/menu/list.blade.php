@extends('admin.layouts.master')

@push('links')
<!--nestable-->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/js/nestable/jquery.nestable.css') }}" />
@endpush


@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">@can('browse_menu') Menu List @endcan</h3>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
           <a class="btn btn-primary btn-sm" href="{{ route('admin.menu.create') }}">Add Menu</a>
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    


                    <div class="dd" id="nestable_list_2">
            <ol class="dd-list">
                @foreach($menus as $menu)
                <li class="dd-item dd3-item" data-id="{{ $menu->slug }}">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content">{{ $menu->name }}
                        @can('edit_menu')
                        <a href="{{ route('admin.menu.edit',$menu->slug)}}" class="btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Edit</a>
                        @endcan
                        @can('delete_menu')
                        @if($menu->childs->isEmpty())
                        <span style="margin:0px 10px 0px 10px" class="pull-right">/</span>
                        <button onclick="deleteAjax('{{ route('admin.menu.destroy',$menu->slug)}}',function(){window.location.reload(); })" class="btn btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Delete</button>
                        @endcan
                        @endif
                    </div>
                    @if($menu->childs->count())
                    <ol class="dd-list" id="{{ $menu->slug }}">
                        @foreach($menu->childs as $child)
                        <li class="dd-item dd3-item" data-id="{{ $child->slug }}">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">{{ $child->name }}
                                @can('edit_menu')
                                <a href="{{ route('admin.menu.edit',$child->slug)}}" class="btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Edit</a>
                                @endcan
                                @can('delete_menu')
                                <span style="margin:0px 10px 0px 10px" class="pull-right">/</span>
                                <button onclick="deleteAjax('{{ route('admin.menu.destroy',$child->slug)}}',function(){window.location.reload(); })" class="btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Delete</button>
                                @endcan
                            </div>
                        </li>
                        @endforeach
                    </ol>
                    @endif
                </li>
                @endforeach
            </ol>
        </div>



                </div>
            </div>
        </div>
             
    </div>
</div>



@endsection


@push('scripts')

@push('scripts')
<!--nestable -->
<script src="{{ asset('admin-assets/app-assets/js/nestable/jquery.nestable.js') }}"></script>
<script>
var updateOutput = function(e) {
    var list = e.length ? e : $(e.target),
        output = list.data('output');
    output.val(JSON.stringify(list.nestable('serialize')));
};
$('#nestable_list_2').nestable({
    group: 1,
    maxDepth: 2
}).on('change', function(e) {
    var list = e.length ? e : $(e.target),
        output = list.data('output');
    var data = list.nestable('serialize');
    @can('edit_menu')
    $.ajax({
        url: '{{ route('admin.menu.update','') }}/1',
        data: {
            'data': list.nestable('serialize'),
            '_method': 'put',
            '_token': '{{ csrf_token() }}',
            '_list': 'nestable'
        },
        method: 'post',
        success: function(response) {
            toastr.success(response.message);
            setTimeout(function() {
                window.location.reload();
            }, 500);
        },
        error: function(response) {
            toastr.error(response.message);
        }
    });
    @endcan
});
</script>
@endpush