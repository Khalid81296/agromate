@extends('admin/layout')
@section('page_titel','Edit Category')
@section('category_select','active')
@section('container')
<br>
<a href="{{ url('admin/category') }}" style="float: right;"> <button  class="btn btn-success">Back</button></a>
<form method="post" action="{{route('update.product')}}">
	@csrf
	<input type="hidden" name="id" value="{{$category->id}}">
    <div class="col-lg-6">
	    <div class="card">
	    	
	        <div class="card-header">
	            <strong>Manage</strong>
	            <small> Category</small>
	        </div>
	        <div class="card-body card-block">
	            <div class="form-group">
	                <label for="type" class=" form-control-label">Type</label>
	                <input type="text" id="type" name="type" class="form-control" value="{{$category->type}}">
	            </div>
	            <div class="form-group">
	                <label for="description" class=" form-control-label">Description</label>
	                <input type="text" id="description" name="description" class="form-control" value="{{$category->description}}">
	            </div>
	            <div class="form-group">
	                <label for="status" class=" form-control-label">Status</label>
	                <input type="text" id="status" name="status"  class="form-control" value="{{$category->status}}">
	            </div>
	            <div class="row form-group">
	                <div class="col-8">
	                    <div class="form-group">
	                        <label for="price" class=" form-control-label">Price</label>
	                        <input type="text" name="price" id="price" class="form-control" value="{{$category->price}}">
	                    </div>
	                </div>
	        </div>
	        <button class="btn btn-success">Submit</button>
	    </div>
    </div>
</form>

@endsection