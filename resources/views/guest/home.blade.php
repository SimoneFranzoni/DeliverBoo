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

        @include('guest.partials.header')


            <div id="app">
                
            </div>

            <script src="{{asset('js/guest/app.js')}}"></script>
        </div>
    </body>
</html>
