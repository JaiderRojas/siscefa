<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Element;

class kindOfPurchose extends Model
{
     public function elements(){
        return $this->hasMany('App\Element');
    }
}
