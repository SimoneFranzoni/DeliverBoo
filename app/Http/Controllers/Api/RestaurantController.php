<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Type;
use Illuminate\Http\Request;


class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::all();
        $restaurants->each(function($restaurant){
            $restaurant->cover = $this->makeImagePath($restaurant->cover);
        });
        return response()->json(compact('restaurants'));
    }

    public function show($slug){
        $restaurant = Restaurant::where('slug', $slug)->with('plates')->first();
        $restaurant->cover = $this->makeImagePath($restaurant->cover);

        $restaurant->plates->each(function($plate){
            $plate->cover = $this->makeImagePath($plate->cover);
        });
        return response()->json(compact('restaurant'));
    }

    public function getRestaurantsByTypes($slug_type){
        $type = Type::where('slug', $slug_type)->with('restaurants')->first();
        $type->restaurants->each(function($restaurant){
            $restaurant->cover = $this->makeImagePath($restaurant->cover);
        });

        $success = true;
        $error = '';
        if(!$type){
            $success = false;
            $error = 'Tipologia Ristorante Inesistente';
        } elseif(count($type['restaurants']) === 0) {
            $success = false;
            $error = 'Non ci sono ristoranti per questa Tipologia';
        }
        return response()->json(compact('type','success','error'));
    }

    private function makeImagePath($cover){
        if($cover){
            $cover = url('storage/' . $cover);
        } else{
            $cover = url('img/default-fallback-image.png');
        }

        return $cover;
    }
}
