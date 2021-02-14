<?php

namespace  App\Repository;


use App\Produit;
use Illuminate\Http\Request;

class ProduitRepository{

    public function addProduct(Request $request){
        $produit = new Produit();
        $produit->label = $request->get('label');
        $produit->prix = $request->get('prix');
        $produit->quantity = $request->get('quantity');

        $produit->save();


    }
    public function getAllProducts ()
    {
     return   Produit::get();
    }
    public function  delete (Request $request)
    {
        $produit=produit::find($request->get('id'));
        $produit->delete();
    }


}
