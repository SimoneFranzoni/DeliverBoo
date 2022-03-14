@extends('admin.home')

@section('dashboard-content')
  <div class="">
    @if (count($ristoranti)=== 0)
    <div style="margin:50px;">

      <h3 class="card-team5 text-center text-danger">Non hai ancora registrato i tuoi ristoranti</h3>
    </div>
      
      
      
      @else
      <div class="d-flex">
        <h1  class="col-12 col-lg-8  my-3">I miei ristoranti</h1>
      </div>
    

      <div class="restaurant-slider-team5 ">
        @foreach ($ristoranti as $ristorante)
          <div class="">
            <div class="card-team5 d-flex flex-wrap justify-content-between align-item-center">
              <div class="col-12 col-md-8 d-flex align-items-center">
                {{-- immagine ristorante --}}
                <div 
                style=" max-height: 110px;
                       width: 110px;
                       border-radius: 15px;"
                class="plate-img col-3 p-0">
                  @if ($ristorante->cover)
                    <img  
                    style="width: 100%;
                           height: 100%;
                           border-radius: 15px;
                           overflow: hidden;
                           object-fit: cover;"
                    src="{{asset('storage/' . $ristorante->cover)}}" alt="{{$ristorante->name}}">
                  @else
                    <img class="img-restaurant" src="https://via.placeholder.com/350x290/45CCBC/FFFFFF?Text=DeliverBoo+restaurant" alt="{{$ristorante->name}}">
                  @endif
                </div>
                {{-- ******************************************** --}}

                <h3><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">{{$ristorante->name}}</a></h3>

              </div>
              <div class="d-flex col-12 col-md-4 button-container-restautant">
                <a  href="{{route('admin.miei-ristoranti.edit', $ristorante->slug)}}">
                  <button class="btn-team5 mr-1">Modifica</button>  
                </a>
                <form class="d-inline-block" onsubmit="return confirm('Confermi eliminazione ristorante: {{$ristorante->name}}')"
                  action="{{ route('admin.miei-ristoranti.destroy', $ristorante)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-team5">Cancella</button>
                </form>
              </div> 
            </div>
          </div> 
        @endforeach
      </div>


      
    @endif
  
  </div> 

   
@endsection
          
   
