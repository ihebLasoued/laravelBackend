<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function product(){
        return $this->belongsTo('App\Models\Produit');
    }
}
