<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function restaurant(){
        return $this->belongsToMany('App\Restaurant');
    }
    public function plates(){
        return $this->belongsToMany('App\Plate');
    }

    public function plates(){
        return $this->belongsToMany('App\Plate');
    }
}
