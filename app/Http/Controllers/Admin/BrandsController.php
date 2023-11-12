<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandsController extends Controller
{
    //
    public function Brands(Request $req){

        $brands = Brands::orderBy('bid','ASC');

        $brands = $brands->paginate(10);
        if(!empty($req->get('keyword'))){
            $brands = $brands->where('name', 'like', '%' .$req->get('keyword') . '%');
        }
    

        return view('admin.brands.list', compact('brands'));
    }

    public function create(){

        return view('admin.brands.create');
    }

    public function store(Request $req){
        $val = Validator::make($req->all(), [
            'name' => 'required',
            'status' => 'required'
        ]);

        if($val->passes()){
            $brand = new Brands();
            $brand->name = $req->name;
            $brand->status = $req->status;

            $brand->save();

            $req->session()->flash('success','Brands Added Successfully');

            return response()->json([
                'status'=> true,
                'message' => 'Brand added successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors'=> $val->errors()
            ]);
        }
    }

    public function destroy($bid, Request $req){
        $brands = Brands::find($bid);

        if(empty($brands)){
            $req->session()->flash('error','Record not found');

            return response([
                'status' => false,
                'notFound'=> true
            ]);
        }

        $brands->delete();
        $req->session()->flash('success','Brands deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'deleted'
        ]);
    }

    public function edit($bid, Request $req){
        $brands = Brands::find($bid);
        if(empty($brands)){
            $req->session()->flash('error','Record not found');
            return redirect()->route('brands.view');
        }

      
        
        $data['brands'] = $brands;
        return view('admin.brands.edit',$data);
    }

    public function update(Request $req, $bid){
        $brand = Brands::find($bid);
        $val = Validator::make($req->all(), [
            'name' => 'required',
            'status' => 'required'
        ]);

        if($val->passes()){
            $brand = new Brands();
            $brand->name = $req->name;
            $brand->status = $req->status;

            $brand->save();

            $req->session()->flash('success','Brands Updated Successfully');

            return response()->json([
                'status'=> true,
                'message' => 'Brand Updated successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors'=> $val->errors()
            ]);
        }
    }

}
