@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{$ristorante['nome']}}</h1>
  <h6>Indirizzo :{{$ristorante['indirizzo']}}</h6>
  <h6>Teleforno :{{$ristorante['telefono']}}</h6>
  @foreach ($ristorante['piatti'] as $tipologie => $piatti)
  <ul>
    {{$tipologie}}
    @foreach ( $piatti as $tipologia => $piatto)
    
    <li><a href="{{route('admin.miei-ristoranti.piatti.show',[$piatto['nome'],$ristorante['nome']])}}">{{$piatto['nome']}}</a></li>
    @endforeach
  </ul>
  @endforeach
  <div><a href="{{route('admin.miei-ristoranti.index')}}">Back <<</a></div>
</div>  
</div>
@endsection