<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    //
    public function UserManagement(){
        return view('admin.user.users');
    }

    public function UserRole(){
        return view('admin.user.role');
    }
}
