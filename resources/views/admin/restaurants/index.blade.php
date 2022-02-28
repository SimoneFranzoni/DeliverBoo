@extends('layouts.app')
{{-- @dd($ristoranti) --}}
@section('content')

<div class="container">
  <div if(!$ristoranti)>
    Non ci sono ristoranti
  </div>
  <div else>
    @foreach ($ristoranti as $ristorante)
    <h1><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante['nome'])}}">{{$ristorante['nome']}}</a></h1>
    @endforeach
    <div><a href="{{route('admin.index')}}">Back <<</a></div>
  </div>
</div>      
@endsection
