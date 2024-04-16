<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_creates_post()
    {
        $response = $this->post(route('posts.store'), [
            'title' => 'Título del post',
            'text' => 'Contenido del post',
            'category' => 'Categoria del post',
            'status' => 'published',
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Título del post',
            'text' => 'Contenido del post',
            'category' => 'Categoria del post',
            'status' => 'published',
        ]);

        $response->assertRedirect(route('posts.index'));
    }
}
