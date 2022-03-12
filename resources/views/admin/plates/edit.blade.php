@extends('admin.home')

@section('dashboard-content')
<div class="container">


  <div class="row">
    <div class="col-10 offset-1 offset-lg-0">
 
      <h2 class="mt-4">Modificare piatto : {{$piatto->name}}</h2>
      
      {{-- si passano due parametri causa utilizzo CRUD innestata(vedi rotte con route:list) --}}
      <form action="{{route('admin.miei-ristoranti.piatti.update',[$ristorante,$piatto])}}" 
      enctype="multipart/form-data"
      method="POST">
        @csrf
        @method('PUT')
        {{--  nome piatto--}}
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input required minlength="3" maxlength="100"
            class="form-control @error('name') is-invalid  @enderror" 
            type="text"  
            name="name" 
            id="name" 
            aria-describedby="emailHelp"
            value="{{old('name',$piatto->name)}}"
          >
        </div>
        {{-- messaggio errore --}}
        @error('name') 
          <div class="alert alert-danger">{{$message}} </div>
        @enderror  

        {{-- ingredienti piatto --}}
        <div class="mb-3">
          <label for="ingrediants" class="form-label">Ingredienti</label>
          <input required minlength="5" maxlength="1000"
            type="text"  
            class="form-control @error('ingrediants') is-invalid  @enderror" 
            name="ingrediants" 
            id="ingrediants" 
            aria-describedby="emailHelp"
            value="{{old('ingrediants',$piatto->ingrediants)}}"
          >
        </div>
        {{-- messaggio errore --}}
        @error('ingrediants') 
          <div class="alert alert-danger">{{$message}} </div>
        @enderror


        {{-- descrizione piatto --}}
        <div class="form-group">
          <label for="description">Descrizione</label>
          <textarea required minlength="10" maxlength="1000" class="form-control @error('description') is-invalid  @enderror" name="description" id="description" rows="3">{{old('description',$piatto->description)}}</textarea>
        </div>
        {{-- messaggio errore --}}
        @error('description') 
          <div class="alert alert-danger">{{$message}} </div>
        @enderror
       

        {{-- prezzo piatto --}}
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">€</span>
          </div>
          <input required max="99.99"
          type="decimal"  
          class="form-control @error('price') is-invalid  @enderror" 
          name="price" 
          id="price" 
          aria-describedby="emailHelp"
          value="{{old('price',$piatto->price)}}"
          >
        </div>
        {{-- messaggio errore --}}
        @error('price') 
          <div class="alert alert-danger">{{$message}} </div>
        @enderror

        
        {{-- categoria piatto (select) --}}
        <div>
          <select required
          name="category"
          id="category"
          class="form-control mb-5 @error('category') is-invalid  @enderror" >
            <option value="">Seleziona una categoria</option>
            @foreach ($categories as $category)
                
             <option 
             @if (  $category == old('category',$piatto->category)  ) selected @endif
             value="{{$category}}">{{$category}}</option>
            @endforeach
          </select>
        </div>
        {{-- messaggio errore --}}
        @error('category') 
          <div class="alert alert-danger">{{$message}} </div>
        @enderror
        

        {{-- disponibilita' piatto (boxradio) --}}
        <div class="form-check">
          <input required class="form-check-input" type="radio" name="is_available" id="is_available" value="{{old('is_available',1)}}" @if($piatto->is_available==1) checked @endif>
          <label class="form-check-label" for="is_available">
            Disponibile
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="is_available" id="is_available" value="{{old('is_available',0)}}" @if($piatto->is_available==0) checked @endif>
          <label class="form-check-label" for="is_available">
            Non disponibile
          </label>
        </div>

        <div class="my-3">
          @if ($piatto->cover)
             <div>
                <img width="150" src="{{asset('storage/'. $piatto->cover)}}" alt="{{$piatto->cover_original_name}}">
             </div>
          @endif
          <label for="cover">Carica un'immagine:</label>
          <input type="file" class="form-control" name="cover" id="cover">
       </div>
       {{-- Messaggio di Errore --}}
       @error('cover')
          <div class="alert alert-danger">
             {{ $message }}
          </div>
       @enderror
        

        {{-- pulsanti --}}
        <button type="submit" class="btn-team5 ">Submit</button>
        <button type="reset" class="btn-team5 ">reset</button>
      </form>

    </div>
  </div>
  <h2 class="mt-4">
    <a  href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">
       <button class="btn-team5">Back <<</button> 
    </a>
  </h2>  
</div>
@endsection