<!DOCTYPE html>

<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-image: url('/assets/img/afms_background.jpg');
        background-size: contain;
        background-repeat: no-repeat;
        background-size: cover;
    }

    a:visited {
        background-color: rgb(255, 166, 0);
    }
</style>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:pt-10 p-6">
                <div  class="w-auto text-gray-700">
                        <img src="{{ URL::to('/assets/img/afms_logo_small.PNG')}}"/>
                </div>
            </div>
            <div>
                {{ $slot }}
            </div>
        </div>
        {{-- <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div> --}}
    </body>
</html>
