@extends('header')
@section('title')
    <h1>수정</h1>
@endsection
@section('body')
    <form method="post" action="{{route('update', ['id' => $post->id])}}">
        @method('PUT')
        @csrf
        <div>
            <span>제목 : </span>
            <input type="text" name="title" value="{{$post->title}}">
        </div>
        <div>
            <span>내용 : </span>
            <textarea name="content">{{$post->content}}</textarea>
        </div>
        <div>
            <input type="submit" value="수정">
            <input type="button" value="취소" onclick="location.href='{{route('show', ['id' => $post->id])}}'">
        </div>
    </form>
@endsection