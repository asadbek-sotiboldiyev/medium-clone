@extends('base')
@section('title', 'Maqolalar')

@section('content')
<div>
    @foreach ($tags as $tag)
        <a href="#">| {{ $tag->name }} |</a>
    @endforeach
</div>
@foreach ($articles as $article)
    <hr>
    <h3>
        <a href="{{ route('articleShow', ['id' => $article->id]) }}">{{ $article->title }}</a>
    </h3>
    <p>{{ $article->created_at }}</p>
    <hr>
@endforeach
    
@endsection
