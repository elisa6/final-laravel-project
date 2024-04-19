<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $posts = $user->posts;
        } else {
            $posts = Post::where('status', 'published')->get();
        }

        $categories = $this->categories();

        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categories();
        return view('posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->category = $request->category;
        $post->status = $request->status;
        $post->created_at = date('Y-m-d H:i:s');
        $post->updated_at = date('Y-m-d H:i:s');

        $user->posts()->save($post);

        return Redirect::route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = $post->comments;
        $categories = $this->categories();
        return view('posts.show', ['post' => $post, 'comments' => $comments, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = $this->categories();
        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->text = $request->text;
        $post->category = $request->category;
        $post->status = $request->status;
        $post->updated_at = date('Y-m-d H:i:s');

        $post->save();

        return Redirect::route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete($post);
        return Redirect::route('posts.index');
    }

    private function categories()
    {
        return [
            'fashion-and-beauty' => 'Fashion and beauty',
            'technology' => 'Technology',
            'home-and-garden' => 'Home and garden',
            'health-and-wellness' => 'Health and wellness',
            'travel-and-tourism' => 'Travel and tourism',
            'personal-finance' => 'Personal finance',
            'food-and-cooking' => 'Food and cooking',
            'culture-and-entertainment' => 'Culture and entertainment',
            'automotive' => 'Automotive',
            'education-and-learning' => 'Education and learning'
        ];
    }
}
