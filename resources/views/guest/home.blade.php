<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DeliveBoo</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0-1/css/all.min.css" integrity="sha512-xEGx3E22YcUzfX525T3KV7SqNexb09E2CckB6lBB/dT930VlbSX9JnQlLiogtSLAl9yGAJGKDu7O1ZanrqljGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{asset('css/guest/style.css')}}">

    </head>
    <body>
        @include('guest.partials.header')

        <div id="app">
            {{-- app vue per front end --}}
        </div>

        @include('guest.partials.footer')
        <script src="{{asset('js/guest/app.js')}}"></script>
    </body>
</html>
