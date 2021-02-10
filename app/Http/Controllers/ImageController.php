<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Produit;

class ImageController extends Controller

{
    public function addImage(Request $request,$idProduct){
        $image = new Image();
        $product=Produit::find($idProduct);
    if ($request->hasFile('image')){
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time() .'.' .$extension;
        $file->move('uploads/products/',$filename);
        $image->image=$filename;
    }
    else{
        $image->image='';
    }
    $image->produit()->associate($product)->save();

    $image->save();
    return response()->json([

        "message" => "Image added"
    ], 201);
}

}
