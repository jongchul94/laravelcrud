@extends('header')
@section('title')
    <h1>목록</h1>
@endsection
@section('body')
    <div>
        @foreach($posts as $post)
            <a href="/post/{{$post->id}}"><li>{{$post->title}}</li></a>
        @endforeach
    </div>
    <div>
        <a href="{{route('create')}}">
            <input type="button" value="작성">
        </a>
    </div>
@endsection