<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

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
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
        ]);

        return redirect()->back();
    }

    public function create()
    {
        return view('comments.create');
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit', compact('comment'));
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
        return view('comments.show', compact('comment'));
    }
}
