<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    //
    public function Dashboard(){

        // $admin = Auth::guard("admin")->user();

        // echo "Welcome ".$admin->name.'<a href="'.route('admin.logout').'">Logout</a>';

        return view('admin.dashboard');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','You successfully logout!!!');
    }
}
