<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;

class AdminLoginController extends Controller
{
    //

    public function AdminLogin(){
        return view("admin.login");
    }

    public function  AdminAuth(Request $request){

        $validate = Validator::make($request->all(), [
            "email"=> "required|email",
            'password'=>'required'
        ]);

        if($validate->passes()){

            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))){
                
                $admin = Auth::guard('admin')->user();

                if($admin->role == 2){
                    return redirect()->route('admin.dashboard');
                }else{
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error','You are not authorized to access');

                }
            }else{
                return redirect()->route('admin.login')->with('error','Either Email/Password is incorrect');
            }
        }else{
            return redirect()->route('admin.login')->withErrors($validate)->withInput($request->only('email'));
        }
    }
}
