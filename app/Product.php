<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }
     public function sales()
    {
        return $this->hasMany('App\Sale');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Pcategory');
    }
}
