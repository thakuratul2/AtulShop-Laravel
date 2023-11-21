<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductSubCategory extends Controller
{
    //
    public function ProductSubCategory(Request $req){

        if(!empty($req->category_id)){
           $subCategories = SubCategory::where('category_id', $req->category_id)->orderBy('name','ASC')->get();

           return response()->json([
            'status' => true,
            'subCategories' => $subCategories
           ]);

        }else{
            return response()->json([
                'status' => true,
                'subCategory' => []
            ]);
        }
    }
}
