{{-- {{ dd(str_singular(str_plural('menus'))) }} --}}
@extends('employee.layouts.master')
@section('title','Edit Menu')
@section('head')
<div class="page-head">
                <h3 class="m-b-less">
                    Edit Menu
                </h3>
</div>
@endsection
@section('main')
<section class="wrapper main-wrapper" style=''>   
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['route'=>['employee.menu.update', $menu->slug], 'method'=>'put','id'=>'menuForm']) !!}
                        <div class="form-group">
                            {!! Form::label('menu_name', 'Menu Name', ['class'=>'control-label']) !!}
                        {!! Form::text('menu_name', $menu->name, ['class'=>'form-control']) !!}
                        <b class="text-danger">{{$errors->first('menu_name')}}</b>
                        </div>


                        <div class="form-group">
                            {!! Form::label('icon', 'Icon', ['class'=>'control-label']) !!}
                            {!! Form::text('icon', $menu->icon, ['class'=>'form-control']) !!}
                            <b class="text-danger">{{$errors->first('icon')}}</b>
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status', ['class'=>'control-label']) !!}
                        {!! Form::select('status', array(1 => 'Active', '0' => 'Deactive'), $menu->status, array('class' => 'form-control')); !!}
                        <b class="text-danger">{{$errors->first('status')}}</b>
                        </div>                       
                    <div class="form-group">
                        <input type="hidden" name="slug" value="{{ $menu->slug }}" />
                        <button type="submit" onclick="submitForm()" class="btn btn-success pull-right">Update</button>
                        <a style=" margin-right: 14px;padding: 7px;width: 71px;background: #dcd7d7;" class="btn btn-default pull-right" id="back">Back</a>
                  </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
</section>
@endsection
@push('scripts')
<script type="text/javascript">
$("#back").click(function(){
    window.location.href="{{ route('employee.menu.index') }}"
  });
</script>
@endpush