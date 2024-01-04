<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="">
        @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
    </div>
    {{-- <div class="links">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div> --}}
<h1>test</h1>
<h2>Faisal</h2>
<h3>
    desktop
</h3>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam alias excepturi odit ipsum soluta numquam eaque, debitis nisi magnam qui obcaecati sapiente voluptatum. Non aut consectetur quisquam vel nostrum necessitatibus. </p>

</body>
</html>
