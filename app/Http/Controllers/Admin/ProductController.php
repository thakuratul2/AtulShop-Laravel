<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    //
    public function Product(){

        return view('admin.product.list');
    }

    public function create(){

        $categories = Category::orderBy('name','ASC')->get();
        $brands = Brands::orderBy('name','ASC')->get();
        $data['categories'] = $categories;
        $data['brands'] = $brands;

        return view('admin.product.create', $data);
    }

    public function store(Request $req){
        $rules = [
            'title' =>'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'sku' => 'required',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No'
        ];

        if(!empty($req->track_qty) && $req->track_qty == 'Yes'){
            $rules['qty'] = 'required|numeric';
        }

       $valid =  Validator::make($req->all(), $rules);

       if($valid->passes()){

       }else{
        return response()->json([
            'status' => false,
            'errors' => $valid->errors()
        ]);
       }
    }
}
