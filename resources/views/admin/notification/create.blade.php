@extends('admin.layouts.master')
@section('title','Create Slider')
@push('links')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/plugins/forms/switch.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/summernote/dist/summernote.css')}}"/>
@endpush
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Notification Create</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            @can('add_notification')
                <a href="{{ route('admin.notification.create') }}" class="btn btn-primary btn-sm">Add Notification</a>
            @endcan
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
         
        {!! Form::open(['route'=>'admin.'.request()->segment(2).'.store','files'=>true]) !!}
        <div class="form-group">
            <label for="status">Select</label>
            {{ Form::select('status',['1'=>'All','2'=>'few'],null,['class'=>'form-control field','onChange'=>'userType(this)']) }}
            <p class="text-danger">{{$errors->first('status')}}</p>
        </div>
        <div class="form-group devicelist" style='display:none;'>
            {!! Form::label('Device List', '', []) !!}
            {!! Form::select('devicelist', [], null, ['class'=>'form-control','style'=>'width:100%','id'=>'select2Ajax','multiple'=>true]) !!}
        </div>

         <div class="form-group">
            <label for="name">Title</label>
            {{ Form::text('title',null,['class'=>'form-control']) }}
            <p class="text-danger">{{$errors->first('title')}}</p>
        </div>
        <div class="form-group">
            <label for="name">Message</label>
            {{ Form::textarea('message',null,['class'=>'form-control']) }}
            <p class="text-danger">{{$errors->first('message')}}</p>
        </div>
        <div class="form-group all">
            {!! Form::label('Image',null, []) !!}
            {{ Form::file('image',['class'=>'form-control']) }}
            
        </div>
        <div class="form-group pull-right">
            <button type="submit" class="btn btn-info">Send Notification</button>
        </div>
        {!! Form::close() !!}

        </div>
             
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('admin-assets/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
  type="text/javascript"></script>
<script src="{{asset('admin-assets/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/dropify/dropify.js')}}"></script>
<script src="{{asset('admin-assets/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('admin-assets/app-assets/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-assets/summernote/dist/summernote.js')}}"></script>
<script type="text/javascript">
 jQuery(document).ready(function() {



        $('.summernote').summernote({

height: 350, // set editor height

minHeight: null, // set minimum height of editor

maxHeight: null, // set maximum height of editor

focus: false, // set focus to editable area after initializing summernote

popover: { image: [], link: [], air: [] }

});



        $('.inline-editor').summernote({

            airMode: true

        });



    });
 </script>

@endpush