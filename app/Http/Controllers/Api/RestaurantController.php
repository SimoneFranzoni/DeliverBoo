<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Type;
use Illuminate\Http\Request;


class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::with('types')->get();
        $restaurants->each(function($restaurant){
            $restaurant->cover = $this->makeImagePath($restaurant);
        });
        return response()->json(compact('restaurants'));
    }

    public function show($slug){
        $restaurant = Restaurant::where('slug', $slug)->with('plates', 'types')->first();
        $restaurant->cover = $this->makeImagePath($restaurant);

        $restaurant->plates->each(function($plate){
            $plate->cover = $this->makeImagePath($plate);
        });
        return response()->json(compact('restaurant'));
    }

    public function getRestaurantsByTypes($slug_type){
        $type = Type::where('slug', $slug_type)->with('restaurants')->first();
        $type->restaurants->each(function($restaurant){
            $restaurant->cover = $this->makeImagePath($restaurant);
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

    // private function makeImagePath($cover){
    //     if($cover){
    //         $cover = url('storage/' . $cover);
    //     } else{
    //         $cover = url('img/default-fallback-image.png');
    //     }

    //     return $cover;
    // }

    private function makeImagePath($restaurant){
        if($restaurant->cover_up_by_user){
            $restaurant->cover = url('storage/' . $restaurant->cover);
        } else {
        $restaurant->cover = url($restaurant->cover);
        }
        return $restaurant->cover;
    }


    public function orderProva(Request $request){
        dump($request->all());
    }
}
