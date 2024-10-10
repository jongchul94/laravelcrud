<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\PostImageController;
use App\Models\PostImage;
use App\Notifications\PostNotification;

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
            $postImage = new PostImageController();
            $postImage->store($request,$post->id);
        }

        $post->notify(new PostNotification($post, '이(가) 작성되었습니다.'));

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

        if($request->hasFile('postImage')){
            $postImage = new PostImageController();
            $postImage->update($request, $id);
        }

        return redirect() -> route('show', ['id' => $id]);
    }

    public function destroy($id){
        $image = PostImage::where('post_id', $id)->first();
        if($image){
            $postImage = new PostImageController();
            $postImage->destroy($image->id);
        }
        Post::destroy($id);

        return redirect() -> route('index');
    }
}
