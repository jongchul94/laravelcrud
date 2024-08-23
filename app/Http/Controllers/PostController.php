<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $request = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $post = Post::create($request);

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
        $id = $request->id;
        $post = Post::find($id);
        $request = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $post->update($request);

        return redirect('post/'.$id);
    }

    public function destroy($id){
        Post::destroy($id);

        return redirect('post');
    }
}
