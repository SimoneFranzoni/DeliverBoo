<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plate extends Model
{
    public function restaurant() {
      return $this->belongsToMany('App\Restaurant');
    }
    public function orders(){
      return $this->belongsToMany('App\Order');
  }

  public static function generateSlug($name) {
    $slug = Str::slug($name, '-');
    $originalSlug = $slug;

    $existingRestaurant = Plate::where('slug', $slug)->first();
    $count = 1;
    while($existingRestaurant) {
      $slug = $originalSlug . '-' . $count;
      $count++;
      $existingRestaurant = Plate::where('slug', $slug)->first();
    }
    return $slug;
  }


  public static function randomNumber($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

  }


   
