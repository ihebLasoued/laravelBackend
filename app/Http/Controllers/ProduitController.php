<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;
use App\Repository\ProduitRepository;
use Illuminate\Support\Facades\File;

class ProduitController extends Controller
{
    public function __construct(ProduitRepository $produitRepository)
    {
        $this->produitRepository = $produitRepository;
    }

    public function addProduct(Request $request){
        $this->produitRepository->addProduct( $request);
       return response()->json([
        "message" => "Product added"
    ], 201);
    }
    public function  delete (Request $request)
    {
      $produit=  $this->produitRepository->getProductById($request->get('id'));
        $this->produitRepository->delete( $produit);


        return response()->json([

            "message" => "Product deleted"
        ], 201);
    }
    public function getAll() {
        $produits =  $this->produitRepository->getAllProducts();
        return response($produits, 200);
    }
    public function  update ()
    {
        $this->produitRepository->update();
        return response()->json([

            "message" => "Product updated"
        ], 201);
    }

    public function getProductByid($id)
{
    $produit=produit::find($id);
    return response($produit, 200);
}
}
