@php
    use Illuminate\Support\Facades\Auth;
    if (Auth::check()) {
        $USER = Auth::user();
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', 'Medium')
    </title>
</head>

<body>
    <header>
        <h2>
            <a href="/">MediUz</a> |
            @auth
                <a href="#">{{ $USER->name }}</a> |
                <a href="{{ route('articleStore') }}">Yozish</a> | 
                <a href="{{ route('logout') }}">Chiqish</a>
            @endauth
            @guest
                <a href="{{ route('loginView') }}">Kirish</a> |
                <a href="{{ route('registerView') }}">Ro'yxatdan o'tish</a>
            @endguest
        </h2>
    </header>
    <hr>

    @yield('content')

    <hr>
    <footer>
    </footer>
</body>

</html>
