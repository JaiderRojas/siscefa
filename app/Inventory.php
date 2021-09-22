<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Element;
use App\Warehouse;
use App\DetailMovement;
use App\People;

class Inventory extends Model
{
     public function element(){
        return $this->belongsTo('App\Element');
    }
    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }
    public function detail_movements(){
        return $this->hasMany('App\DetailMovement');
    }
    public function people(){
        return $this->belongsTo('App\People');
    }
}
