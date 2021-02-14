<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $fillable = [
        'label', 'prix', 'quantity'
    ];

    public function item()
    {
        return $this->hasMany('App\Item');
    }
    public function image()
    {
        return $this->hasOne('App\Image');
    }
}
