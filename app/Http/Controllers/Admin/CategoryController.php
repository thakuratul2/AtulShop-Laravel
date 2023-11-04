<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    //
    public function CategoryView(){

        $cat = Category::latest()->paginate(10);
        
        return view('admin.category.list');
    }

    public function create(){

        return view("admin.category.create");

    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=> 'required',
    
        ]);

        if($validator->passes()){

            $category = new Category();
            $category->name = $request->name;
           // $category->slug = $request->slug;
            $category->status = $request->status;

            $category->save();

            $request->session()->flash('success','Category added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Added'
            ]);
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
