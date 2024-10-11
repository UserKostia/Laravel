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
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.index');
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $send = [$id, $post];
        return view('edit', compact('send'));
    }

    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
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
        $send = [$id, $post];
        return view('show', compact('send'));
    }
}
