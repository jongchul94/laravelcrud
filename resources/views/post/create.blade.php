@extends('header')
@section('title')
    <h1>작성</h1>
@endsection
@section('body')
    <form method="post" action="{{route('store')}}">
        @csrf
        <div>
            <span>제목 : </span>
            <input type="text" name="title" value="">
        </div>
        <div>
            <span>내용 : </span>
            <textarea name="content"></textarea>
        </div>
        <div>
            <input type="submit" value="저장">
            <input type="button" value="취소" onclick="location.href='{{route('index')}}'">
        </div>
    </form>
@endsection