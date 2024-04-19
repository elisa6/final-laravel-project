<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_creates_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('posts.store'), [
            'title' => 'Post title',
            'text' => 'Post content',
            'category' => 'Post category',
            'status' => 'published'
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Post title',
            'text' => 'Post content',
            'category' => 'Post category',
            'status' => 'published'
        ]);

        $response->assertRedirect(route('posts.index'));
    }

    public function test_destroy_method_deletes_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->delete(route('posts.destroy', $post));

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);

        $response->assertRedirect(route('posts.index'));
    }
}
