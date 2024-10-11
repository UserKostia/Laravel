<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_id' => 'required|exists:posts,id'
        ]);

        Comment::create([
            'content' => $request->content,
            'body' => $request->content, // Переконайся, що це присутнє
            'user_id' => auth()->check() ? auth()->id() : 1,
            'post_id' => $request->post_id,
        ]);

        return redirect()->route('comments.index');
    }


    public function create()
    {
        $posts = Post::all();
        return view('comments.create', compact('posts'));
    }
    
    public function edit($id)
    {
        $comment = Comment::find($id);
        $post = Post::find($comment->post_id);
        return view('comments.edit', compact('comment', 'post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = Comment::find($id);
        $comment->update($request->only('content'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back();
    }

    public function show($id)
    {
        $comment = Comment::with('post')->find($id);
        if (!$comment) {
            return redirect()->route('comments.index')->with('error', 'Comment not found.');
        }
    
        return view('comments.show', compact('comment'));
    }
}
