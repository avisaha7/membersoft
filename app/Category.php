<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function payments()
    {
        return $this->belongsToMany('App\Payment')->withTimestamps();
    }
}
