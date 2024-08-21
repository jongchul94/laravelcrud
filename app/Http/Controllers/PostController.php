<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        return redirect('post/'.$post->id);
    }

    public function show($id){
        $post = Post::find($id);
        return view('post.show', [
            'post' => $post
        ]);
    }

    public function edit($id){
        $post = Post::find($id);
        return view('post.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request){
        $post = Post::find($request->id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('post/'.$request->id);
    }

    public function destroy($id){
        Post::destroy($id);

        return redirect('post');
    }
}
