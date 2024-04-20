@extends('base')

@section('title', 'Register')

@section('content')
    <form action="{{ route('register') }}" method="post">
        @csrf
        <p>Taxallus</p>
        <input type="text" name='name'>
        <p>Email</p>
        <input type="text" name="email">
        <p>Username</p>
        <input type="text" name="username">
        <p>Parol</p>
        <input type="text" name="password1">
        <p>Parolni takrorlang</p>
        <input type="text" name="password2">
        <br>
        <p>Hisobingiz bormi? <a href="{{ route('loginView') }}">Kiring</a></p>
        <button>Ro'yxatdan o'tish</button>
    </form>
@endsection
