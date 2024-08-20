@extends('header')
@section('title')
    <h1>목록</h1>
@endsection
@section('body')
    <div>
        <a href="{{route('create')}}">
            <input type="button" value="작성">
        </a>
    </div>
    <div>
        @foreach($posts as $post)
            <li>{{$post->title}}</li>
        @endforeach
    </div>
@endsection