<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    public function item()
    {
        return $this->hasMany('App\Models\Item');
    }
}
