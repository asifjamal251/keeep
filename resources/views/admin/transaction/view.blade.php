@extends('admin.layouts.master')
@section('title','Transaction')
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Transaction</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
           {{--  @can('add_slider')
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary btn-sm">Add Post</a>
            @endcan --}}
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Transaction Details</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <table id="dataTableAjax" class="display table" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{'trx'.$transaction->id}}
                                </td>
                                <td>
                                    {{$transaction->user->name}}
                                </td>
                                <td>
                                    {{$transaction->user->email}}
                                </td>
                                <td>
                                    {{$transaction->transactionType->name}}
                                </td>
                                <td>
                                    {{$transaction->amount}}
                                </td>
                                <td>
                                    {{$transaction->status}}
                                </td>
                                <td>
                                    {{$transaction->created_at->format('d F Y | h:s A')}}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
             
    </div>
</div>



@if($transaction->orderItems->count() > 0)


@php
    $shipping = App\Model\UserAddress::find($transaction->order->shipping_id);
@endphp






<div class="card">

    <div class="card-header">
        <h4 class="card-title">Order Details</h4>
    </div>


    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">


                    <table id="dataTableAjax" class="display table" >
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>
                                    {{$transaction->order->id}}
                                </td>

                                <td>
                                    ${{$transaction->order->shipping_charge}}
                                </td>

                                <td>
                                    ${{$transaction->order->discount}}
                                </td>

                                <td>
                                    ${{$transaction->order->shipping_charge}}
                                </td>

                                <td>
                                    {{$transaction->status}}
                                </td>

                                <td>
                                    {{$transaction->order->created_at->format('d F Y | h:s A')}}
                                </td>
                                
                            </tr>

                        </tbody>
                    </table>



                </div>
            </div>


            <div class="table-responsive">
            <table class="table table-column">
                <thead>
                    <tr>
                        <th>Billing Details</th>
                        <th>Shipping Details</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Name: {{$shipping->name}}</td>
                        <td>Name: {{$shipping->name}}</td>
                    </tr>
                    <tr>
                        <td>Email: {{$shipping->email}}</td>
                        <td>Email: {{$shipping->email}}</td>
                    </tr>

                    <tr>
                        <td>Mobile: {{$shipping->mobile}}</td>
                        <td>Mobile: {{$shipping->mobile}}</td>
                    </tr>

                    <tr>
                        <td>Address: {{$shipping->address}}</td>
                        <td>Address: {{$shipping->address}}</td>
                    </tr>
                    <tr>
                        <td>State: {{$shipping->state}}</td>
                        <td>State: {{$shipping->state}}</td>
                    </tr>
                    <tr>
                        <td>City: {{$shipping->city}}</td>
                        <td>City: {{$shipping->city}}</td>
                    </tr>

                </tbody>
            </table>
        </div>


        </div>
    </div>
</div>


<div class="card">

    <div class="card-header">
        <h4 class="card-title">Order Item Details</h4>
    </div>


    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">


                    <table id="dataTableAjax" class="display table" >
                        <thead>
                            <tr>
                                <th>Si</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Shipping Charge</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction->orderItems as $item)
                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>

                                <td>
                                    <img width="80" src="{{asset($item->image)}}">
                                </td>

                                <td>
                                    {{$item->qty}}
                                </td>

                                <td>
                                    ${{$item->shipping_charge}}
                                </td>

                                <td>
                                    {{$item->created_at->format('d F Y | h:s A')}}
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endif



@if($transaction->keep != '' or $transaction->keep != null)
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    <img src="{{ asset($transaction->keep->image) }}">

                </div>
            </div>
        </div>
    </div>
</div>
@endif



@if($transaction->transaction_type_id == 2)
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-12 col-12">

                    fgfgdfg

                </div>
            </div>
        </div>
    </div>
</div>
@endif





@endsection


@push('scripts')





@endpush