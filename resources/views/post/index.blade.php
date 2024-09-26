@extends('header')
@section('title')
    <h1>목록</h1>
@endsection
@section('body')
    <div class="mb-4">
        <form class="input-group" method="get" action="{{route('index')}}">
            <input class="form-control" type="text" name="searchValue" id="searchValue">
            <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <div class="mt-3">
        @foreach($posts as $post)
            <a href="{{route('show', ['id' => $post->id])}}">
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