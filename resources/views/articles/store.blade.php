@extends('base')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('/js/trix.umd.min.js') }}"></script>
    <script src="{{ asset('js/attachments.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>


    <div class="container">
        <h1>Maqola yozish</h1>
        <form method="POST" action="{{ route('articleCreate') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name='title' placeholder="Mavzu" required>
            <br>
            <br>
            <input type="file" name="poster" id="" onchange="loadImage(event)" required>
            <img id="output-img" src="" alt="" width="200px">
            <br>
            <br>
            <input id="x" type="hidden" name="content" value="" required/>
            <trix-editor input="x" class="trix-content"></trix-editor>
            <br>
            <select name="tag" required>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <button>Share</button>
        </form>
    </div>
@endsection
