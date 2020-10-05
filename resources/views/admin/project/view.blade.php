@extends('admin.layout.master')
@section('title','Dashboard')
@section('head')
<div class="page-head">
    <h3 class="m-b-less">
    Contact Details
    </h3>
</div>
@endsection
@section('content')
<section class="wrapper main-wrapper" style=''>
   
    <div class="clearfix"></div>
    
   

  

   <div class="form-group">
    <label for="name">Name :- {{ $contact->name }}</label>
 
  </div>

   <div class="form-group">
    <label for="name">Subject :- {{ $contact->subject }}</label>
 
  </div>

    <div class="form-group">
    <label for="name">Mobile:- {{ $contact->mobile }}</label>
  
  </div>

    <div class="form-group">
    <label for="name">Email:- {{ $contact->email }}</label>
  
  </div>
 
    <div class="form-group">
    <label for="name">Message:- {{ $contact->message }}</label>
  
  </div>
  
  

</section>
@endsection
