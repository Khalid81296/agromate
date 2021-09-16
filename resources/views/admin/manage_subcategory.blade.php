@extends('admin/layout')
@section('category_select','active')
@section('container')
<br>
<a href="subcategory" style="float: right;"> <button  class="btn btn-success">Back</button></a>
<form method="post" action="{{route('save.subcategory')}}" enctype="multipart/form-data">
	@csrf
    <div class="col-lg-12">
	    <div class="card">
	    	
	        <div class="card-header">
	            <strong>{{ $page_title }} </strong>
	            <small>Form</small>
	        </div>
	        <div class="card-body ">
	        	<div class="row">
		            <div class="form-group col-lg-6">
		                <label for="type" class=" form-control-label">Name</label>
		                <input type="text" id="type" name="product_name" placeholder="Enter your subcategory name" class="form-control">
		            </div>
		            <div class="form-group col-lg-6">
		                <label for="type" class=" form-control-label">Category Name</label>
		                <select name="category" id="category_id" class="form-control form-control-sm" >
                            <option value="">-- Please Select --</option>
                             @foreach ($categories as $value)
                            <option value="{{ $value->id }}" {{ old('category') == $value->id ? 'selected' : '' }}> {{ $value->type }} </option>
                            @endforeach
                        </select>
		            </div>
	            </div>
	            <div class="form-group">
	                <label for="description" class=" form-control-label">Description</label>
	                <textarea type="text" id="description" name="description" placeholder="Enter Description" class="form-control"></textarea>
	            </div>
	            <div class="row form-group">
	                <div class="col-lg-6 mb-5">
	                    <div class="form-group">
	                        <label for="price" class=" form-control-label">Price</label>
	                        <input type="text" name="price" id="price" placeholder="Enter product price" class="form-control">
	                    </div>
	                </div>
	                <div class="col-lg-6 mb-5">
                        <div class="form-group">
                            <label>Product Image Uploader<span class="text-danger">*</span></label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" name="product_image" class="form-control-file" id="customFile" />
                                <!-- <label for="file-input" class=" form-control-label">Select Image</label> -->
                            </div>
                        </div>
                    </div>
	        </div>
	        <div class="text-center">
	        <button class="btn btn-success">Submit</button>
	        </div>
	    </div>
    </div>
</form>

@endsection