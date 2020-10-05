@extends('admin.layout.master')
@section('title','Dashboard')

@section('content')
<section class="wrapper main-wrapper" style=''>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Edit Unit</h1> </div>
            <div class="pull-right hidden-xs">
                <ol class="breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i>Home</a>
                    </li>
                   
                    <li class="active">
                        <strong>Edit Unit</strong>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
     {!! Form::open(['route'=>['admin.'.request()->segment(2).'.update',$unit->id],'method'=>'put']) !!}
   

  

   <div class="form-group">
    <label for="name">Unit Name</label>
  {{ Form::text('unit_name',$unit->name,['class'=>'form-control']) }}
    <p class="text-danger">{{$errors->first('unit_name')}}</p>
  </div>
    <div class="form-group">
    <label for="name">Unit Symbol</label>
  {{ Form::text('unit_symbol',$unit->symb,['class'=>'form-control']) }}
    <p class="text-danger">{{$errors->first('unit_symbol')}}</p>
  </div>
  
  <div class="form-group">
   <button type="submit" class="btn btn-info">Update Unit</button>
    </div>
{!! Form::close() !!}
</section>
@endsection
