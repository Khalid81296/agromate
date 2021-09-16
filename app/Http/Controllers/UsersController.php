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



    public function dashboard()
    {
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
    public function show($id)
    {
        //
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
