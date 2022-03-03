@extends('layouts.app')

@section('content')

<div class="container">

  @if (count($ristoranti)=== 0)
    <h1>Non hai ristoranti</h1>
    
    
    
    @else
    <div class="d-flex">
      <h1  class="col-md-8 mb-5">I miei ristoranti</h1>
      <div class="col-2 col-md-4">
        <a href="{{route('admin.miei-ristoranti.create')}}">
          <button type="button" class="btn btn-success">Nuovo Ristorante</button>
        </a>
      </div> 

    </div>
    <ul style="padding:0px;">
      @foreach ($ristoranti as $ristorante)
        <li class="d-flex flex-wrap justify-content-between mb-3">
          <div class="col-12 col-md-8 d-flex align-items-center ">
            <h1><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">{{$ristorante->name}}</a></h1>

          </div>
          <div class="d-flex col-12 col-md-4">
            <a  href="{{route('admin.miei-ristoranti.edit', $ristorante)}}">
              <button class="btn btn-info mr-1">Modifica</button>  
            </a>

            <form class="d-inline-block" onsubmit="return confirm('Confermi eliminazione ristorante: {{$ristorante->name}}')"
              action="{{ route('admin.miei-ristoranti.destroy', $ristorante)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Cancella</button>
            </form>
          </div> 
        </li>
      @endforeach
    </ul>
    @endif
    <br/>
    <h2><a href="{{route('admin.index')}}">back <<</a></h2>
  </div>  
  <div>   
     {{ $ristoranti->links() }}</div>    
@endsection
