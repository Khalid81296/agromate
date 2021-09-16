@extends('admin/layout')
@section('subcategory_select','active')
@section('container')
<h1>{{ $page_title }}</h1><br>
@if(Session::has('product_add'))
<div  class="alert alert-success" role="alert">{{Session::get('product_add')}}</div>
@endif
@if(Session::has('product_update'))
<div  class="alert alert-success" role="alert">{{Session::get('product_update')}}</div>
@endif
@if(Session::has('status_update'))
<div  class="alert alert-success" role="alert">{{Session::get('status_update')}}</div>
@endif
@if(Session::has('product_delete'))
<div  class="alert alert-danger" role="alert">{{Session::get('product_delete')}}</div>
@endif

    <a href="manage_subcategory">
        <button class="au-btn au-btn-icon au-btn--blue">
        <i class="zmdi zmdi-plus"></i>add item</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr class="text-left">
                            <th width="1">id</th>
                            <th>name</th>
                            <th>description</th>
                            <th>price</th>
                            <th>status</th>
                            <th width="300">action</th>

                            
                        </tr>
                    </thead>
                 @foreach($subcategories as $key => $subcategory)

                    <tbody>
                        <tr class="text-left">
                            <td width="1">{{$key+1}}</td>
                            <td>{{$subcategory->product_name}}</td>
                            <td>{{$subcategory->description}}</td>
                            <td>{{$subcategory->price}}৳</td>
                            <td>{{$subcategory->status_name}}</td>
                            <td width="300">
								<a href="{{url('admin/edit-subcategory/'.$subcategory->id)}}"style="color: white !important;"><button type="button" class="btn-sm btn btn-success">Edit</button></a>
                                @if($subcategory->status==1)
                                <a href="{{url('admin/subcategory/status/0/'.$subcategory->id)}}"style="color: white !important;"><button type="button" class="btn-sm btn btn-warning">Unavailable</button></a>
                                @elseif($subcategory->status==0)
                                <a href="{{url('admin/subcategory/status/1/'.$subcategory->id)}}"style="color: white !important;"><button type="button" class="btn-sm btn btn-primary">Available</button></a>
                                @endif
                            	<a href="{{url('admin/delete-subcategory/'.$subcategory->id)}}" style="color: white !important;"><button type="button" class="btn-sm btn btn-danger"> Delete</button></a>
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