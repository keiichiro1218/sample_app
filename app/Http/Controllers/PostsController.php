<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title'=>'required|max:20',
            'body'=>'required|max:140'
        ]);
        
        Post::create($params);

        return redirect()->route('top');
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.show', ['post' =>$post]);
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('posts.edit',['post' =>$post]);
    }

    public function update($post_id, Request $request)
    {

        $params = $request->validate([
            'title'=>'required|max:20',
            'body'=>'required|max:140'
        ]);


        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();
    
        // return redirect()->route('posts.show',['post'=>$post]);
        // return redirect()->route('top');
        return redirect()->route('posts.show', ['post_id'=>$post->id]);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);

        // \DB::transaction(function() use ($post)) {
        //     $post->delete();
        // });
        \DB::transaction(function() use($post){
            $post->delete();
        });

        return redirect()->route('top');
    }
}
