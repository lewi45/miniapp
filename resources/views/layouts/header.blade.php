<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mini API Demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
         
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css'); }}" />
    </head>
    <body class="antialiased">
        <div class="header row">
   
            <div class="col-md-4 col-xs-12 logo"> WEATHER SEEKER</div>
            <div class="col-md-8 col-xs-12 menu">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    <a href="{{ url('/current') }}" class="toplink">API actual</a>
                    <a href="{{ url('/list') }}" class="toplink">Data by Cities</a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="toplink">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="toplink">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="toplink">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>

        </div>        
        <div class="mycontainer" style="margin-top: 70px"> <!-- main container -->