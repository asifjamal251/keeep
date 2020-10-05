@extends('admin.layouts.master')
@section('title','Keep')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/dropify/css/dropify.min.css')}}">
<style type="text/css">
    button.dropify-clear {
        display: none!important;
    }
</style>
@endpush
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Edit User Image</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
                   
       </div>
    </div>
</div>
</div>


          {!! Form::open(['route'=>['admin.backlog.update',@$backlog->id],'method'=>'put','files'=>true]) !!}

            <div class="row my-1">
                <div class="col-lg-6 col-6">

                    <div class="card text-white bg-danger">
                        <div class="card-content">

                            <div class="card-header" id="heading-links">
                              <h4 class="card-title">Unprocess Image</h4>
                            </div>


                         <div class="card-body">


                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">

                                {!! Form::file('image', ['id'=>'backlog_img','class'=>'dropify','data-default-file'=>asset($backlog->image)]) !!}

                                <small class="text-danger">{{ $errors->first('image') }}</small>

                        </div>

                       
                       
                        <a id="dd" href="{{asset($backlog->image)}}" class="btn btn-danger btn-darken-3" download>Download Image</a>

                        </div>

                        </div>
                        </div>
                         </div>



                         <div class="col-lg-6 col-6">

                            <div class="card text-white bg-primary">
                        <div class="card-content">

                            <div class="card-header" id="heading-links">
                              <h4 class="card-title">Processed Image</h4>
                            </div>

                         <div class="card-body">


                         <div class="form-group {{ $errors->has('image_keey') ? ' has-error' : '' }}">
                            @if(@$keep->image != '')
                                {!! Form::file('image_keep', ['id'=>'keep_img','class'=>'dropify','data-default-file'=>asset(@$keep->image)]) !!}
                             @else
                             {!! Form::file('image_keep', ['id'=>'keep_img','class'=>'dropify']) !!}
                             @endif

                                <small class="text-danger">{{ $errors->first('image_keep') }}</small>

                        </div>

                        {!! Form::hidden('backlog_id', $backlog->id) !!}
                        {!! Form::hidden('user_id', $backlog->user_id) !!}

                         <div class="btn-group">
                                {!! Form::submit("Update Image", ['class' => 'btn btn-primary btn-darken-3']) !!}
                        </div>




</div>
</div>
</div>
                    
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

@endpush