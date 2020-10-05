@extends('admin.layouts.master')
@section('title','Edit Bread')
@push('links')
<style type="text/css">
span.permissionbox {
border: 1px solid gray;
padding: 8px;
margin: 10px 10px;
/*height: 57px !important;*/
display: inline-block;
position: relative;
}
span.permissionbox i {
right: -5px;
top: 9px;
}
</style>
@endpush


@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Bread List</h3>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            {{--      @can('add') --}}
        <a class="btn btn-primary btn-sm text-right" href="{{ adminRoute('create')}}">Add Bread</a>
        {{-- @endcan --}}
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

    {!! Form::open(['route'=>['admin.'.request()->segment(2).'.update',$menu->slug],'method'=>'put','id'=>'breadForm']) !!}
    <div class="form-group">
        <label for="">Name</label>
        {!! Form::text('name', ($menu->title)?$menu->title:title_case(str_replace('_', ' ', $menu->slug)) , ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="">Icon</label>
        {!! Form::text('icon', $menu->icon , ['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group pull-right">
        <button type="submit" onclick="submitForm()" class="btn btn-primary" >Submit</button>
    </div>
    <br>
    <br>
    <label for="">Permissions</label>
    <br><br>
    <div class="form-group" id="permissions">
        @foreach(array_unique(array_merge($permissions,['browse_'.$menu->slug,'read_'.$menu->slug,'add_'.$menu->slug,'edit_'.$menu->slug,'delete_'.$menu->slug])) as $per)





        <span class="permissionbox">
            <i class="fa fa-times" style="position: absolute;margin-left: 72px;margin-top: -17px;color:#fc5050" onClick="removePermission(this)"></i>
            <label >{{ ($per) }}  </label>
            &nbsp;&nbsp;{!! Form::checkbox('permissions[]', $per, in_array( $per,$permissions), ['class'=>'js-switch-sm']) !!}
        </span>



        @endforeach
        <button style="margin-left:50px;" class="btn btn-sm pull-right btn-link"  type="button" data-toggle="modal" data-target="#addPermission">Add More</button>
        
        
    </div>
    
    {!! Form::close() !!}
<!-- Modal -->
<div id="addPermission" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <label>Permission Name</label>
                <input type="text" name="per" class="form-control" autocomplete="off">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="addPermission(this)" class="btn btn-default" >Add</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@push('scripts')

<script src="{{asset('admin-assets/app-assets/js/scripts/forms/switch.js')}}" type="text/javascript"></script>

<script type="text/javascript">
function addPermission(el){
var val = $(el).closest('.modal-content').find('input').val();
var html = ' <span class="permissionbox"><i class="fa fa-times" style="position: absolute;margin-left: 72px;margin-top: -17px;color:#fc5050" onClick="removePermission(this)"></i>'+
    '<label >'+val+'  </label>'+
    '&nbsp;&nbsp;<input type="checkbox" name="permissions[]"  value="'+slug(val)+'" class="js-switch-sm"> '+
'</span>';
$('#permissions').append(html);
$('#addPermission').modal('hide');
$(el).closest('.modal-content').find('input').val('');
switchBtn();

}
function removePermission(element){
if(confirm('Are you sure to remove this permission')){
$(element).parent().remove();
}
}
function slug(string){
return  string.toLowerCase().split(' ').filter(function(n){ return n != '' }).join('_');
}

function switchBtn(){
var elems2 = $('input[data-switchery!="true"].js-switch-sm');
for (var i = 0; i < elems2.length; i++) {
new Switchery(elems2[i],{ size: 'small' });
}
}
function submitForm(){
$('#breadForm').submit();
}
</script>
@endpush