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
   protected $fillable= [
    'name',
    'surname',
    'address',
    'CAP',
    'city',
    'province',
    'phone',
    'doorbell',
    'email',
    'note',
    'total_price',
    'slug',
    'processed',
    ];
}
