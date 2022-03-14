<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        //AUTH::user è necessario per ottenere le info legate al singolo user e indirizzarle alla Home

        $user = Auth::user();
        
        $restaurants= Restaurant::where('user_id',$user->id)->get();
        $orders=[];
        foreach($restaurants as $restaurant)
        {
           array_push($orders,Order::where('restaurant_id',$restaurant->id)->with('plates')->get())  ;
        }
       
        return view('admin.home',compact('user','restaurants','orders'));
    }
}
