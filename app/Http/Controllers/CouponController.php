<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use DB;


class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $coupons = DB::table('coupons')->get();
         
       return view('admin/coupon', compact('coupons'));
    }
    public function manage_coupon()
    {
       return view('admin/manage_coupon');
    }

    public function saveCoupon(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'title' => ['required' ,'max:255'],
        'code' => ['required', 'unique:coupons'],
        'value' => ['required'],
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
               DB::table('coupons')->insert([
                    'title'=>$request->title,
                    'code' =>$request->code,
                    'value' =>$request->value
               ]);

               return redirect('admin/coupon')->with('coupon_add','Coupon added successfully');
                }
    }

    public function editCoupon($id)
    {
        $coupon = DB::table('coupons')->where('id',$id)->first();
        return view('admin/edit_coupon',compact('coupon'));
    }
    public function updateCoupon(Request $request)
    {
        // print_r($request->id);exit('ali');
        DB::table('coupons')->where('id',$request->id)->update([
           'title'=>$request->title,
            'code' =>$request->code,
            'value' =>$request->value
        ]);
        return redirect('admin/coupon')->with('coupon_update','Coupon updated Successfully') ;
        
    }

    public function deleteCoupon($id)
    {
        DB::table('coupons')->where('id',$id)->delete();
        return redirect()->back()->with('coupon_delete','Coupon delete Successfully') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
