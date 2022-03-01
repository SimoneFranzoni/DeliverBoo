@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-md-flex justify-content-between mb-5">
    <div class="col-md-8">
      <h1>{{$ristorante->name}}</h1>
      <h6>Indirizzo :{{$ristorante->address}}</h6>
      <h6>Teleforno :{{$ristorante->phone_number}}</h6>
    </div>
    
    <div class="col-2 col-md-4">
      <a  href="{{route('admin.miei-ristoranti.piatti.create',$ristorante->slug)}}">
        <button type="button" class="btn btn-success">Nuovo piatto</button>
      </a>
    </div>
  </div>
 
  <ul style="padding:0px;">
 
    
    @foreach ($piatti as  $piatto)
  
    <li class="d-flex flex-wrap justify-content-between mb-3">
      <div class="col-12 col-md-8  ">
        <strong>{{$piatto->category}}- </strong>
        
       
        <a href="{{route('admin.miei-ristoranti.piatti.show',[$ristorante->slug,$piatto->slug])}}">{{$piatto->name}} </a>
      </div>

      <div class="col-12 col-md-4">
        <a  href="{{route('admin.miei-ristoranti.piatti.edit',[$ristorante->slug,$piatto->slug])}}">
          <button type="button" class="btn btn-info"> Modifica</button>
        </a> 
        <button type="button" class="btn btn-danger">Cancella</button>
      </div>
    </li>
   
    @endforeach
      
    
  </ul>

  <h2 >
    <a  href="{{route('admin.miei-ristoranti.index')}}">Back <<</a>
  </h2>
   
</div>  
</div>
@endsection