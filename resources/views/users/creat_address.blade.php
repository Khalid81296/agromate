@extends('users/layout')
@section('dashboard_select','active')
@section('container')
<!-- <h1>DashBoard</h1> -->

<div class="card card-custom col-12">
   <div class="card-header flex-wrap py-5">
      <div class="card-title">
         <h3 class="card-label"> {{ $page_title }} </h3>
      </div>
      <div class="card-toolbar">
         <a href="{{ route('user.address_details', Auth::user()->id) }}" class="btn btn-sm btn-primary font-weight-bolder">
            <i class="la la-list"></i> Back
         </a>
      </div>
   </div>
   <form action="{{route('user.save_address')}}" method="post">
      @csrf
      <div class="card-body">
         <div class="d-flex mb-3 col-lg-6 row">
            <label class="text-dark-100 flex-root font-weight-bold font-size-h6">Shipping Address</label>
             <textarea name="shipping_address" class="form-control" id="shipping_address" rows="2" spellcheck="false"></textarea>
            
         </div>
         <div class="d-flex mb-3 col-lg-6 row">
            <label class="text-dark-100 flex-root font-weight-bold font-size-h6">Billing Address</label>
             <textarea name="billing_address" class="form-control" id="billing_address" rows="2" spellcheck="false"></textarea>
         </div>
      </div>
      <div class="col-lg-2"><button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Submit</button></div>
   </form>

 
<!--    <div class="card-body row">
      <div class="d-flex mb-3 col-lg-6">
         <textarea name="shipping_address" class="form-control" id="shipping_address" rows="2" spellcheck="false"></textarea>
         
      </div>
      <div class="d-flex mb-3 col-lg-6">
        <textarea name="billing_address" class="form-control" id="billing_address" rows="2" spellcheck="false"></textarea>
         
      </div>
     
   </div> -->
</div>


@endsection


<!-- end document-->