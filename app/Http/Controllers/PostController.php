<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(Request $request){
        $posts = null;
        if($request->searchValue){
            $posts = Post::where('title', 'like', '%'.$request->searchValue.'%')->orderByDesc('created_at')->paginate(3);
        }else{
            $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        }
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $post = Post::create($validate);

        if($request->hasFile('postImage')){
            $postImage = null;
            $postImage = $request->validate([
                'postImage' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $imageName = time().'_'.$request->file('postImage')->getClientOriginalName();
            $imagePath = $request->file('postImage')->storeAs('public/images', $imageName);
            $postImage['image_name'] = $imageName;
            $postImage['image_path'] = $imagePath;
            $postImage['post_id'] = $post->id;

            PostImage::create($postImage);
        }

        return redirect() -> route('show', ['id' => $post->id]);
    }

    public function show($id){
        $post = Post::find($id);
        $postImages = $post->images;
        return view('post.show', [
            'post' => $post,
            'postImages' => $postImages
        ]);
    }

    public function edit($id){
        $post = Post::find($id);
        $postImages = $post->images;
        return view('post.edit', [
            'post' => $post,
            'postImages' => $postImages
        ]);
    }

    public function update(Request $request){
        $id = $request->id;
        $post = Post::find($id);
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $post->update($validate);

        return redirect() -> route('show', ['id' => $id]);
    }

    public function destroy($id){
        Post::destroy($id);

        return redirect() -> route('index');
    }
}
