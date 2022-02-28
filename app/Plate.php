<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    public function restaurant() {
      return $this->belongsToMany('App\Restaurant');
    }
    public function orders(){
      return $this->belongsToMany('App\Order');
  }
}
