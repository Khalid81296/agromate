@extends('admin/layout')
@section('page_titel','Manage Coupon')
@section('coupon_select','active')
@section('container')
@php //print_r($errors->bags); //dd(1); @endphp
<br>
<a href="coupon" style="float: right;"> <button  class="btn btn-success">Back</button></a>

<form method="post" action="{{route('save.coupon')}}">
	@csrf
    <div class="col-lg-6">
	    <div class="card">
	    	
	        <div class="card-header">
	            <strong>Add</strong>
	            <small> Coupon</small>
	        </div>
	        <div class="card-body card-block">
	            <div class="form-group">
	                <label for="title" class=" form-control-label">Title</label>
	                <input type="text" id="title" name="title" placeholder="Enter your coupon title" class="form-control">
	                <span style="color: red">
	                	{{ $errors->first('title') }}
	                </span>
	            </div>
	            <div class="form-group">
	                <label for="code" class=" form-control-label">Code</label>
	                <input type="text" id="code" name="code" placeholder="Enter Code" class="form-control">
	                
				  	<span style="color: red">
				  		{{ $errors->first('code') }}
				  	</span>
				   
	                
	            </div>
	            <div class="row form-group">
	                <div class="col-8">
	                    <div class="form-group">
	                        <label for="value" class=" form-control-label">Value</label>
	                        <input type="text" name="value" id="value" placeholder="Enter coupon value" class="form-control">
	                        <span style="color: red">
	                        	{{ $errors->first('value') }}
	                        </span>
	                    </div>
	                </div>
	        </div>
	        <button class="btn btn-success">Submit</button>
	    </div>
    </div>
</form>

@endsection