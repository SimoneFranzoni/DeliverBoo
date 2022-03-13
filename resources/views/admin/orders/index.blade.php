@extends('admin.home')
@section('dashboard-content')
)
<div class="container ">
  
  {{-- info ristorante --}}
  <div class="d-md-flex justify-content-between mb-5">
    <div class="col-md-8 mt-3">
      <h1>{{$restaurant->name}}</h2>
    </div>  
  </div>
  
    
     
  
  <h2 class="text-white">Ordini</h2>
  <ul class="d-flex"style="padding:0px;color:black">
    @foreach ($orders as  $key=>$order)
    <li class=" mb-3" style="list-style: none; background:rgba(255, 255, 255, 0.8); padding:20px; border-radius:20px">
      @dump($order->processed)
        
     
        <div>CLIENTE {{$key+1}} : {{$order->name}} {{$order->surname}}</div> 
        <div>EMAIL : {{$order->email}}</div> 
        <div>TELEFONO : {{$order->phone}}</div> 
        <div>INDIRIZZO : {{$order->address}}</div> 
        @foreach ( $order->plates as $plate )
          <div>piatto :  {{$plate->name}}   prezzo : {{$plate->price}}</div>
        @endforeach 
        <div>TOTALE : {{$order->total_price}}</div> 


      
     
        <a href="{{route('admin.miei-ristoranti.ordini.update',[$order,$restaurant->slug])}}">
          <button class="btn-team5">Evadi ordine </button> 
        </a>
   
    </li> 
    @endforeach 
  </ul>     
     

    <a   href="{{route('admin.miei-ristoranti.piatti.index',$restaurant->slug)}}">
       <button class="btn-team5">Vai al Ristorante</button> 
    </a>
  

 
</div>  

@endsection
      
    
