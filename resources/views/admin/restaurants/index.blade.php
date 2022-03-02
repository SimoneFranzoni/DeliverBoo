@extends('layouts.app')

@section('content')

<div class="container">

  @if (count($ristoranti)=== 0)
    <h1>Non hai ristoranti</h1>


    @else
      @foreach ($ristoranti as $ristorante)
      <div >
        <h1><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">{{$ristorante->name}}</a></h1>

        <a  class="btn btn-success" href="{{route('admin.miei-ristoranti.edit', $ristorante)}}">EDIT</a><br/>

        <form onsubmit="return confirm('Confermi eliminazione ristorante: {{$ristorante->name}}')"
          action="{{ route('admin.miei-ristoranti.destroy', $ristorante)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">DELETE</button>
          </form>
      </div>
      @endforeach
    @endif
    <a href="{{route('admin.miei-ristoranti.create')}}">
      Aggiungi ristorante
    </a><br/>
    <a  class="btn btn-dark" href="{{route('admin.index')}}">back <<</a>
  </div>  
  <div>   
     {{ $ristoranti->links() }}</div>    
@endsection
