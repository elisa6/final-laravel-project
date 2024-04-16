<?php

namespace Tests\Unit;

use App\Http\Controllers\CommentController;
use Tests\TestCase;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_creates_comment()
    {
        $post = Post::factory()->create();

        $response = $this->post(route('comments.store', $post), [
            'text' => 'Este es un comentario de prueba'
        ]);

        $this->assertDatabaseHas('comments', [
            'text' => 'Este es un comentario de prueba',
            'post_id' => $post->id,
            'published' => true
        ]);

        $response->assertRedirect(route('comments.index', $post));
    }
}
