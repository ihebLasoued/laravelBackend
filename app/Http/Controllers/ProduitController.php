<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

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
}
