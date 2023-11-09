<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function SubCategory(){

        return view('admin.sub_category.list');
    }
}
