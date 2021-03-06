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
    public function  delete ($produit)
    {

        $produit->delete();
    }
    public function  update ($produit,Request $request)
    {

        $produit->label = $request->get('label');
        $produit->prix = $request->get('prix');
        $produit->quantity = $request->get('quantity');
        $produit->update();
        /*$image_path = public_path('uploads/products/'.$produit->image);

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

        }*/



    }
    public function getProductById($id)
    {
        $produit = Produit::find($id);
        return $produit;
    }


}
