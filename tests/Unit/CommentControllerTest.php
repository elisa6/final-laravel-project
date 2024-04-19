<?php

namespace Tests\Unit;

use App\Http\Controllers\CommentController;
use Tests\TestCase;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_creates_comment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->post(route('comments.store', $post), [
            'text' => 'This is a test comment'
        ]);

        $this->assertDatabaseHas('comments', [
            'text' => 'This is a test comment',
            'post_id' => $post->id,
            'published' => true
        ]);

        $response->assertRedirect(route('comments.index', $post));
    }

    public function test_update_method_updates_comment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $comment = Comment::factory()->create(['post_id' => $post->id]);

        $updatedText = 'This an updated comment';
        $response = $this->put(route('comments.update', [$post, $comment]), [
            'text' => $updatedText
        ]);

        $this->assertDatabaseHas('comments', [
            'id' => $comment->id,
            'text' => $updatedText
        ]);

        $response->assertRedirect(route('comments.show', [$post, $comment]));
    }

    public function test_destroy_method_deletes_comment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $comment = Comment::factory()->create(['post_id' => $post->id]);

        $response = $this->delete(route('comments.destroy', [$post, $comment]));

        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);

        $response->assertRedirect(route('posts.show', $post));
    }
}
