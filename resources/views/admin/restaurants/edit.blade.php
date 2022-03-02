@extends('layouts.app')

@section('content')


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
         {{-- Messaggio di Errore --}}
         @error('name')
            <div class="alert alert-danger">
               {{ $message }}
            </div>
         @enderror



         <div class="mb-3">
            <label for="city" class="form-label">Città</label>
            <input value="{{ old('city', $restaurant->city) }}" type="text" class="form-control" id="city" name="city" placeholder="Inserisci la città">
         </div>
           {{-- Messaggio di Errore --}}
           @error('city')
               <div class="alert alert-danger">
                  {{ $message }}
               </div>
            @enderror



         <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input value="{{ old('address', $restaurant->address) }}"  type="text" class="form-control" id="address" name="address" placeholder="Inserisci la via">
         </div>
           {{-- Messaggio di Errore --}}
         @error('address')
            <div class="alert alert-danger">
               {{ $message }}
            </div>
         @enderror


         <div class="mb-3">
            <label for="zip_code" class="form-label">CAP</label>
            <input value="{{ old('zip_code', $restaurant->zip_code) }}"  type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Inserisci il CAP">
         </div>
           {{-- Messaggio di Errore --}}
         @error('zip_code')
            <div class="alert alert-danger">
               {{ $message }}
            </div>
         @enderror


         <div class="mb-3">
            <label for="phone_number" class="form-label">Telefono</label>
            <input value="{{ old('phone_number', $restaurant->phone_number) }}"  type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Inserisci il numero di telefono">
         </div>
           {{-- Messaggio di Errore --}}
         @error('phone_number')
            <div class="alert alert-danger">
               {{ $message }}
            </div>
         @enderror

         <div class="mb-3">
            <label for="p_iva" class="form-label">P.IVA</label>
            <input value="{{ old('p_iva', $restaurant->p_iva) }}"  type="text" class="form-control" id="p_iva" name="p_iva" placeholder="Inserisci la P.IVA">
         </div>
           {{-- Messaggio di Errore --}}
         @error('p_iva')
            <div class="alert alert-danger">
               {{ $message }}
            </div>
         @enderror

         <div class="my-3">
            <h5>Categorie</h5>
            @foreach ($types as $type)
              <span class="d-inline-block mr-4" style="width:120px">
                <input 
                type="checkbox"
                name="types[]"
                value="{{ $type->id }}"
                id="type{{$loop->iteration}}"
                @if (!$errors->any() && $restaurant->types->contains($type->id))
                  checked
               @elseif ($errors->any() && in_array($type->id,old("types",[])))
               checked
              @endif
          
                >
                <label for="category{{$loop->iteration}}">{{$type->name}}</label>
              </span>
            @endforeach
         </div>
           {{-- Messaggio di Errore --}}
         @error('types')
            <div class="alert alert-danger">
               {{ $message }}
            </div>
         @enderror

      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-primary">Reset</button>
   </form>
  
   {{-- link di pagina precedente --}}
   <h2 class="mt-4">
      <a  href="{{route('admin.miei-ristoranti.index')}}">Back <<</a>
    </h2>
</div>   


@endsection