@extends('base')
@section('title', 'Tahrirlash')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('/js/trix.umd.min.js') }}"></script>
    <script src="{{ asset('js/attachments.js') }}"></script>


    <div class="container">
        <h1>Maqola yozish</h1>
        <form method="POST" action="{{ route('articleUpdate', ['id' => $article->id]) }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name='title' placeholder="Mavzu" value="{{ $article->title }}">
            <br>
            <br>
            <input type="file" name="poster" id="" value="">
            <img src="{{ $article->poster }}" alt="" style="width:300px">
            <br>
            <br>
            <input id="x" type="hidden" name="content" value="{{ $article->content }}" />
            <trix-editor input="x" class="trix-content"></trix-editor>
            <br>
            <select name="tag">
                {{-- <option value="{{ $article_tag->id }}">{{ $article_tag->name }}</option> --}}
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" 
                        @if ($tag->id == $article_tag->id)
                            selected
                        @endif
                    >{{ $tag->name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <button>Update</button>
        </form>
    </div>
@endsection
