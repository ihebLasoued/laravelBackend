<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Produit;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function  acheterProduit($idUser,$idProduct,Request $request){
        $product=Produit::find($idProduct);
        $user=User::find($idUser);
        if($request->get('quantity')<=$product->quantity)
        {
            $item= new Item;
            $item->user()->associate($user)->save();
            $item->produit()->associate($product)->save();
            $item->quantity=$request->get('quantity');
            $item->save();
            $product->quantity= $product->quantity-$request->get('quantity');
            $product->save();
            return response()->json([

                "message" => "produit acheter"
            ], 201);
        }
        else
        {
            return response()->json([

                "message" => "stock insuffisante"
            ], 201);
    }
    }
}
