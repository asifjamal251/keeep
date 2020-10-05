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
      <h5 class="content-header-title mb-0">Portfolio Create</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            @can('add_slider')
                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary btn-sm">Add Portfolio</a>
            @endcan
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
          {!! Form::open(['route'=>['admin.'.request()->segment(2).'.update',$portfolio->id],'method'=>'put','files'=>true]) !!}

            <div class="row my-1">
                <div class="col-lg-7 col-7">

                    
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', $portfolio->title, ['class' => 'form-control', 'required' => 'required','placeholder'=>'title']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('technology') ? ' has-error' : '' }}">
                            {!! Form::label('technology', 'Technology') !!}
                            {!! Form::text('technology', $portfolio->technology, ['class' => 'form-control', 'placeholder' => 'Technology']) !!}
                            <small class="text-danger">{{ $errors->first('technology') }}</small>
                        </div>


                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            {!! Form::label('content', 'Content') !!}
                            {!! Form::textarea('content', $portfolio->content, ['class' => 'form-control summernote', 'placeholder' => 'Content']) !!}
                            <small class="text-danger">{{ $errors->first('content') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('client_say') ? ' has-error' : '' }}">
                            {!! Form::label('client_say', 'Client Say') !!}
                            {!! Form::textarea('client_say', $portfolio->client_say, ['class' => 'form-control summernote', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('client_say') }}</small>
                        </div>
                    
                        <div class="btn-group">
                            {!! Form::submit("Update Portfolio", ['class' => 'btn btn-info']) !!}
                        </div>
                    

                </div>

                <div class="col-lg-5 col-5">

                    
                   
                    <div class="form-group">
                        <div class="checkbox{{ $errors->has('status') ? ' has-error' : '' }}">
                            {!! Form::label('status', 'Status') !!}<br>
                             {!! Form::checkbox('status', '1', $portfolio->status, ['id' => 'switch1','class'=>'switch']) !!} 
                        </div>
                        <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('completed_on') ? ' has-error' : '' }}">
                        {!! Form::label('completed_on', 'Completed on') !!}
                        {!! Form::text('completed_on', $portfolio->completed_on, ['class' => 'form-control', 'placeholder' => 'Completed on']) !!}
                        <small class="text-danger">{{ $errors->first('completed_on') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('skills') ? ' has-error' : '' }}">
                        {!! Form::label('skills', 'Skills') !!}
                        {!! Form::text('skills', $portfolio->skills, ['class' => 'form-control', 'placeholder' => 'HTML / CSS / jQuery']) !!}
                        <small class="text-danger">{{ $errors->first('skills') }}</small>
                    </div>


                    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                        {!! Form::label('url', 'Site URL') !!}
                        {!! Form::text('url', $portfolio->url, ['class' => 'form-control', 'placeholder' => 'https://www.rainbowsoftsolutions.com']) !!}
                        <small class="text-danger">{{ $errors->first('url') }}</small>
                    </div>


                  <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">

                            {!! Form::label('image', 'Portfolio Image') !!}

                            {!! Form::file('image', ['class'=>'dropify','data-default-file'=>asset($portfolio->image)]) !!}

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