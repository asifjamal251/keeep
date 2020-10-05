@extends('admin.layouts.master')
@section('title','Change Password')
@push('links')

@endpush
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Change Password</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        {{-- <div class="btn-group" role="group">
            @can('add_slider')
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary btn-sm">Add Post</a>
            @endcan
       </div> --}}
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            {!! Form::open(['route'=>['admin.change-password'],'method'=>'put','files'=>true,'autocomplete' => 'off']) !!}

            <div style="width: 400px; margin: 0 auto;">

                <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">

                    {!! Form::label('current_password', 'Current Password') !!}

                    {!! Form::password('current_password', ['class' => 'form-control', 'required' => 'required','placeholder'=>'Current Password']) !!}

                    <small class="text-danger">{{ $errors->first('current_password') }}</small>

                </div>

                <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">

                    {!! Form::label('new_password', 'New Password') !!}

                    {!! Form::password('new_password', ['class' => 'form-control', 'required' => 'required','placeholder'=>'New Password']) !!}

                    <small class="text-danger">{{ $errors->first('new_password') }}</small>

                </div>

                <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">

                    {!! Form::label('new_password_confirmation', 'Confirm Password') !!}

                    {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'required' => 'required','placeholder'=>'Confirm Password','autocomplete'=>'off']) !!}

                    <small class="text-danger">{{ $errors->first('new_password_confirmation') }}</small>

                </div>

                <button href="#" class="btn btn-primary" type="submit" id="password_modal_save">Change Password</button>
            </div>


            {!! Form::close() !!}

        </div>
             
    </div>
</div>
@endsection
@push('scripts')


<script type="text/javascript">

   
 </script>

@endpush