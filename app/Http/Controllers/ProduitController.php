<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class ProduitController extends Controller
{
    public function addProduct(Request $request){
        $produit = new Produit();
        $produit->label = $request->get('label');
        $produit->prix = $request->get('prix');
        $produit->quantity = $request->get('quantity');

        if ($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time() .'.' .$extension;
            $file->move('uploads/products/',$filename);
            $produit->image=$filename;
        }
        else{
            $produit->image='';
        }
        $produit->save();

        return response()->json([
            "message" => "Product added"
        ], 201);
    }
    public function  delete (Request $request)
    {
        $produit=produit::find($request->get('id'));

        $image_path = public_path('uploads/products/'.$produit->image);
        echo $image_path;
        if (file_exists($image_path))
        {
            File::delete($image_path);
       }
        $produit->delete();
        return response()->json([

            "message" => "Product deleted"
        ], 201);
    }
    public function getAll() {
        $produits = Produit::get();
        return response($produits, 200);
    }
    public function  update (Request $request)
    {
        $produit=produit::find($request->get('id'));
        $produit->label = $request->get('label');
        $produit->prix = $request->get('prix');
        $produit->quantity = $request->get('quantity');

        $image_path = public_path('uploads/products/'.$produit->image);
        echo $image_path;
        if (file_exists($image_path))
        {
            File::delete($image_path);
       }
        if ($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time() .'.' .$extension;
            $file->move('uploads/products/',$filename);
            $produit->image=$filename;
        }
        else{
            $produit->image='';

        }

        $produit->update();
    }


}
