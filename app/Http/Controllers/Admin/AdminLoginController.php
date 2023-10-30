<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        }else{
            return redirect()->route('admin.login')->withErrors($validate)->withInput($request->only('email'));
        }
    }
}
