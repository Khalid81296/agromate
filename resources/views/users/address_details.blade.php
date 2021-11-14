@extends('users/layout')
@section('page_titel',$page_title)
@section('dashboard_select','active')
@section('container')
<!-- <title>Address Details</title> -->

<div class="card card-custom col-10">
   <div class="card-header flex-wrap py-5">
      <div class="card-title">
         <h3 class="card-label"> {{ $page_title }} </h3>
      </div>
      @if(empty($address->shipping_address) || empty($address->billing_address))
      <div class="card-toolbar">
         <a href="{{ route('user.creat_address') }}" class="btn btn-sm btn-primary font-weight-bolder">
            <i class="la la-list"></i> Add Address
         </a>
      </div>
      @endif
   </div>
 
   <div class="card-body">
      <div class="d-flex mb-3">
         <span class="text-dark-100 flex-root font-weight-bold font-size-h6">Shipping Address :</span>
         <span class="text-dark flex-root font-weight-bolder font-size-h6 ml-3">{{ $address->shipping_address }}</span>
      </div>
      <div class="d-flex mb-3">
         <span class="text-dark-100 flex-root font-weight-bold font-size-h6">Billing Address :</span>
         <span class="text-dark flex-root font-weight-bolder font-size-h6 ml-3">{{ $address->billing_address }}</span>
      </div>
     
   </div>
</div>


@endsection


<!-- end document-->