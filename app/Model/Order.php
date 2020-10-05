<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function statusname(){
        return $this->hasOne(Status::class,'id','status');
    }

    public function orderId($value){
        return 'peeaco'.$value;
    }

    public function shippingAddress(){
    	return $this->hasOne(OrderShippingAddress::class, 'id', 'shipping_id');
    }

    public function billingAddress() {
        return $this->hasOne(OrderBillingAddress::class,'id','order_id');
    }

    public function cartData(){
    	return $this->hasMany(CartData::class);
    }

    

    public function orderStatus(){
    	return $this->belongsTo(OrderStatus::class,'id','order_id')->orderBy('id','desc');
    }

    // public function statusname(){
    //     return $this->belongsTo(Status::class,'status','id');
    // }
    
    public function ordStatus(){
        return $this->hasMany(OrderStatus::class);
    }

    // public function payStatus(){
    //     return $this->belongsTo(PaymentResponse::class,'id','order_id');
    // }

    public function UsedCoupen(){
        return $this->belongsTo(UsedCoupen::class,'id','order_id');
    }

    public function coupen(){
        return $this->belongsTo(OfferCoupen::class,'coupen_id','id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function cnfShipping() {
        return $this->hasOne(ShippingAddress::class,'id','shipping_id');
    }

    
}
