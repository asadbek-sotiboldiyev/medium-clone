@extends('base')

@section('content')
    <center>
        <h1>Medium.com <u>clone</u></h1>
        <p>Maqolalar yozing. Tag lar bo'yicha o'zingizga kreakli mavzuda ma'lumotlar toping.</p>
        <h2>
            <a href="{{ route('articleIndex') }}">Maqolalarga o'ting > </a>
        </h2>
    </center>
@endsection
