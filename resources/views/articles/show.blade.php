@extends('base')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/trix.css') }}">
    <center>
        <h1>{{ $article->title }}</h1>
        <p>
            Muallif: {{ $article->getAuthor()->name }}
            • {{ date_format($article->created_at, 'd-M, Y') }}
        </p>
        <img src="{{ $article->poster }}" alt="">
        <hr>
    </center>
    <div>{!! $article->content !!}</div>
    <hr>
    @auth
        @if ($USER->id == $article->getAuthor()->id)
            <a href="{{ route('articleEdit', ['id' => $article->id]) }}">Tahrirlash</a><br>
        @endif
    @endauth
    <p>{{ $article->created_at }}</p>
    <h3>Mavzular:</h3>
    <div>
        @foreach ($article->getTags() as $tag)
            <a href="{{ route('articlesByTag', ['tag_name' => $tag->name]) }}">| {{ $tag->name }} |</a>
        @endforeach
    </div>
@endsection
