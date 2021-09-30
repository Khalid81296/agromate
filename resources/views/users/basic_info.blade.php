@extends('users/layout')
@section('dashboard_select','active')
@section('container')
<!-- <h1>DashBoard</h1> -->

<div class="card card-custom col-7">
   <div class="card-header flex-wrap py-5">
      <div class="card-title">
         <h3 class="card-label"> {{ $page_title }} </h3>
      </div>
      <div class="card-toolbar">
         <a href="" class="btn btn-sm btn-primary font-weight-bolder">
            <i class="la la-list"></i> Back
         </a>
      </div>
   </div>
 
   <div class="card-body">
      <div class="d-flex mb-3">
         <span class="text-dark-100 flex-root font-weight-bold font-size-h6">First Name: </span> 
         <span class="text-dark flex-root font-weight-bolder font-size-h6 ml-3">{{ $info->fname}}</span>
      </div>
      <div class="d-flex mb-3">
         <span class="text-dark-100 flex-root font-weight-bold font-size-h6">Last Name: </span>
         <span class="text-dark flex-root font-weight-bolder font-size-h6 ml-3">{{ $info->lname }}</span>
      </div>
      <div class="d-flex mb-3">
         <span class="text-dark-100 flex-root font-weight-bold font-size-h6">User Name: </span>
         <span class="text-dark flex-root font-weight-bolder font-size-h6 ml-3">{{ $info->username }}</span>
      </div>
      <div class="d-flex mb-3">
         <span class="text-dark-100 flex-root font-weight-bold font-size-h6">Mobile No: </span>
         <span class="text-dark flex-root font-weight-bolder font-size-h6 ml-3">{{ $info->mobile_no }}</span>
      </div>
      <div class="d-flex mb-3">
         <span class="text-dark-100 flex-root font-weight-bold font-size-h6">Email: </span>
         <span class="text-dark flex-root font-weight-bolder font-size-h6 ml-3">{{ $info->email }}</span>
      </div>
    
   </div>
</div>


@endsection


<!-- end document-->