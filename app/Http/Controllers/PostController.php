<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        return redirect('post');
    }
}
