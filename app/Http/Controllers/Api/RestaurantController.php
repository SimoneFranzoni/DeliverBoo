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
        return response()->json(compact('restaurants'));
    }

    public function getRestaurantsByTypes($slug_type){
        $type = Type::where('slug', $slug_type)->with('restaurants')->first();
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
}
