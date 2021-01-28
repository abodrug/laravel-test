<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{  csrf_token()  }}">

    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('/vendor/horizon/app.css') }}" rel="stylesheet">

    <style type="text/css">
        .nav-item {
            margin: 0px 10px;
        }
    </style>

</head>
<body>
<div>
    @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
            @auth
                        <li class="nav-item"><a href="{{ route('home') }}" class="text-sm text-gray-700 underline">Home</a></li>
                        <li class="nav-item"><a href="{{ route('tokens') }}" class="text-sm text-gray-700 underline">All Tokens</a></li>
                        <li class="nav-item"><a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline">Admin BackPack</a></li>
                        <li class="nav-item"><a href="{{ route('bot') }}" class="text-sm text-gray-700 underline">BotMan</a></li>
                        <li class="nav-item"><a href="{{ route('logout') }}" class="text-sm text-gray-700 underline">Logout ( {{Auth::user()->name}} )</a></li>
            @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a></li>

                @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                @endif
            @endif
                </ul>
            </div>
        </nav>
    @endif
    <div id="app" >
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</div>
</body>
</html>
