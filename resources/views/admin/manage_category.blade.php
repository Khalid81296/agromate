@extends('admin/layout')
@section('page_titel','Manage Category')
@section('category_select','active')
@section('container')
<br>
<a href="category" style="float: right;"> <button  class="btn btn-success">Back</button></a>
<form method="post" action="{{route('save.product')}}">
	@csrf
    <div class="col-lg-6">
	    <div class="card">
	    	
	        <div class="card-header">
	            <strong>Add</strong>
	            <small> Category</small>
	        </div>
	        <div class="card-body card-block">
	            <div class="form-group">
	                <label for="type" class=" form-control-label">Type</label>
	                <input type="text" id="type" name="type" placeholder="Enter your product type" class="form-control">
	            </div>
	            <div class="form-group">
	                <label for="description" class=" form-control-label">Description</label>
	                <input type="text" id="description" name="description" placeholder="Enter Description" class="form-control">
	            </div>
	            <div class="row form-group">
	                <div class="col-8">
	                    <div class="form-group">
	                        <label for="price" class=" form-control-label">Price</label>
	                        <input type="text" name="price" id="price" placeholder="Enter product price" class="form-control">
	                    </div>
	                </div>
	        </div>
	        <button class="btn btn-success">Submit</button>
	    </div>
    </div>
</form>

@endsection