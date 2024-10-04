<?php

namespace App\Http\Controllers;

use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostImageController extends Controller
{
    //
    public function store(Request $request, $id){
        $postImage = $request->validate([
            'postImage' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time().'_'.$request->file('postImage')->getClientOriginalName();
        $imagePath = $request->file('postImage')->storeAs('public/images', $imageName);
        $postImage['image_name'] = $imageName;
        $postImage['image_path'] = $imagePath;
        $postImage['post_id'] = $id;

        PostImage::create($postImage);
    }

    public function update(Request $request, $id){
        $isImage = PostImage::where('post_id', $id);

        if($isImage){
            Storage::delete($isImage->image_path);
            PostImage::where('post_id', $id)->delete();
        }

        $postImage = $request->validate([
            'postImage' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time().'_'.$request->file('postImage')->getClientOriginalName();
        $imagePath = $request->file('postImage')->storeAs('public/images', $imageName);
        $postImage['image_name'] = $imageName;
        $postImage['image_path'] = $imagePath;
        $postImage['post_id'] = $id;

        PostImage::create($postImage);
    }

    public function destroy($id){
        $postImage = PostImage::find($id);

        Storage::delete($postImage->image_path);
        $postImage->delete();
    }
}
