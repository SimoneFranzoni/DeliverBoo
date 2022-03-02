@extends('layouts.app')

@section('content')
<div class="container">
  
  {{-- info ristorante --}}
  <div class="d-md-flex justify-content-between mb-5">
    <div class="col-md-8">
      <h1>{{$restaurant->name}}</h1>
      <h6>Indirizzo :{{$restaurant->address}}</h6>
      <h6>Teleforno :{{$restaurant->phone_number}}</h6>
     
    </div>  
  </div>
 
  
  <h2>Ordini</h2>
  <ul style="padding:0px;">
    @foreach ($orders as  $order)
    <li class=" mb-3" style="list-style: none">
      
        
     
        <div>NOME : {{$order->name}} {{$order->surname}}</div> 
        <div>EMAIL : {{$order->email}}</div> 
        <div>TELEFONO : {{$order->telephone_guest}}</div> 
        <div>INDIRIZZO : {{$order->telephone_guest}}</div> 
        <div>PREZZO ORDINE : {{$order->total_price}} euro</div> 
        
      
   
    </li> 
    @endforeach 
  </ul>     
     
  <h2 >
    <a  href="{{route('admin.miei-ristoranti.piatti.index',$restaurant->slug)}}">Back <<</a>
  </h2>

 
</div>  

@endsection
      
    
