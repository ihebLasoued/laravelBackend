<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = [
        'label', 'user_id', 'produit_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }
}
