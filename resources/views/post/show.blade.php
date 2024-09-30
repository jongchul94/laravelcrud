@extends('header')
@section('title')
    <h1>{{$post->title}}</h1>
@endsection
@section('body')
    <div style="float: right;">
        작성일 : {{$post->updated_at}}
    </div>
    <div>
        {{$post->content}}
    </div>
    <div class="mt-4 mb-3">
        @foreach($postImages as $postImage)
            <img src="{{asset('images/'.$postImage->image_name)}}" style="width: 70%;">
        @endforeach
    </div>
    <div class="mt-3 btn-group">
        <input class="btn btn-dark" type="button" value="수정" onclick="location.href='{{route('edit', ['id' => $post->id])}}'">
        <form method="post" action="{{route('destroy', ['id' => $post->id])}}">
            @method('DELETE')
            @csrf
            <input class="btn btn-danger" type="submit" value="삭제">
        </form>
        <a href="{{route('index')}}">
            <input class="btn btn-secondary" type="button" value="목록">
        </a>
    </div>
@endsection