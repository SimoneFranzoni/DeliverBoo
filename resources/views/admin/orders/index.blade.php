@extends('admin.home')

@section('dashboard-content')
<div class="container">
  
  {{-- info ristorante --}}
  <div class="d-md-flex justify-content-between mb-5">
    <div class="col-md-8 mt-3">
      <h1>{{$restaurant->name}}</h2>
    </div>  
  </div>
  
    
     
  
  <h2>Ordini</h2>
  <ul style="padding:0px;">
    @foreach ($orders as  $key=>$order)
    <li class=" mb-3" style="list-style: none">
      
        
     
        <div>CLIENTE {{$key+1}} : {{$order->name}} {{$order->surname}}</div> 
        <div>EMAIL : {{$order->email}}</div> 
        <div>TELEFONO : {{$order->telephone_guest}}</div> 
        <div>INDIRIZZO : {{$order->telephone_guest}}</div> 

        @foreach ( $order->plates as $plate )
          <div>piatto :  {{$plate->name}}   prezzo : {{$plate->price}}</div>
        @endforeach 

        <div>
          PREZZO ORDINE :  <?php
                                $total = 0 ; 
                                foreach ($order->plates as $plate){
                                    $total = $total + $plate->price ;
                                }
                                echo $total;     
                          ?> euro
        </div> 
      
   
    </li> 
    @endforeach 
  </ul>     
     

    <a  href="{{route('admin.miei-ristoranti.piatti.index',$restaurant->slug)}}">
       <button class="btn-team5">Vai al Ristorante</button> 
    </a>
  

 
</div>  

@endsection
      
    
