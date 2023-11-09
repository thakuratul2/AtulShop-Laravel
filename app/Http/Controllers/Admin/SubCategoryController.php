<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Validator;

class SubCategoryController extends Controller
{
    //
    public function SubCategory(){

        return view('admin.sub_category.list');
    }

    public function create(){

        $cat = Category::orderBy('name','ASC')->get();
        $data['categories'] = $cat;
        return view('admin.sub_category.create',$data);
    }

    public function store(Request $req){

        $validator = Validator::make($req->all(), [
            'name'=> 'required',
            'category'=>'required',
            'status'=>'required'
        ]);

        if($validator->passes()){

            $category = new SubCategory();
            $category->name = $req->name;
           // $category->slug = $request->slug;
            $category->status = $req->status;
            $category->category_id = $req->category;

            $category->save();

            $req->session()->flash('success','Sub Category added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Added'
            ]);
        }else{
            return response([
                'status'=> false,
                'errors'=> $validator->errors()
            ]);
        }
    }
}

