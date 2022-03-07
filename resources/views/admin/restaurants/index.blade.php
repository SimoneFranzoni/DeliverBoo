@extends('admin.home')

@section('dashboard-content')
  <div class="">
    @if (count($ristoranti)=== 0)
    <div style="margin:50px;">

      <h2 class="card-team5 text-center text-danger">Non hai ancora registrato i tuoi ristoranti</h2>
    </div>
      
      
      
      @else
      <div class="d-flex">
        <h1  class="col-12 col-lg-8 text-center m-3">I miei ristoranti</h1>
      </div>
    

      <div class="restaurant-slider-team5 ">
        @foreach ($ristoranti as $ristorante)
          <div class="">
            <div class="card-team5 d-flex flex-wrap justify-content-between">
              <div class="col-12 col-md-8 d-flex align-items-center">
                <h3><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">{{$ristorante->name}}</a></h3>

              </div>
              <div class="d-flex col-12 col-md-4">
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
          
   
