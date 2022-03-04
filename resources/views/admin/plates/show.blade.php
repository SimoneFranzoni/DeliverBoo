@extends('admin.home')
@section('dashboard-content')
<div class="container">
  <div class="row mt-4">
    <div class="col-12 col-sm-6">
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
    </div>
  

 
  @if ($piatto->cover)
  <div class="col-12 col-sm-6 img">
      <img width="100%" src="{{asset('storage/'. $piatto->cover)}}" alt="{{ $piatto->cover_original_name }}">
  </div>
  @else
  <div class="col-12 col-sm-6 img">
      <img width="100%" src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+plates" alt="DeliveBoo">
  </div>
  @endif

</div>
@endsection