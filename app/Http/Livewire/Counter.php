<?php

namespace App\Http\Livewire;

use App\Order;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Counter extends Component
{
    public function render()
    {
        $arrayOrders=[];
        $myRestaurantOrder=[];
        $user = Auth::user();
        $restaurants= Restaurant::where('user_id',$user->id)->get();
        
        foreach($restaurants as $restaurant)
        {
            array_push($arrayOrders,Order::where('restaurant_id',$restaurant->id)->get())  ;
        }


        foreach($arrayOrders as $orders){
            { 
                 foreach($orders as $order){
                     array_push($myRestaurantOrder,$order->restaurant_id);
                 }
            }
        }
        $singleOrder=[];
     
         foreach($myRestaurantOrder as $id) {
            if(!in_array($id,$singleOrder))
            {
                array_push($singleOrder,$id);
        
            }
         }  
         return view('livewire.counter',compact('restaurants','singleOrder'));
     }

     public function update(Request $request, $id)
     {
         
     }

                     
            
      


}
