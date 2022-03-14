<div>  
       @if($printOrder)
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
       



             
        
            
    