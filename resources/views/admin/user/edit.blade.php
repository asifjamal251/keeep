@extends('admin.layout.master')
@section('title','Edit User Profile')
@section('head')
<div class="page-head">
    <h3 class="m-b-less">
        User Edit
    </h3>
    <div class="state-information">
        
    </div>
</div>
@endsection
@section('content')

<div class="clearfix"></div>
{!! Form::open(['route'=>['admin.'.request()->segment(2).'.update',$user->id],'method'=>'put']) !!}
<div class="form-group">
    <label for="first_name">First Name</label>
    {{ Form::text('first_name',$user->first_name,['class'=>'form-control']) }}
    <p class="text-danger">{{$errors->first('first_name')}}</p>
</div>
<div class="form-group">
    <label for="last_name">Last Name</label>
    {{ Form::text('last_name',$user->last_name,['class'=>'form-control']) }}
    <p class="text-danger">{{$errors->first('last_name')}}</p>
</div>
<div class="form-group">
    <label for="mobile">Mobile</label>
    {{ Form::text('mobile',$user->mobile,['class'=>'form-control','readonly'=>(auth('admin')->user()->hasAccess('change_mobile_user')?false:true)]) }}
    <p class="text-danger">{{$errors->first('mobile')}}</p>
</div>
<div class="form-group">
    <label for="password">Password</label>
    {{ Form::text('password',$user->plain_password?decrypt($user->plain_password):'',['class'=>'form-control']) }}
    <p class="text-danger">{{$errors->first('password')}}</p>
</div>
<div class="form-group">
    <div class="checkbox{{ $errors->has('send_message') ? ' has-error' : '' }}">
        <label for="send_message">
            {!! Form::checkbox('send_message', '1', null, ['id' => 'send_message']) !!} Send Message to User
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('send_message') }}</small>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Update</button>
</div>
{!! Form::close() !!}
@endsection