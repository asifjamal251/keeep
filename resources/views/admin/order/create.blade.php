@extends('admin.layouts.master')
@section('title','Create Post')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('admin-assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
<style type="text/css">
    .dropify-wrapper{
        height: 217px;
    }
</style>
@endpush
@section('main')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">{{ucfirst(str_singular(request()->segment(2)))}}</h5>
    </div>
    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            @can('browse_'.ucfirst(str_singular(request()->segment(2))))
                <a href="{{ route('admin.'.request()->segment(2).'.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-list"></i> {{ucfirst(str_singular(request()->segment(2)))}} List</a>
            @endcan
       </div>
    </div>
</div>
</div>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.'.request()->segment(2).'.store','files'=>true]) !!}
               <div class="row">

                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group {{ $errors->has('job_no') ? ' has-error' : '' }}">
                            {!! Form::label('job_no', 'Job No') !!}
                            {!! Form::text('job_no', null, ['class' => 'form-control', 'placeholder' => 'Job No']) !!}
                            <small class="text-danger">{{ $errors->first('job_no') }}</small>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            {!! Form::label('company', 'Select Company') !!}
                            {!! Form::select('company', App\Model\Company::orderBy('name','asc')->pluck('name','name'), null, ['id' => 'company', 'class' => 'form-control', 'placeholder' => 'Select Company']) !!}
                            <small class="text-danger">{{ $errors->first('company') }}</small>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('paper') ? ' has-error' : '' }}">
                            {!! Form::label('paper', 'Paper') !!}
                            {!! Form::text('paper', null, ['class' => 'form-control', 'placeholder' => 'Paper']) !!}
                            <small class="text-danger">{{ $errors->first('paper') }}</small>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('cartan_name') ? ' has-error' : '' }}">
                            {!! Form::label('cartan_name', 'Cartan Name') !!}
                            {!! Form::text('cartan_name', null, ['class' => 'form-control', 'placeholder' => 'Cartan Name']) !!}
                            <small class="text-danger">{{ $errors->first('cartan_name') }}</small>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('cartan_quantity') ? ' has-error' : '' }}">
                            {!! Form::label('cartan_quantity', 'Cartan Quantity') !!}
                            {!! Form::text('cartan_quantity', null, ['class' => 'form-control', 'placeholder' => 'Cartan Quantity']) !!}
                            <small class="text-danger">{{ $errors->first('cartan_quantity') }}</small>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('colour') ? ' has-error' : '' }}">
                            {!! Form::label('colour', 'Colour') !!}
                            {!! Form::text('colour', null, ['class' => 'form-control', 'placeholder' => 'Colour']) !!}
                            <small class="text-danger">{{ $errors->first('colour') }}</small>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('cutsize') ? ' has-error' : '' }}">
                            {!! Form::label('cutsize', 'Cutsize') !!}
                            {!! Form::text('cutsize', null, ['class' => 'form-control', 'placeholder' => 'Cutsize']) !!}
                            <small class="text-danger">{{ $errors->first('cutsize') }}</small>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('po_date') ? ' has-error' : '' }}">
                            {!! Form::label('po_date', 'PO Date') !!}
                            {!! Form::text('po_date', null, ['class' => 'datePic form-control', 'placeholder' => 'PO Date','data-provide'=>'datepicker','data-date-autoclose'=>'true']) !!}
                            <small class="text-danger">{{ $errors->first('po_date') }}</small>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('po_number') ? ' has-error' : '' }}">
                            {!! Form::label('po_number', 'PO Number') !!}
                            {!! Form::text('po_number', null, ['class' => 'form-control', 'placeholder' => 'PO Number']) !!}
                            <small class="text-danger">{{ $errors->first('po_number') }}</small>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('die_no') ? ' has-error' : '' }}">
                            {!! Form::label('die_no', 'Die No.') !!}
                            {!! Form::text('die_no', null, ['class' => 'form-control', 'placeholder' => 'Die No.']) !!}
                            <small class="text-danger">{{ $errors->first('die_no') }}</small>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('coating') ? ' has-error' : '' }}">
                            {!! Form::label('coating', 'Coating') !!}
                            {!! Form::text('coating', null, ['class' => 'form-control', 'placeholder' => 'Coating']) !!}
                            <small class="text-danger">{{ $errors->first('coating') }}</small>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <div class="form-group{{ $errors->has('coating_machine') ? ' has-error' : '' }}">
                            {!! Form::label('coating_machine', 'Select Coating Machine') !!}
                            {!! Form::select('coating_machine',['dominent'=>'Dominent','lamination'=>'Lamination'], null, ['class' => 'form-control', 'placeholder' => 'Select Coating Machine']) !!}
                            <small class="text-danger">{{ $errors->first('coating_machine') }}</small>
                        </div>
                    </div>

                    <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-5">

                            <div class="form-group{{ $errors->has('embossing_leafing') ? ' has-error' : '' }}">
                                {!! Form::label('embossing_leafing', 'Select Embossing/Leafing') !!}
                                {!! Form::select('embossing_leafing',['embossing'=>'Embossing','leafing'=>'leafing','both'=>'Both','none'=>'none'], null, ['class' => 'form-control', 'placeholder' => 'Select Embossing/Leafing']) !!}
                                <small class="text-danger">{{ $errors->first('embossing_leafing') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('printing_machine') ? ' has-error' : '' }}">
                                {!! Form::label('printing_machine', 'Select Printing Machine') !!}
                                {!! Form::select('printing_machine',['heidleberg'=>'Heidleberg','dominent'=>'Dominent'], null, ['class' => 'form-control', 'placeholder' => 'Select Printing Machine']) !!}
                                <small class="text-danger">{{ $errors->first('printing_machine') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('total_sheet') ? ' has-error' : '' }}">
                                {!! Form::label('total_sheet', 'Total Sheet') !!}
                                {!! Form::text('total_sheet', null, ['class' => 'form-control', 'placeholder' => 'Total Sheet']) !!}
                                <small class="text-danger">{{ $errors->first('total_sheet') }}</small>
                            </div>
                        </div>

                        <div class="col-md-7">

                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                {!! Form::label('file', 'File') !!}
                                {!! Form::file('file', ['class' => 'dropify']) !!}
                                <small class="text-danger">{{ $errors->first('file') }}</small>
                            </div>
                        </div>


                        </div>
                    </div>

                    
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                        {!! Form::submit('Save Project Details', ['class' => 'btn btn-info']) !!}
                    </div>
                   </div>
                    {!! Form::hidden('role_id', 3) !!}
               </div>
            {!! Form::close() !!}
        </div>
             
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('admin-assets/dropify/js/dropify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin-assets/dropify/dropify.js')}}"></script>
<script src="{{asset('admin-assets/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
 
$('.datePic').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight: true,
    autoClose:true,
});
 </script>
@endpush