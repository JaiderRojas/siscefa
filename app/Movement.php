<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailMovement;
use App\Responsability;

class Movement extends Model
{
	

    public function detail_movements(){
        return $this->hasMany('App\DetailMovement');
    }
     public function responsabilities(){
        return $this->hasMany('App\Responsability');
    }
}
