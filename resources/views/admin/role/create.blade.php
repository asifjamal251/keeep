@extends('admin.layouts.master')
@section('title','Create Role')
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">Role</h3>
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

                    {!! Form::open(['route'=>'admin.role.store']) !!}
                        <div class="form-group">
                            <label for="">Name</label>
                            {!! Form::text('name', '' , ['class'=>'form-control']) !!}
                             <b class="text-danger">{{$errors->first('name')}}</b>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success pull-right">Create</button>
                            <a style=" margin-right: 14px;padding: 7px;width: 71px;background: #dcd7d7;" class="btn btn-default pull-right" id="back">Back</a>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
             
    </div>
</div>



@endsection


@push('scripts')


@endpush