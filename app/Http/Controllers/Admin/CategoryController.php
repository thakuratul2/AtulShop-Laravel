<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TempImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;



class CategoryController extends Controller
{
    //
    public function CategoryView(Request $req){

        $cat = Category::orderBy('created_at','ASC');

        if(!empty($req->get('keyword'))){
            $cat = $cat->where('name', 'like', '%' .$req->get('keyword') . '%');
        }
        $cat = $cat->paginate(10);
        
        $data['cat'] = $cat;
        return view('admin.category.list',$data);
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
            //Intervention is used to create auto thumbnail

            //save images here
            if(!empty($request->image_id)){
              $tempImage = TempImages::find($request->image_id);
              $extArray = explode('.',$tempImage->image_name);
              $ext = last($extArray);

              $newImageName = $category->cid.'.'.$ext;
              $spath = public_path().'/upload/'.$tempImage->image_name;
              $dpath = public_path().'/upload/category/'. $newImageName;
               File::copy($spath,$dpath);


            

               $category->category_image = $newImageName;

               $category->save();

            }
  

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
