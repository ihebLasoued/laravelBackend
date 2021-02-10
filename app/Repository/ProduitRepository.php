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



}
