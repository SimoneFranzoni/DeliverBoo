@extends('layouts.app')
@section('content')
<div class="container">

  <h3>Nome del piatto </h3>
  <p>{{$piatto->name}}</p>
  <h3>Categoria </h3>
  <p>{{$piatto->category}}</p>
  <h3>Ingredienti </h3>
  <p>{{$piatto->ingrediants}}</p>
  <h3>Descrizione</h3>
  <p>{{$piatto->description}}</p>
  <h3>Prezzo</h3>
  <p>{{$piatto->price}}</p>
  <div><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">Back <<</a></div>

  @if ($piatto->cover)
  <div class="img">
      <img width="400" src="{{ asset('storage/' . $piatto->cover ) }}" alt="{{ $piatto->name }}">
  </div>
  @endif

</div>
@endsection