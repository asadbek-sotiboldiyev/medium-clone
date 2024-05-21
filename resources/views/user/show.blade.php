@extends('base')

@section('content')
    <h1>Foydalanuvchi: {{ $user->name }}</h1>
    <p>Username: {{ $user->username }}</p>
    <p>Ro'yxatdan o'tgan: {{ $user->created_at }}</p>
    <hr>
    @foreach ($user_articles as $article)
        <hr>
        <h3>
            <a href="{{ route('articleShow', ['id' => $article->id]) }}">{{ $article->title }}</a>
        </h3>
        <p>{{ $article->created_at }}</p>
        <hr>
    @endforeach
@endsection
