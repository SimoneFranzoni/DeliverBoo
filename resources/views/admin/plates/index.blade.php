@extends('admin.home')

@section('dashboard-content')
<div class="container">
  {{-- messaggio di cancellazione elemento (qualora venisse cancellato) --}}
  @if(session('deleted'))
  <div class="alert alert-danger" role="alert">
    {{session('deleted')}}
  </div>
  @endif
  {{-- info ristorante --}}
  <div class="d-md-flex justify-content-between mb-5">
    <div class="col-lg-8 mt-4">
      <h1 class="restaurant-name-team5">{{$ristorante->name}}</h1>
      <h6>Indirizzo :{{$ristorante->address}}</h6>
      <h6>Teleforno :{{$ristorante->phone_number}}</h6>
      @forelse ($ristorante->types as $type)
          <span class="badge-team5">{{$type->name}}</span>
      @empty
      @endforelse
      


      @if ($ristorante->cover)
      <div class="img">
          <img width="400" src="{{asset('storage/'. $ristorante->cover)}}" alt="{{ $ristorante->cover_original_name }}">
      </div>
      @else
      <div class="img">
          <img width="400" src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+plates" alt="DeliveBoo">
      </div>
      @endif

    </div>
    
    <div class="col-4 col-xl-3 mt-5 right-dashboard-plates-team5">
      <a  href="{{route('admin.miei-ristoranti.piatti.create',$ristorante->slug)}}">
        <button type="button" class="btn-team5">Nuovo piatto</button>
      </a>
  
      <a  href="{{route('admin.miei-ristoranti.ordini.index',$ristorante->slug)}}">
        <button type="button" class="btn-team5">Vedi Ordini</button>
      </a>
    </div> 
    
  </div>


      {{-- container card  --}}
  <div class="container my-5">
    <div class="row">
      
      {{-- card piatti --}}
      @foreach ($piatti as  $piatto)
      <div class="flip-card col-6 col-sm-4 col-md-3">
        <div class="flip-card-inner">
          <div class="flip-card-front">
              @if ($ristorante->cover)
              <div class="img-team5">
                <img src="{{asset('storage/' . $ristorante->cover)}}" alt="{{$ristorante->name}}">
              </div>
              @else
              <div class="img-team5">
                <img  src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+restaurant" alt="{{$ristorante->name}}">
              </div>
              @endif
              <h4>{{$piatto->name}}</h4>
          </div> 
          
          <div class="flip-card-back">      
              <div class="card-body">
                <h5 class="card-title">
                  <a href="{{route('admin.miei-ristoranti.piatti.show',[$ristorante->slug,$piatto->slug])}}"> {{$piatto->name}}</a>
                </h5>
                <p class="card-text">{{$piatto->description}}</p>
              </div>


              {{-- pulsanti modifica e cancella --}}
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

            </div>
          </div>
        </div>   
      @endforeach
    </div>
  </div>


  


   {{-- link di pagina precedente --}}
  <h2 >
    <a  href="{{route('admin.miei-ristoranti.index')}}">
      <button class="btn-team5 btn-back-team5">Back <<</button>
    </a>
  </h2>

  {{-- paginazione bootstrap --}}
  <div>
    {{$piatti->links()}}
  </div>
</div> 
</div>
@endsection
      
    

