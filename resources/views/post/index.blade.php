@extends('header')
@section('title')
    <h1>목록</h1>
@endsection
@section('body')
    <div class="mt-3">
        @foreach($posts as $post)
            <a href="/post/{{$post->id}}">
                <li>{{$post->title}}</li>
            </a>
        @endforeach
    </div>
    <div class="mt-3 mb-3">
        <a href="{{route('create')}}">
            <input class="btn btn-dark" type="button" value="작성">
        </a>
    </div>
    <div class="mt-3">{{$posts->links()}}</div>
@endsection