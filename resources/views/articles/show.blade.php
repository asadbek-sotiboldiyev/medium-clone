@extends('base')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/trix.css') }}">
<center>
    <h1>{{ $article->title }}</h1>
    <img src="{{ $article->poster }}" alt="">
    <hr>
</center>
<div>{!! $article->content !!}</div>
<hr>
<p>{{ $article->created_at }}</p>
@endsection
