<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $comments = Comment::where('post_id', $post->id)->get();
        return view('comments.index', ['comments' => $comments, 'post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return view('comments.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->published = true;
        $comment->created_at = date('Y-m-d H:i:s');
        $comment->updated_at = date('Y-m-d H:i:s');
        $comment->post_id = $post->id;

        $comment->save();
        return Redirect::route('comments.index', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, Comment $comment)
    {
        return view('comments.show', ['comment' => $comment, 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $comment->text = $request->text;
        $comment->updated_at = date('Y-m-d H:i:s');

        $comment->save();

        return Redirect::route('comments.show', ['comment' => $comment, 'post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete($comment);
        return Redirect::route('posts.show', $post);
    }
}
