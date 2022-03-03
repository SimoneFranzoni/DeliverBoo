@extends('layouts.app')

@section('content')
<div class="container">
  {{-- messaggio di cancellazione elemento (qualora venisse cancellato) --}}
  @if(session('deleted'))
  <div class="alert alert-danger" role="alert">
    {{session('deleted')}}
  </div>
  @endif
  {{-- info ristorante --}}
  <div class="d-md-flex justify-content-between mb-5">
    <div class="col-md-8">
      <h1>{{$ristorante->name}}</h1>
      <h6>Indirizzo :{{$ristorante->address}}</h6>
      <h6>Teleforno :{{$ristorante->phone_number}}</h6>
      @forelse ($ristorante->types as $type)
          <span class="badge bg-primary">{{$type->name}}</span>
      @empty
      @endforelse

      @if ($ristorante->cover !== "https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+plates")
      <div class="img">
<<<<<<< HEAD
          <img width="400" src="{{asset('storage/'. $ristorante->cover)}}" alt="{{ $ristorante->cover_original_name }}">
      </div>
      @else
      <div class="img">
          <img width="400" src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+plates" alt="DeliveBoo">
=======
        <img width="400" src="{{asset('storage/' . $ristorante->cover)}}" alt="{{$ristorante->name}}">
      </div>
      @else
      <div class="img">
        <img width="400" src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+restaurant" alt="{{$ristorante->name}}">
>>>>>>> fb19d06c2d3083481acb896c367ba128cd1c6e95
      </div>
      @endif
      
      

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
      <div class="col-12 col-md-8 d-flex align-items-center ">
        
        {{-- categoria --}}
        <span>{{$piatto->category}} : </span> 
        
        {{-- nome piatto --}}
        <a href="{{route('admin.miei-ristoranti.piatti.show',[$ristorante->slug,$piatto->slug])}}"> {{$piatto->name}}</a>
      </div>
       
        {{-- pulsanti di modifica e cancellazione --}}
      <div class="col-12 col-md-4">
        <a  href="{{route('admin.miei-ristoranti.piatti.edit',[$ristorante->slug,$piatto->slug])}}">
          <button type="button" class="btn btn-info"> Modifica</button>
        </a> 
        
        <form class="d-inline-block" action="{{route('admin.miei-ristoranti.piatti.destroy',[$ristorante,$piatto])}}"  method="POST" onsubmit="return confirm('confermare elimizione {{$piatto->name}}')">
          @csrf
          @method('DELETE')
        <button type="submit" class="btn btn-danger">Cancella</button>
        </form>
        
      </div>
    </li>
    @endforeach
  </ul>


  <div class="col-2 col-md-4 offset-8">
    <a  href="{{route('admin.miei-ristoranti.ordini.index',$ristorante->slug)}}">
      <button type="button" class="btn btn-warning">Vedi Ordini</button>
    </a>
  </div> 


   {{-- link di pagina precedente --}}
  <h2 >
    <a  href="{{route('admin.miei-ristoranti.index')}}">Back <<</a>
  </h2>

  {{-- paginazione bootstrap --}}
  <div>
    {{$piatti->links()}}
  </div>
</div> 
</div>
@endsection
      
    
