@extends('admin.home')

@section('dashboard-content')
<div class="container-lg p-0">
  {{-- messaggio di cancellazione elemento --}}
  @if(session('deleted'))
  <div class="alert alert-danger" role="alert">
    {{session('deleted')}}
  </div>
  @endif
  <div >
    @if (count($piatti)=== 0)
    <div style="margin:50px;">
      <h3 class="card-team5 text-center text-danger">Non sono presenti piatti</h3>
      
    </div>
    
    @else
    <div class="d-flex flex-wrap">

      <h1  class="col-12 col-md-8  my-3">{{$ristorante->name}}</h1>

      <div class="col-12 col-md-3 offset-md-1 right-dashboard-plates-team5 ">
        <a  href="{{route('admin.miei-ristoranti.piatti.create',$ristorante->slug)}}">
          <button class="btn-team5">Nuovo piatto</button>
        </a>
    
        <a  href="{{route('admin.miei-ristoranti.ordini.index',$ristorante->slug)}}">
          <button  class="btn-team5">Vedi Ordini</button>
        </a>
      </div> 
    </div>
      
      
    

    <div class="plate-slider-team5 p-0">
      @foreach ($piatti as $piatto)
        <div class="card-piatti-team5 ">
          <div class="  d-flex align-items-center justify-content-between">
           
              <a class=" col-6" href="{{route('admin.miei-ristoranti.piatti.show',[$ristorante->slug,$piatto->slug])}}">
                <div class="left card-piatti-team5-left ml-3 d-flex col-12">
                  <div class="plate-img">
                    @if ($piatto->cover)
                      <img src="{{asset('storage/' . $piatto->cover)}}" alt="{{$piatto->name}}">
                    @else
                      <img  src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+restaurant" alt="{{$piatto->name}}">
                    @endif
                  </div>
              
    
                  <div class="col-8">
                    <div class="name">{{$piatto->name}}</div>
                    <div class="price">
                        € {{$piatto->price}}
                      
                        @if($piatto->is_available)
                          <span class="text-success"><strong>Disp.</strong></span>
                        @else
                          <span class="text-danger"><strong>Non disp.</strong></span> 
                        @endif  
                      
                    </div>
                  </div>
                </div>
              </a>
          
            <div class="d-flex col-12 col-md-6 justify-content-end plate-button">

              <a  href="{{route('admin.miei-ristoranti.piatti.edit',[$ristorante->slug,$piatto->slug])}}">
                <button type="button" class="btn-team5" > Modifica</button>
              </a> 
              <form class="d-inline-block" action="{{route('admin.miei-ristoranti.piatti.destroy',[$ristorante,$piatto])}}"  method="POST" onsubmit="return confirm('confermare elimizione {{$piatto->name}}')">
                @csrf
                @method('DELETE')
              <button type="submit" class="btn-team5" >Cancella</button>
              </form>
            </div> 
          </div>

        </div> 
      @endforeach
    </div>

    {{-- small view --}}
    <div class="small-plate-slider-team5 p-0">
      <div class="small-card-piatti-team5">
        <div class="d-flex col-12 flex-wrap justify-content-between text-center">
          @foreach ($piatti as $piatto)
          
          
            <div class="left p-0 d-flex col-12 ">
              <div class="plate-img col-5 p-0">
                <a  href="{{route('admin.miei-ristoranti.piatti.show',[$ristorante->slug,$piatto->slug])}}">
                @if ($piatto->cover)
                  <img src="{{asset('storage/' . $piatto->cover)}}" alt="{{$piatto->name}}">
                @else
                  <img  src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+restaurant" alt="{{$piatto->name}}">
                @endif
                </a>
              </div>
  
              
              <div class="col-7">
                <div class="name">{{$piatto->name}}</div>
                <div class="price-available">
                  <span class="price">
                    € {{$piatto->price}}
                  </span>  
                  <span>
                    @if($piatto->is_available)
                      <span class="text-success"><strong>Disp.</strong></span>
                    @else
                      <span class="text-danger"><strong>Non disp.</strong></span> 
                    @endif  
                  </span>
                </div>
                <div class="d-flex justify-content-center justify-md-end card-plate-button d-none">
                  <a  href="{{route('admin.miei-ristoranti.piatti.edit',[$ristorante->slug,$piatto->slug])}}">
                    <button type="button" class="btn-team5" > Modifica</button>
                  </a> 
                  <form class="d-inline-block" action="{{route('admin.miei-ristoranti.piatti.destroy',[$ristorante,$piatto])}}"  method="POST" onsubmit="return confirm('confermare elimizione {{$piatto->name}}')">
                    @csrf
                    @method('DELETE')
                  <button type="submit" class="btn-team5" >Cancella</button>
                  </form>
                </div> 
              </div>
              
              
            </div>
          @endforeach
        </div>
      </div> 
    </div>
  @endif

</div> 
  
      
            
            
            
            
            
            
  
  
  
  {{-- link di pagina precedente --}}
<h2 >
   <a  href="{{route('admin.miei-ristoranti.index')}}">
     <button class="btn-team5 ">Back <<</button>
   </a>
</h2>

 {{-- paginazione bootstrap --}}
 
  </div> 
</div>
@endsection

  
  


      
    

