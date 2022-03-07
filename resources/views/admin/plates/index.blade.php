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
  <div class="row justify-content-between mb-5">
    <div class="col-lg-8 mt-4">
      <h1 class="restaurant-name-team5">{{$ristorante->name}}</h1>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-6 mt-3">
            
            <div class="info-restaurant-team5">
              @if ($ristorante->cover)
                  <img class="restaurant-index-img-team5" width="100%" src="{{asset('storage/'. $ristorante->cover)}}" alt="{{ $ristorante->cover_original_name }}">
              @else
                  <img width="100%" src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+plates" alt="DeliveBoo">
              @endif
              <div class="mt-2">
                <a  href="{{route('admin.miei-ristoranti.edit', $ristorante->slug)}}">
                  <button class="btn-team5 mr-1" style="font-size: 12px">Modifica Ristorante</button>  
                </a>
              </div>            
            </div>
          </div>
          <div class="col-12 col-md-6 mt-5">
            <h6>Indirizzo : {{$ristorante->address}}</h6>
            <h6>Teleforno : {{$ristorante->phone_number}}</h6>
            @forelse ($ristorante->types as $type)
                <span class="badge-team5">{{$type->name}}</span>
            @empty
            @endforelse
          </div>
          
        </div>
      </div>
    </div>
      


      

    
    <div class="col-12 col-md-6 offset-md-3 d-flex justify-content-center d-lg-block offset-lg-0 col-lg-3  mt-5 right-dashboard-plates-team5">
      <a  href="{{route('admin.miei-ristoranti.piatti.create',$ristorante->slug)}}">
        <button type="button" class="btn-team5">Nuovo piatto</button>
      </a>
  
      <a  href="{{route('admin.miei-ristoranti.ordini.index',$ristorante->slug)}}">
        <button type="button" class="btn-team5">Vedi Ordini</button>
      </a>
    </div> 
    
  </div>


      {{-- container card  --}}
      
  @if (count($piatti)===0)
  <h3 class="card-team5 text-center text-danger">non sono presenti piatti</h3>
  
  @else 
  <div class="container container-team5 my-5 ">
    <div class=" p-0 slider-team5">
      {{-- card piatti --}}
      @foreach ($piatti as  $piatto)
      <div class="flip-card flip-card-team5">
        <div class="flip-card-inner">
          <div class="flip-card-front ">
            <div class="card-front-top-team5">
              @if ($piatto->cover)
              <div class="img-team5">
                <img src="{{asset('storage/' . $piatto->cover)}}" alt="{{$piatto->name}}">
              </div>
              @else
              <div class="img-team5">
                <img  src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+restaurant" alt="{{$piatto->name}}">
              </div>
              @endif
            </div>
            <div class="card-front-bottom-team5">
              <h6>{{$piatto->name}}</h6>
              <div class="plate-info-price-available">
                <span class="text-black-50">Prezzo : {{$piatto->price}}€</span> 
                @if($piatto->is_available)
                <span class="text-success"><strong>disp</strong></span>
                @else
                    <span class="text-danger"><strong>non disp</strong></span> 
                @endif  
              </div>
            </div>
          </div> 
          
          <div class="flip-card-back">      
              <div class="card-body">
                
                  <a href="{{route('admin.miei-ristoranti.piatti.show',[$ristorante->slug,$piatto->slug])}}"> <button type="button" class="btn-team5" style="font-size: 12px ; width:80%"> Mostra</button>
                  </a>
                  <a  href="{{route('admin.miei-ristoranti.piatti.edit',[$ristorante->slug,$piatto->slug])}}">
                    <button type="button" class="btn-team5" style="font-size: 12px;  width:80%"> Modifica</button>
                  </a> 
                  
                  <form style="width:100%;"class="d-inline-block" action="{{route('admin.miei-ristoranti.piatti.destroy',[$ristorante,$piatto])}}"  method="POST" onsubmit="return confirm('confermare elimizione {{$piatto->name}}')">
                    @csrf
                    @method('DELETE')
                  <button type="submit" class="btn-team5" style="font-size: 12px;  width:80%">Cancella</button>
                  </form>
                  

              </div>

            
          </div>
        </div> 
      </div>


      {{-- card che viene visualizzara su piccoli schermi --}}

        <div class="col-12 col-md-6 tableview-team5"> 
          
          <div class="img-frame-team5">
            <a href="{{route('admin.miei-ristoranti.piatti.show',[$ristorante->slug,$piatto->slug])}}" class="">
              @if ($piatto->cover)
              <div class="img-team5">
                <img src="{{asset('storage/' . $piatto->cover)}}" alt="{{$piatto->name}}">
              </div>
              @else
              <div class="img-team5">
                <img  src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+restaurant" alt="{{$piatto->name}}">
              </div>
              @endif
              
            </a>
            <div class="plate-name">
              <div class="plate-info">
                
                <h5> {{$piatto->name}} </h5> 
                  
                <div class="plate-info-price-available ">
                  <span class="text-black-50">Prezzo : {{$piatto->price}}€ </span> 
                  @if($piatto->is_available)
                    <span class="text-success"><strong>disp</strong></span>
                  @else
                      <span class="text-danger"><strong>non disp</strong></span> 
                @endif  
                </div>
              </div>
              <div class="button-card-middle-view-team5">
                <a  href="{{route('admin.miei-ristoranti.piatti.edit',[$ristorante->slug,$piatto->slug])}}">
                  <button type="button" class="btn-team5" style="font-size: 12px;  width:80%"> Modifica</button>
                </a> 
                
                <form style="width:100%;"class="d-inline-block" action="{{route('admin.miei-ristoranti.piatti.destroy',[$ristorante,$piatto])}}"  method="POST" onsubmit="return confirm('confermare elimizione {{$piatto->name}}')">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn-team5" style="font-size: 12px;  width:80%">Cancella</button>
                </form>
              </div>
            </div>
           
          </div>
        </div>    
      @endforeach
    </div>
  </div>
  @endif 
 


  
  


   {{-- link di pagina precedente --}}
  <h2 >
    <a  href="{{route('admin.miei-ristoranti.index')}}">
      <button class="btn-team5 btn-back-team5">Back <<</button>
    </a>
  </h2>

  {{-- paginazione bootstrap --}}
  
</div> 
</div>
@endsection
      
    

