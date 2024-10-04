@extends('header')
@section('title')
    <h1>수정</h1>
@endsection
@section('body')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <form method="post" action="{{route('update', ['id' => $post->id])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div>
            <label class="col-form-label">제목 : </label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{$post->title}}">
        </div>
        <div>
            <label class="col-form-label">내용 : </label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content">{{$post->content}}</textarea>
        </div>
        <div class="mt-4 mb-3">
            @if($postImages)
                @foreach($postImages as $postImage)
                    <label>파일명 : </label>
                    <span>{{$postImage->image_name}}</span>
                    <!-- <i class="bi bi-x-square-fill"></i> -->
                @endforeach
            @endif
        </div>
        <div class="mt-3 mb-3">
            <input class="form-control" type="file" id="postImage" name="postImage">
        </div>
        <div class="mt-3">
            <input class="btn btn-dark" type="submit" value="수정">
            <input class="btn btn-secondary" type="button" value="취소" onclick="location.href='{{route('show', ['id' => $post->id])}}'">
        </div>
    </form>
@endsection