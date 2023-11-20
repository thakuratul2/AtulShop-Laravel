<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductSubCategory extends Controller
{
    //
    public function SubCategory(Request $req){
        if(!empty($req->category_id)){
           $subCategory = SubCategory::where('category_id', $req->category_id)->orderBy('name','ASC')->get();

           return response()->json([
            'status' => true,
            'subCategories' => $subCategory
           ]);

        }else{
            return response()->json([
                'status' => true,
                'subCategory' => []
            ]);
        }
    }
}
