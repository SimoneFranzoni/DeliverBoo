<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
   
    public function plates() {
      return $this->hasMany('App\Plate');
    }

    public function user() {
      return $this->belongsToMany('App\User');
    }

    public function types() {
      return $this->belongsToMany('App\Type');
    }

    public static function generateSlug($name) {
      $slug = Str::slug($name, '-');
      $originalSlug = $slug;

      $existingRestaurant = Restaurant::where('slug', $slug)->first();
      $count = 1;
      while($existingRestaurant) {
        $slug = $originalSlug . '-' . $count;
        $count++;
        $existingRestaurant = Restaurant::where('slug', $slug)->first();
      }
      return $slug;
    }


    public static function randomNumber($length) {
      $result = '';
  
      for($i = 0; $i < $length; $i++) {
          $result .= mt_rand(0, 9);
      }
  
      return $result;
  }
  

}




