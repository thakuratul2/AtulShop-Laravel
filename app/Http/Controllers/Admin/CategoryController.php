<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    //
    public function CategoryView(){

        return view("admin.category.list");
    }

    public function create(){

        return view("admin.category.create");

    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'slug' => 'required|unique:categories',
        ]);

        if($validator->passes()){

        }else{

            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }
    
    

    public function edit($cid){

    }

    public function update(Request $request, $cid){


    }

    public function destroy($id){

    }
}
