<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Warehouse;

class App extends Model
{
     public function warehouses(){
        return $this->hasMany('App\Warehouse');
    }
}
