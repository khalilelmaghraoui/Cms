<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }

    public function show(Post $post)
    {
        return view('blog-post',['post'=>$post]);
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request)
    {
        //auth()->user();
    //dd(request()->all());
       $inputs = $request->validate([
            'title'=> 'required|min:9|max:277',
            'post_image'=> 'file',
            'body'=> 'required'

        ]);
       if (request('post_image')){
           $inputs['post_image'] =  request('post_image')->store('avatars');
       }
       auth()->user()->posts()->create($inputs);
       Post::create($request->all());

       return back();
    }
}
