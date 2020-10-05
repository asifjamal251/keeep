@extends('admin.layouts.master')
@section('title','Create Category')
@push('links')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/plugins/forms/switch.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/summernote/dist/summernote.css')}}"/>
@endpush
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Category Create</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            @can('add_slider')
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm">Add Category</a>
            @endcan
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
          {!! Form::open(['method' => 'POST', 'route' => 'admin.category.store', 'class' => 'form-horizontal','files'=>true]) !!}

            <div class="row my-1">
                <div class="col-lg-7 col-7">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Category Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Category']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>


                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            {!! Form::label('body', 'Content') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control summernote', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('body') }}</small>
                        </div>
                    
                        <div class="btn-group">
                            {!! Form::submit("Add Category", ['class' => 'btn btn-info']) !!}
                        </div>

                </div>

                <div class="col-lg-5 col-5">

                    
                    <div class="form-group">
                        <div class="checkbox{{ $errors->has('status') ? ' has-error' : '' }}">
                            {!! Form::label('status', 'Status') !!}<br>
                             {!! Form::checkbox('status', '1', 1, ['id' => 'switch1','class'=>'switch']) !!} 
                        </div>
                        <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>

                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">

                            {!! Form::label('image', 'Image') !!}

                            {!! Form::file('image', ['class'=>'dropify']) !!}

                            <small class="text-danger">{{ $errors->first('image') }}</small>

                    </div>
                    
                </div>
            </div>
            {!! Form::close() !!}

        </div>
             
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('admin-assets/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('admin-assets/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
  type="text/javascript"></script>
<script src="{{asset('admin-assets/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/dropify/dropify.js')}}"></script>
<script src="{{asset('admin-assets/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('admin-assets/app-assets/js/scripts/forms/switch.js')}}" type="text/javascript"></script>

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