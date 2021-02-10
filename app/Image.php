<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }
}
