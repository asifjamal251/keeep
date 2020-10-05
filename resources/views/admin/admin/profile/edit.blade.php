@extends('admin.layouts.master')
@section('title','Edit Profile')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/dropify/css/dropify.min.css')}}">
@endpush
@section('main')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Edit Profile</h5>
    </div>
    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
           
                <a href="/admin/password" class="btn btn-primary btn-sm">Change Password</a>
           
       </div>
    </div>
</div>
</div>
<div class="card">
    <div class="card-content">
        <div class="card-body">
           {!! Form::open(['route'=>['admin.myprofile.update',$admin->id],'method'=>'put','files'=>true]) !!}
           <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', $admin->email, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', $admin->name, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            {!! Form::label('mobile', 'Mobile') !!}
                            {!! Form::text('mobile', $admin->mobile, ['class' => 'form-control', 'placeholder' => 'Mobile']) !!}
                            <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        </div>
                        
                       
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            {!! Form::label('avatar', 'Profile Photo') !!}
                            {!! Form::file('avatar', ['class' => 'dropify','data-default-file'=>$admin->avatar?asset($admin->avatar):'']) !!}
                            {!! Form::hidden('checkfile',asset($admin->avatar)??'', ['id' => 'checkfile']) !!}
                            <small class="text-danger">{{ $errors->first('avatar') }}</small>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                <button href="#" class="btn btn-primary" type="submit" id="password_modal_save">Update Profile</button>
            </div>
            
            </div>
            {!! Form::close() !!}
        </div>
             
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('admin-assets/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/dropify/dropify.js')}}"></script>
<script type="text/javascript">
     jQuery(document).ready(function() {
         $('.dropify-clear').click(function() {
          $("#checkfile").val('');
         });
    });
 </script>
@endpush