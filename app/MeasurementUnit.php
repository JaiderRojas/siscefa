<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Element;

class MeasurementUnit extends Model
{
      public function elements(){
        return $this->hasMany('App\Element');
    }

}
