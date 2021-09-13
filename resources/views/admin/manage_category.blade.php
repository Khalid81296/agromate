@extends('admin/layout')
@section('page_titel','Manage Category')
@section('category_select','active')
@section('container')
<br>
<a href="category" style="float: right;"> <button  class="btn btn-success">Back</button></a>
<form method="post" action="{{route('save.category')}}" enctype="multipart/form-data">
	@csrf
    <div class="col-lg-8">
	    <div class="card">
	    	
	        <div class="card-header">
	            <strong>Add Category </strong>
	            <small>Form</small>
	        </div>
	        <div class="card-body ">
	            <div class="form-group">
	                <label for="type" class=" form-control-label">Name</label>
	                <input type="text" id="type" name="type" placeholder="Enter your category name" class="form-control">
	            </div>
	            <div class="form-group">
	                <label for="description" class=" form-control-label">Description</label>
	                <textarea type="text" id="description" name="description" placeholder="Enter Description" class="form-control"></textarea>
	            </div>
	            <div class="row form-group">
	                <!-- <div class="col-lg-6 mb-5">
	                    <div class="form-group">
	                        <label for="price" class=" form-control-label">Price</label>
	                        <input type="text" name="price" id="price" placeholder="Enter product price" class="form-control">
	                    </div>
	                </div> -->
	                <div class="col-lg-6 mb-5">
                        <!-- <div class="form-group">
                            <label>Product Image Uploader<span class="text-danger">*</span></label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" name="show_cause" class="custom-file-input" id="customFile" />
                                <label class="custom-file-label" for="customFile">Select Image</label>
                            </div>
                        </div> -->
                    </div>
	        </div>
	        <div class="text-center">
	        <button class="btn btn-success">Submit</button>
	        </div>
	    </div>
    </div>
</form>

@endsection