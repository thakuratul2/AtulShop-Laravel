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
    public function SubCategory(Request $req){
        $subcat = SubCategory::select('sub_categories_table.*','categories.name as categoryName')->orderBy('sub_categories_table.sub_id','ASC')->leftJoin('categories','categories.cid','sub_categories_table.category_id');

        if(!empty($req->get('keyword'))){
            $subcat = $subcat->where('sub_categories_table.name', 'like', '%' .$req->get('keyword') . '%');
            $subcat = $subcat->orWhere('categories.name', 'like', '%' .$req->get('keyword') . '%');

        }
        $subcat = $subcat->paginate(10);
        
        $data['cat'] = $subcat;

        return view('admin.sub_category.list', $data);
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

