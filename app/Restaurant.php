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
      return $this->belongsTo('App\User');
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
}
