<?php

namespace App\Http\Controllers;

use \Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.registration');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
       $request->validate([
            'username' => 'required',
            'email' => 'required|email|',            
            /*'mobile_no' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users', */           
            'password' => 'required',            
            ],
            [
            'username.required' => 'Please give Username',
            'email.required' => 'Please provied valid Email',
            'password.required' => 'Please give password',
            ]);

       $hashed = Hash::make($request->password);
       // $password = Hash::make('yourpassword');
       // dd($hashed);
        // dd($request->all());

        DB::table('users')->insert([
            'username' =>$request->username,
            'mobile_no' =>$request->mobile_no,
            'email' =>$request->email,
            'role_id' =>1,
            'password' =>$hashed
            

       ]);

         return view('admin.login')->with('success', 'User Registration Complete Successfully');;

    }



    public function dashboard(Request $request)
    {
        // if($request->session()->has('ADMIN_ID')){
        //  return $request->session()->get('ADMIN_ID');
        // }
        // return Auth::user()->id;
        // $roleID = Auth::user()->role_id;
        // dd($roleID);
       
        return view('users.dashboard');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show()
    public function show($id)
    {
        //
        $data['info'] = DB::table('users')
                        ->select('fname','lname','username','email','mobile_no')
                        ->where('id',$id)
                        ->first();
        // dd($data);                
        $data['page_title'] = "Basic Information";
        return view('users.basic_info')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ // public function show($id)
    public function creat_address()
    {
        //
    
        $data['page_title'] = "Add Shippng & Billing Address";
        return view('users.creat_address')->with($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_address(Request $request)
    {
        //
        $id = Auth::user()->id;
        DB::table('users')->insert([
            'shipping_address' =>$request->shipping_address,
            'billing_address' =>$request->billing_address,
        ])->where('id',$id);
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile_image(Request $request)
    {
        //
        $id = Auth::user()->id;
        $fileName = time().'.'.$request->profile_image->extension();
        $request->profile_image->move(public_path('admin_assets/images/icon/'), $fileName);
        // return $fileName;
        DB::table('users')->where('id',$id)->update([
            'profile_image' =>$fileName,
            // 'billing_address' =>$request->billing_address,
        ]);

        return redirect('user/dashboard')->with('product_update','Product updated Successfully') ;
    }

    /** * @param  int  $id
     * @return \Illuminate\Http\Response
     */ // public function show($id)
    public function address_details($id)
    {
        //
        $data['address'] = DB::table('users')
                        ->select('shipping_address','billing_address')
                        ->where('id',$id)
                        ->first();
        $data['page_title'] = "Address Details";
        return view('users.address_details')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
