<div>  
       @if(count($singleOrder)>0)
        <h4>ordini presenti :</h4>

            @foreach ($restaurants as $restaurant)
                
                @foreach ($singleOrder as $order)

                    @if($restaurant->id===$order)
                    <h4><a href="{{route('admin.miei-ristoranti.ordini.index',$restaurant->slug)}}">{{$restaurant->name}}</a></h4>
                    @endif 
                    
                @endforeach
            @endforeach
        @endif
        
</div>
       
{{-- foreach($arrayOrders as $orders){
    { 
         foreach($orders as $order){
             array_push($myRestaurantOrder,$order);
         }
    }
 }
     --}}


             
        
            
    