@extends('admin/layout')
@section('page_titel','Edit Coupon')
@section('coupon_select','active')
@section('container')
<br>
<a href="coupon" style="float: right;"> <button  class="btn btn-success">Back</button></a>
<form method="post" action="{{route('update.coupon')}}">
	@csrf
	<input type="hidden" name="id" value="{{$coupon->id}}">
    <div class="col-lg-6">
	    <div class="card">
	    	
	        <div class="card-header">
	            <strong>Manage</strong>
	            <small> Coupon</small>
	        </div>
	        <div class="card-body card-block">
	            <div class="form-group">
	                <label for="title" class=" form-control-label">Title</label>
	                <input type="text" id="title" name="title" class="form-control" value="{{$coupon->title}}">
	            </div>
	            <div class="form-group">
	                <label for="code" class=" form-control-label">Code</label>
	                <input type="text" id="code" name="code" class="form-control" value="{{$coupon->code}}">
	            </div>
	            <div class="form-group">
	                <label for="value" class=" form-control-label">Value</label>
	                <input type="text" id="value" name="value"  class="form-control" value="{{$coupon->value}}">
	            </div> 
	        </div>
	        <button class="btn btn-success">Submit</button>
	    </div>
    </div>
</form>

@endsection