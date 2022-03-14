@extends('admin.home')
@section('dashboard-content')
<div class="container container-show-plates mt-4 pt-3  mb-4">
  <div class="row  my-4">
    <div class="col-12 col-sm-5">
      <h4>Nome del piatto </h4>
      <p>{{$piatto->name}}</p>
      <h4>Categoria </h4>
      <p>{{$piatto->category}}</p>
      <h4>Ingredienti </h4>
      <p>{{$piatto->ingrediants}}</p>
    </div>  
      @if ($piatto->cover)
        <div class="col-12 col-sm-7 ">
          <div class="img-show-team5  d-flex justify-content-center">
            @if($piatto->cover_up_by_user)
              <img src="{{asset('storage/'. $piatto->cover)}}" alt="{{ $piatto->cover_original_name }}">
            @else
              <img src="{{asset($piatto->cover)}}" alt="{{$piatto->name}}">
            @endif  
          </div>
        </div>
        @else
        <div class="col-12 col-sm-7 ">
          <div class="img-show-team5 d-flex justify-content-center">
            <img  src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+plates" alt="DeliveBoo">
          </div>
        </div>
      @endif

    

  </div>
    <h4>Descrizione</h4>
    <p>{{$piatto->description}}</p>
    <h4>Prezzo</h4>
    <p>{{$piatto->price}}€</p>
    <h4>Disponibilità</h4>
    @if($piatto->is_available)
      <span class="badge bg-success text-white px-1"><strong>Disponibile</strong></span>
      @else
          <span class="badge bg-danger text-white px-1"><strong>Non disponibile</strong></span> 
      @endif  
    <p>{{$piatto->is_availeble}}</p>
    {{-- bottoni modifica e elimina --}}
    <div class="">
              
      <a  href="{{route('admin.miei-ristoranti.piatti.edit',[$ristorante->slug,$piatto->slug])}}">
        <button type="button" class="btn-team5"> Modifica</button>
      </a> 
      
      <form class="d-inline-block" action="{{route('admin.miei-ristoranti.piatti.destroy',[$ristorante,$piatto])}}"  method="POST" onsubmit="return confirm('confermare elimizione {{$piatto->name}}')">
        @csrf
        @method('DELETE')
      <button type="submit" class="btn-team5">Cancella</button>
      </form>
      

    </div> 
    {{-- bottone indietro --}}

      <a class="my-4"  href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">
          <button class="btn-team5">Back <<</button> 
      </a>
 
 
@endsection
  


  

 
  