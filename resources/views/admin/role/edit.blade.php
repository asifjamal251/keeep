@extends('admin.layouts.master')
@section('title','Edit Role')
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Edit Role</h3>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            {{--      @can('add') --}}
        <a class="btn btn-primary btn-sm text-right" href="{{ adminRoute('create')}}">Add Role</a>
        {{-- @endcan --}}
       </div>
    </div>
</div>
</div>

<style type="text/css">
ul{
list-style: none;
padding-left: 57px;
}
ul.permissions.checkbox {
padding: 0px;
}
.col-md-4 {
background: #fff;
/* margin: 4px; */
border: 1px solid #f3f3f3;
min-height: 179px;
}
</style>



<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">


    {!! Form::open(['route'=>['admin.'.request()->segment(2).'.update',$role->id],'method'=>'put']) !!}
    
    <input type="hidden" name="_method" value="PUT">
    <!-- <legend>Edit your Detail </legend> -->
    
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="permission"></label><br>
        <button class="permission-select-all btn btn-success btn-xs "><i class="fa fa-check"></i></button>
        <button class="permission-deselect-all btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
        
    </div>

    <div class="row"> 
    
    @foreach($permissions as $table => $groupPermission)
    <div class="col-md-4">
        <ul class="permissions checkbox">
            <li>
                <input type="checkbox" id="" class="permission-group">
                <label for="{{$table}}"><strong>{{ title_case(str_replace('_',' ', $table)) }} </strong></label>
                <ul>
                    @foreach($groupPermission as $permission)
                    <li>
                        <input type="checkbox" id="permission-{{ $permission->id }} " name="permissions[]" class="the-permission" {{ $permission->checked? 'checked' :'' }} value=" {{ $permission->permission_key }}" >
                        <label for="permission-{{ $permission->id }}">{{ title_case(str_replace('_',' ', $permission->permission_key)) }}</label>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
    @endforeach
</div>
    
    
    
    <div class="col-md-12 text-right">
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

</div>
</div>
</div>
</div>
</div>

@endsection
@push('scripts')
<script>
$('document').ready(function () {
$('.toggleswitch').toggle();
$('.permission-group').on('change', function(){
$(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
});
$('.permission-select-all').on('click', function(){
$('ul.permissions').find("input[type='checkbox']").prop('checked', true);
return false;
});
$('.permission-deselect-all').on('click', function(){
$('ul.permissions').find("input[type='checkbox']").prop('checked', false);
return false;
});
function parentChecked(){
$('.permission-group').each(function(){
var allChecked = true;
$(this).siblings('ul').find("input[type='checkbox']").each(function(){
if(!this.checked) allChecked = false;
});
$(this).prop('checked', allChecked);
});
}
parentChecked();
$('.the-permission').on('change', function(){
parentChecked();
});
});
</script>
@endpush