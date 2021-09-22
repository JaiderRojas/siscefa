<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\People;
use App\Movement;


class Responsability extends Model
{


     public function people(){
        return $this->belongsTo('App\People');
    }
     public function movement(){
        return $this->belongsTo('App\Movement');
    }

}
