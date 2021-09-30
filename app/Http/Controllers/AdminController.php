<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Auth;
use \Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    
    public function auth(Request $request)
    {
        // dd($request->all());
        $email= $request->post('email');
        $password = $request->post('password');
        // $result=Admin::where(['email'=>$email,'password'=>$password])->get();
        $result = User::where('email', $email)->first();

        $userdata = array(
          'email' => $email,
          'password' => $password
        );
        // dd($userdata);
        // attempt to do the login
        // if (Auth::attempt($userdata, true)){
        //     $request->session()->put('ADMIN_LOGIN',true);
        //     $request->session()->put('ADMIN_ID',$result->id);
        //     // Session::put('logged', 'islogged');
        //     // Session::put('userid', $result->id);
        //     // return $result=User::where(['email'=>$email])->first();
        //     if ($result->role_id == 0) {
        //     return redirect('admin/dashboard');
        //         }elseif ($result->role_id == 1){
        //         return redirect('user/dashboard');
        //             // dd('user');
        //         }
        // }
        // return $result->id;

        if ($result) {
            if(Auth::attempt($userdata, true)){
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                if ($result->role_id == 0) {
                return redirect('admin/dashboard');
                }elseif ($result->role_id == 1){
                    // return $request->session()->get('ADMIN_ID');
                return redirect('user/dashboard');
                }
            }else{
                $request->session()->flash('error','Please Enter Correct Password');
                return redirect('login');
            }
        }
        else{
            $request->session()->flash('error','Please Enter Valid ID & Password');
            return redirect('login');
        }

        
    }

    public function dashboard()
    {
         
       
        return view('admin.dashboard');
    }
    
    
}
