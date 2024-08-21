@extends('header')
@section('title')
    <h1>{{$post->title}}</h1>
@endsection
@section('body')
    <div>
        {{$post->content}}
        작성일 : {{$post->updated_at}}
    </div>
    <div>
        <input type="button" value="수정" onclick="location.href='{{route('edit', ['id' => $post->id])}}'">
        <form method="post" action="{{route('destroy', ['id' => $post->id])}}">
            @method('DELETE')
            @csrf
            <input type="submit" value="삭제">
        </form>
        <a href="{{route('index')}}">
            <input type="button" value="목록">
        </a>
    </div>
@endsection