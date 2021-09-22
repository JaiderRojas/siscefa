<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventory;
use App\Responsibility;

class People extends Model
{
    public function inventories(){
        return $this->hasMany('App\Inventory');
    }
    public function responsabilities(){
        return $this->hasMany('App\Responsability');
    }
}
