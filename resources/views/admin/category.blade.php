@extends('admin/layout')
@section('page_titel','Category')
@section('category_select','active')
@section('container')
<h1>Category</h1><br>
@if(Session::has('product_add'))
<div  class="alert alert-success" role="alert">{{Session::get('product_add')}}</div>
@endif
@if(Session::has('product_update'))
<div  class="alert alert-success" role="alert">{{Session::get('product_update')}}</div>
@endif
@if(Session::has('product_delete'))
<div  class="alert alert-danger" role="alert">{{Session::get('product_delete')}}</div>
@endif

    <a href="manage_category">
        <button class="au-btn au-btn-icon au-btn--blue">
        <i class="zmdi zmdi-plus"></i>add item</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>type</th>
                            <th>description</th>
                            <th>status</th>
                            <th>price</th>
                            <th>action</th>

                            
                        </tr>
                    </thead>
                 @foreach($categories as $key => $category)

                    <tbody>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->type}}</td>
                            <td>{{$category->description}}</td>
                            <td class="process">{{$category->status}}</td>
                            <td>{{$category->price}}</td>
                            <td>
                            	<div style="size: 15px;float: right; background-color:#d22929;margin: 1px;"><a href="{{url('admin/delete-category/'.$category->id)}}" style="color: white !important;">Delete</a></div>
								<div style="size: 15px;float: right; background-color: #1919da;margin: 1px;"><a href="{{url('admin/edit-category/'.$category->id)}}"style="color: white !important;">Edit</a></div> 
							</td>
                            
                        </tr>
                 @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                
            </div>
        </div>
    </div>

@endsection
