@extends('layouts.app')

@section('content')
<div class="background-team5">
<div class="container homeAdmin">
    <div class="row">
        <div class="col-lg-3">
            <div class="dash-board-team5 mt-5">
                <h1 class="dash-board-top-team5">
                    Ciao {{$user->name}}
                </h1>

                <div class="dash-board-bottom-team5 d-flex justify-content-center flex-wrap">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('admin.index')}}">
                        <button class="btn-team5 btn-dashboard-team5">Home</button>
                    </a>
                    <a href="{{route('admin.miei-ristoranti.index')}}">
                        <button class="btn-team5 btn-dashboard-team5">Vai ai ristoranti</button>
                    </a>
                    

                    {{-- crea nuovo ristorante --}}
                   
                    <a href="{{route('admin.miei-ristoranti.create')}}">
                        <button class="btn-team5 btn-dashboard-team5">Nuovo Ristorante</button>
                    </a>
                        
                     
                </div>
            </div>
        </div>
    
        <div class="col-lg-9">
            
                @yield('dashboard-content')
    
         
        </div>
    
    </div>
</div>

</div>
@endsection
