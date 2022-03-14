@extends('admin.home')
@section('dashboard-content')

       
<div class="container ">
  
  {{-- info ristorante --}}
  <div class="d-md-flex justify-content-between mb-5">
    <div class="col-md-8 mt-3">
      <h1>{{$restaurant->name}}</h2>
    </div>  
  </div>
 
  @if(count($orders)>0 && $printOrder===true)
    <h2 class="text-white">Ordini</h2>
    
    <div class="d-flex"style="padding:0px;color:black">
    @foreach ($orders as  $key=>$order)
    
      @if($order->processed===0)
      <div class=" m-3" style="background:rgba(255, 255, 255, 0.8); padding:20px; border-radius:20px">
   
        
    
          <div>CLIENTE {{$key+1}} : {{$order->name}} {{$order->surname}}</div> 
          <div>EMAIL : {{$order->email}}</div> 
          <div>TELEFONO : {{$order->phone}}</div> 
          <div>INDIRIZZO : {{$order->address}}</div> 
      
          @foreach ( $order->plates as $plate )
            <div>{{$plate->quantity}}</div>
          @endforeach 
          <div>TOTALE : {{$order->total_price}}</div> 

          <form class="d-inline-block"
            action="{{route('admin.miei-ristoranti.ordini.update',[$order,$restaurant->slug])}}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn-team5">Evadi odine</button>
          </form>
          
       </div>
       @endif
     @endforeach 
  </div>
  @else
    <h2 style="
              text:white
              height: 100px; 
              line-height:100px;
              background:rgba(255, 255, 255, 0.8);
              padding:20px; 
              border-radius:20px">
        
        Non sono presenti ordini
    </h2>
       
  @endif
  <a   href="{{route('admin.miei-ristoranti.piatti.index',$restaurant->slug)}}">
     <button class="btn-team5">Vai al Ristorante</button> 
  </a>
</div>  

@endsection
      


      
     
   
     



 
    
