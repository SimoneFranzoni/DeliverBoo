@extends('admin.home')

@section('dashboard-content')
  <div class="">
    @if (count($ristoranti)=== 0)
      <h1>Non hai ristoranti</h1>
      <a href="{{route('admin.miei-ristoranti.create')}}">
        <button type="button" class="btn btn-success">Nuovo Ristorante</button>
      </a>
      
      
      @else
      <div class="d-flex">
        <h1  class="col-md-8 mb-5 text-center mt-3">I miei ristoranti</h1>
      </div>
       

      <div style="padding:0px;">
        @foreach ($ristoranti as $ristorante)
          <div class="card-team5">
            <div class="d-flex flex-wrap justify-content-between mb-3">
              <div class="col-12 col-md-8 d-flex align-items-center">
                <h2><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">{{$ristorante->name}}</a></h2>

              </div>
              <div class="d-flex col-12 col-md-4">
                <a  href="{{route('admin.miei-ristoranti.edit', $ristorante)}}">
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


       {{-- link di pagina precedente --}}
    <h2 >
      <a  href="{{route('admin.index')}}">
       <button class="btn-team5 btn-back-team5">Back <<</button> 
      </a>
    </h2>
  </div> 




  <div>   
      {{ $ristoranti->links() }}
  </div>    
@endsection
          
   


  