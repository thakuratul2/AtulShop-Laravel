<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    //
    public function Product(Request $req){


        $product = Product::orderBy('pid','ASC');
        
        if($req->get('keyword')!=""){
            $product = $product->where('title','like','%'.$req->keyword.'%');
        }

        $product = $product->paginate(10);
        $data['product'] = $product;
        return view('admin.product.list',$data);
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
            'title' => 'required',
            'description' => 'required|unique:product',
            'price' => 'required|numeric',
            'sku' => 'required|unique:product',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No'
        ];

        if(!empty($req->track_qty) && $req->track_qty == 'Yes'){

            $rules['qty'] = 'required|numeric';
        }

       $valid =  Validator::make($req->all(), $rules);

       if($valid->passes()){

        $product = new Product();
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->compare_price = $req->compare_price;
        $product->category_id = $req->category;
        $product->sub_category_id = $req->sub_category;
        $product->brand_id = $req->brand_id;
        $product->is_featured = $req->is_featured;
        $product->sku = $req->sku;
        
        $product->barcode = $req->barcode;
        $product->track_qty = $req->track_qty;
        $product->qty = $req->qty;
        $product->status = $req->status;

        $product->save();
        
        $req->session()->flash('success','Product Added successfully');

        return response()->json([
            'status' => true,
            'message' => 'Added'
        ]);

       }else{
        return response()->json([
            'status' => false,
            'errors' => $valid->errors()
        ]);
       }
    }
    public function edit(Request $req, $pid){
        $product = Product::find($pid);

        $subCategories = SubCategory::where('category_id', $product->category_id)->get();

        
        $data = [];

        if(empty($product)){
            return redirect()->route('product.view');
        }
        $data['product'] = $product;
        $categories = Category::orderBy('name','ASC')->get();
        $brands = Brands::orderBy('name','ASC')->get();
        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['subCat'] = $subCategories;
        return view('admin.product.edit',$data);
    }

    public function update($pid, Request $req){

        $product = Product::find($pid);
        $rules = [
            'title' => 'required',
            'description' => 'required|unique:product,description,'.$product->pid.',pid',
            'price' => 'required|numeric',
            'sku' => 'required|unique:product,sku,'.$product->pid.',pid',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No'
        ];

        if(!empty($req->track_qty) && $req->track_qty == 'Yes'){

            $rules['qty'] = 'required|numeric';
        }

       $valid =  Validator::make($req->all(), $rules);

       if($valid->passes()){


        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->compare_price = $req->compare_price;
        $product->category_id = $req->category;
        $product->sub_category_id = $req->sub_category;
        $product->brand_id = $req->brand_id;
        $product->is_featured = $req->is_featured;
        $product->sku = $req->sku;
        
        $product->barcode = $req->barcode;
        $product->track_qty = $req->track_qty;
        $product->qty = $req->qty;
        $product->status = $req->status;

        $product->save();
        
        $req->session()->flash('success','Product Updated successfully');

        return response()->json([
            'status' => true,
            'message' => 'Updated'
        ]);

       }else{
        return response()->json([
            'status' => false,
            'errors' => $valid->errors()
        ]);
       }
    }
}
