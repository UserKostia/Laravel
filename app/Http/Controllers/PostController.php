<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->check() ? auth()->id() : 1,
        ]);

        return redirect()->route('posts.index');
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function update(Request $request, int $id)
    {
        $post = Post::find($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->only(['title', 'content']));
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);
    
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found.');
        }
    
        return view('posts.show', compact('post'));
    }    
}
