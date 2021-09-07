@extends('admin/layout')
@section('page_titel','Coupon')
@section('coupon_select','active')
@section('container')
<h1>Coupon</h1><br>
@if(Session::has('coupon_add'))
<div  class="alert alert-success" role="alert">{{Session::get('coupon_add')}}</div>
@endif
@if(Session::has('coupon_update'))
<div  class="alert alert-success" role="alert">{{Session::get('coupon_update')}}</div>
@endif
@if(Session::has('status_update'))
<div  class="alert alert-success" role="alert">{{Session::get('status_update')}}</div>
@endif
@if(Session::has('coupon_delete'))
<div  class="alert alert-danger" role="alert">{{Session::get('coupon_delete')}}</div>
@endif

    <a href="manage_coupon">
        <button class="au-btn au-btn-icon au-btn--blue">
        <i class="zmdi zmdi-plus"></i>add coupon</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>code</th>
                            <th>value</th>
                            <th>status</th>
                            <th>action</th>

                            
                        </tr>
                    </thead>
                 @foreach($coupons as $key => $coupon)

                    <tbody>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$coupon->title}}</td>
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->value}}</td>
                            <td>{{$coupon->status_name}}</td>
                            <td>
								<a href="{{url('admin/edit-coupon/'.$coupon->id)}}"style="color: white !important;"><button type="button" class="btn-sm btn btn-success">Edit</button></a>
								@if($coupon->status==1)
                                <a href="{{url('admin/coupon/status/0/'.$coupon->id)}}"style="color: white !important;"><button type="button" class="btn-sm btn btn-warning">Unactive</button></a>
                                @elseif($coupon->status==0)
                                <a href="{{url('admin/coupon/status/1/'.$coupon->id)}}"style="color: white !important;"><button type="button" class="btn-sm btn btn-primary">Active</button></a>
                                @endif
                            	<a href="{{url('admin/delete-coupon/'.$coupon->id)}}" style="color: white !important;"><button type="button" class="btn-sm btn btn-danger">Delete</button></a></div>
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
