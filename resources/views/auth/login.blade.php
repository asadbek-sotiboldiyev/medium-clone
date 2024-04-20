@extends('base')

@section('title', 'Login')

@section('content')
    @error('user')
        <p>Foydalanuvchi topilmadi</p>
    @enderror
    <form action="{{ route('login') }}" method="post">
        @csrf
        <p>Username</p>
        <input type="text" name='username'>
        <p>Parol</p>
        <input type="text" name='password'>
        <br>
        <p>Hisobingiz yo'qmi? <a href="{{ route('registerView') }}">Ro'yxatdan o'ting</a></p>
        <button>Kirish</button>
    </form>
@endsection
