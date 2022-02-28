@extends('layouts.app')
{{-- @dd($ristoranti) --}}
@section('content')
@dump($ristoranti)
<div class="container">
  {{-- @if($ristoranti)
  <div >
    Non ci sono ristoranti
  </div> --}}
  <div >
    @foreach ($ristoranti as $ristorante)
    <h1><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->name)}}">{{$ristorante->name}}</a></h1>
    @endforeach
    <div><a href="{{route('admin.index')}}">Back <<</a></div>
  </div>
</div>      
@endsection
