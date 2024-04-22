@extends('base')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/trix.css') }}">
<center>
    <h1>{{ $article->title }}</h1>
    <p>
        Muallif: {{ $article->getAuthor()->name }} 
        • {{ date_format($article->created_at, "d-M, Y") }}
        <button>Follow</button>
    </p>
    <img src="{{ $article->poster }}" alt="">
    <hr>
</center>
<div>{!! $article->content !!}</div>
<hr>
<p>{{ $article->created_at }}</p>
@endsection
