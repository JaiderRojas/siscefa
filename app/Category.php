<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Element;

class Category extends Model
{
    public function elements(){
        return $this->hasMany('App\Element');
    }
}
