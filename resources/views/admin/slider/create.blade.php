@extends('admin.layouts.master')
@section('title','Create Slider')
@push('links')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/plugins/forms/switch.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/dropify/css/dropify.min.css')}}">
@endpush
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Slider Create</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            @can('add_slider')
                <a href="{{ route('admin.slider.create') }}" class="btn btn-primary btn-sm">Add Slider</a>
            @endcan
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
          {!! Form::open(['method' => 'POST', 'route' => 'admin.slider.store', 'class' => 'form-horizontal','files'=>true]) !!}

            <div class="row my-1">
                <div class="col-lg-7 col-7">

                    
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'title']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                            {!! Form::label('sub_title', 'Sub Title') !!}
                            {!! Form::text('sub_title', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Sub title']) !!}
                            <small class="text-danger">{{ $errors->first('sub_title') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('button_text') ? ' has-error' : '' }}">
                            {!! Form::label('button_text', 'Text On Button') !!}
                            {!! Form::text('button_text', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Text On Button']) !!}
                            <small class="text-danger">{{ $errors->first('button_text') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('button_link') ? ' has-error' : '' }}">
                            {!! Form::label('button_link', 'Link On Button') !!}
                            {!! Form::text('button_link', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Link On Button']) !!}
                            <small class="text-danger">{{ $errors->first('button_link') }}</small>
                        </div>
                    
                        <div class="btn-group">
                            {!! Form::submit("Add Slider", ['class' => 'btn btn-info']) !!}
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

                            {!! Form::label('image', 'Slider Image') !!}

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
<script src="{{asset('admin-assets/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
  type="text/javascript"></script>
<script src="{{asset('admin-assets/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/dropify/dropify.js')}}"></script>
<script src="{{asset('admin-assets/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('admin-assets/app-assets/js/scripts/forms/switch.js')}}" type="text/javascript"></script>

<script type="text/javascript">

 </script>

@endpush