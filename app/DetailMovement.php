<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventory;
use App\Movement;

class DetailMovement extends Model
{
    public function inventory(){
        return $this->belongsTo('App\Inventory');
    }
    public function movement(){
        return $this->belongsTo('App\Movement');
    }


}
