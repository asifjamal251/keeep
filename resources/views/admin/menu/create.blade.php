@extends('employee.layouts.master')
@section('title','Create Menu')
@section('head')
    <div class="page-head">
        <h3 class="m-b-less">
            Create Menu
        </h3>
    </div>
@endsection
@section('main')
<section class="wrapper main-wrapper" style=''>
    <div class="clearfix"></div>
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['route'=>'employee.menu.store']) !!}
                        <div class="form-group">
                            {!! Form::label('menu_name', 'Menu Name', ['class'=>'control-label']) !!}
                        {!! Form::text('menu_name', null, ['class'=>'form-control']) !!}
                        <b class="text-danger">{{$errors->first('menu_name')}}</b>
                        </div>


                        <div class="form-group">
                            {!! Form::label('icon', 'Icon', ['class'=>'control-label']) !!}
                            {!! Form::text('icon', null, ['class'=>'form-control']) !!}
                            <b class="text-danger">{{$errors->first('icon')}}</b>
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status', ['class'=>'control-label']) !!}
                        {!! Form::select('status', array(1 => 'Active', '0' => 'Deactive'), null, array('class' => 'form-control')); !!}
                        <b class="text-danger">{{$errors->first('status')}}</b>
                        </div>                       
                    
                    <div class="form-group">
                        <button class="btn btn-success pull-right">Create</button>
                        <a style=" margin-right: 14px;padding: 7px;width: 71px;background: #dcd7d7;" class="btn btn-default pull-right" id="back">Back</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
</section>
@endsection
@push('scripts')
<script>
  $("#back").click(function(){
    window.location.href="{{ route('employee.'.request()->segment(2).'.index') }}"
  });
</script>
@endpush
