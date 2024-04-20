@extends('base')

@section('content')
<h1>Foydalanuvchi: {{ $user->name }}</h1>
<p>Username: {{ $user->username }}</p>
<p>Ro'yxatdan o'tgan: {{ $user->created_at }}</p>
@endsection
