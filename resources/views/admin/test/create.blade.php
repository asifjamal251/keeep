@extends('admin.layout.master')
@section('title','Dashboard')

@section('content')
<section class="wrapper main-wrapper" style=''>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Add Unit</h1> </div>
            <div class="pull-right hidden-xs">
                <ol class="breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i>Home</a>
                    </li>
                   
                    <li class="active">
                        <strong>Add Unit</strong>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
  {!! Form::open(['route'=>'admin.'.request()->segment(2).'.store']) !!}
   <div class="form-group">
    <label for="unit_name">Unit Name</label>
	{{ Form::text('unit_name',null,['class'=>'form-control']) }}
		<p class="text-danger">{{$errors->first('unit_name')}}</p>
  </div>
  <div class="form-group">
    <label for="unit_symbol">Unit Symbol</label>
	{{ Form::text('unit_symbol',null,['class'=>'form-control']) }}
		<p class="text-danger">{{$errors->first('unit_symbol')}}</p>
  </div>
  <div class="form-group">
   <button type="submit" class="btn btn-info">Add Unit</button>
    </div>
{!! Form::close() !!}
</section>

@endsection
@push('scripts')

@endpush
