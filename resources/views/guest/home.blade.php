<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DeliveBoo</title>
       <link rel="stylesheet" href="{{asset('css/guest/style.css')}}">
    </head>
    <body>
      <div class="flex-center position-ref full-height">
          {{-- nav login --}}
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('admin.index') }}">Il Tuo Profilo</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div id="app">
                
            </div>

            <script src="{{asset('js/guest/app.js')}}"></script>
        </div>
    </body>
</html>
