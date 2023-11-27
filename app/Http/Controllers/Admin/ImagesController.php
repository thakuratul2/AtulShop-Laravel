<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TempImages;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    //
    public function store(Request $req){

        $image = $req->image;

        if(!empty($image)){
            //extract extension
            $ext = $image->getClientOriginalExtension();
            $newName = time().'.'.$ext;

            $tempImage = new TempImages();
            $tempImage->image_name = $newName;
            $tempImage->save();

            $image->move(public_path().'/upload',$newName);

            $sourcePath = public_path().'/upload'.$newName;
            $image= Image::make();
            return response()->json([
                'status'=> true,
                'image_id' => $tempImage->tid,
                'message' => 'Category Image is added'
            ]);
        }
    }
}
