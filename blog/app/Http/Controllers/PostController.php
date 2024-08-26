<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $user->id,
        ]);
        return redirect()->route('posts.index')
        ->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        return view('posts.show',compact('post'));
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }
    public function update(Request $request,$id)
    {
        $post = Post::find($id);
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        $post->update($request->all());
        return redirect()->route('posts.index')
        ->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')
        ->with('success', 'Post Deleted successfully.');
    }
}
