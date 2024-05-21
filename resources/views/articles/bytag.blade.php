@extends('base')
@section('title', 'Maqolalar')

@section('content')
    <h2>Mavzu: {{ $tag }}</h2>
    <div>
        <a href="{{ route('articleIndex') }}">| Hammasi |</a>
        @foreach ($tags as $tag)
            <a href="{{ route('articlesByTag', ['tag_name' => $tag->name]) }}">| {{ $tag->name }} |</a>
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
    <hr>
    {{ $articles->links() }}

@endsection
