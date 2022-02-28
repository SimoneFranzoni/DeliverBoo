@extends('layouts.app')
{{-- @dd($ristorante) --}}
@section('content')
<div class="container">
  <h1>{{$ristorante->name}}</h1>
  <h6>Indirizzo :{{$ristorante->address}}</h6>
  <h6>Teleforno :{{$ristorante->phone_number}}</h6>
  <ul>
    @foreach ($ristorante->plates as  $piatto)
    <li>{{$piatto->name}}</li>
    @endforeach
  </ul>
  <div><a href="{{route('admin.miei-ristoranti.index')}}">Back <<</a></div>
</div>  
</div>
@endsection