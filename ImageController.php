<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    function upload(Request $request){
         $img = new Image();

        $path = $request->file('file')->store('images1', 'public');

        
       
        $img->path = $path;
        if($img->save()){
             return redirect('list');
        } else{
            return "error ! try after sometime";
        }
    }

    function list(){
        $images = Image::all();
        return view ('displayimages',['imgdata'=>$images]);
    }

    
    //
}
