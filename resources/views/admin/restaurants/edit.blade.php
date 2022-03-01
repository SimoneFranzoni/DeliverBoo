@extends('layouts.app')

@section('content')

@dump($restaurant)

<div class="container">
   <h1 class="">Crea il tuo ristorante</h1>
   
   <form action="{{route('admin.miei-ristoranti.update', $restaurant)}}"
   method="POST">
    @csrf
    @method('PUT')

         <div class="mb-3">
            <label for="name" class="form-label">Nome ristorante</label>
            <input value="{{ old('name', $restaurant->name) }}" type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome">
         </div>

         <div class="mb-3">
            <label for="city" class="form-label">Città</label>
            <input value="{{ old('city', $restaurant->city) }}" type="text" class="form-control" id="city" name="city" placeholder="Inserisci la città">
         </div>

         <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input value="{{ old('address', $restaurant->address) }}"  type="text" class="form-control" id="address" name="address" placeholder="Inserisci la via">
         </div>

         <div class="mb-3">
            <label for="zip_code" class="form-label">CAP</label>
            <input value="{{ old('zip_code', $restaurant->zip_code) }}"  type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Inserisci il CAP">
         </div>

         <div class="mb-3">
            <label for="phone_number" class="form-label">Telefono</label>
            <input value="{{ old('phone_number', $restaurant->phone_number) }}"  type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Inserisci il numero di telefono">
         </div>

         <div class="mb-3">
            <label for="p_iva" class="form-label">P.IVA</label>
            <input value="{{ old('p_iva', $restaurant->p_iva) }}"  type="text" class="form-control" id="p_iva" name="p_iva" placeholder="Inserisci la P.IVA">
         </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-primary">Reset</button>
   </form>

</div>   


@endsection