<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    public function restaurant() {
      return $this->belongsTo('App\Restaurant');
    }
}
