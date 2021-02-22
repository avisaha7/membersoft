<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public function managements()
    {
        return $this->hasMany('App\Management');
    }
}

