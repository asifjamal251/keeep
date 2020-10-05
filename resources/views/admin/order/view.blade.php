@extends('admin.layouts.master')
@section('title','List Order')
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Order No.: </h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <div class="form-group">
                <select id="status" class="form-control" onchange="status(this)" name="status"><option selected="selected" value="">Select Status</option><option value="1">Processed</option><option value="0">Unprocess</option><option value="2">Assign</option></select>
                <small class="text-danger"></small>
            </div>
       </div>
    </div>
        
</div>



</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <table id="dataTableAjax" class="display dataTableAjax table table-striped table-bordered dom-jQuery-events" >
                        <thead>
                            <tr>
                                <th>Si</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Shipping Charge</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td><img src="{{ asset($item->image) }}" width="50"></td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->shipping_charge}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>

                </div>





            </div>
        </div>
             
    </div>
</div>



@endsection


@push('scripts')


@endpush