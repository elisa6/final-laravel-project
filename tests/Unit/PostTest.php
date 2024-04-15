<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_decrement_method_reduces(): void
    {
        $post = new Post();
        $post->title = "Post";
        $post->text = "Description";
        $post->status = "draft";
        $post->save();
     }
}
