<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MeasurementUnit;
use App\kindOfPurchose;
use App\Category;
use App\Inventory;

class Element extends Model
{
     public function measurement_unit(){
        return $this->belongsTo('App\MeasurementUnit');
    }
     public function kind_of_purchose(){
        return $this->belongsTo('App\kindOfPurchose');
    }
     public function categorie(){
        return $this->belongsTo('App\Category');
    }
     public function inventories(){
        return $this->hasMany('App\Inventory');
    }
}
