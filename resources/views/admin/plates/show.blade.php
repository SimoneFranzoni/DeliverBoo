@extends('layouts.app')
@section('content')
<div class="container">

  <h2>Descrizione: </h2>
  <p>{{$piatto}}</p>
  <div><a href="{{route('admin.miei-ristoranti.piatti.index',$nomeRistorante)}}">Back <<</a></div>
</div>
@endsection