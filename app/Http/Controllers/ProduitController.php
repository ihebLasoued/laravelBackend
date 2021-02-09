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
        $produit=produit::find($request->get('id'));

        $image_path = public_path('uploads/products/'.$produit->image);
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
