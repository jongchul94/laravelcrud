@extends('header')
@section('title')
    <h1>작성</h1>
@endsection
@section('body')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <form method="post" action="{{route('store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="col-form-label">제목 : </label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{old('title')}}">
        </div>
        <div>
            <label class="col-form-label">내용 : </label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content">{{old('content')}}</textarea>
        </div>
        <div class="mt-3 mb-3">
            <input class="form-control" type="file" id="postImage" name="postImage">
        </div>
        <div class="mt-3">
            <input class="btn btn-dark" type="submit" value="저장">
            <input class="btn btn-secondary" type="button" value="취소" onclick="location.href='{{route('index')}}'">
        </div>
    </form>
@endsection