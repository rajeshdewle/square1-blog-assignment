<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Can user see posts on homepage.
     *
     * @return void
     */
    public function test_new_post_should_show_on_frontend()
    {
        $post = Post::factory()->create();

        $response = $this->get('/');

        $response->assertStatus(200)->assertSee($post->title);
    }

    /**
     * Can user see single post on page.
     *
     * @return void
     */
    public function test_new_post_should_show_on_single_post_page()
    {
        $post = Post::factory()->create();

        $response = $this->get('/posts/'.$post->id);

        $response->assertStatus(200)->assertSee($post->title);
    }

    /**
     * Can authenticated user create new post.
     *
     * @return void
     */
    public function test_auth_user_can_create_new_post()
    {
        $user = User::factory()->create();
        $data = [
            'title' => 'Post title',
            'description' => 'Post description.',
        ];

        $response = $this->actingAs($user)
            ->post('dashboard/create-post', $data)
            ->assertStatus(302);

        $response = $this->actingAs($user)
            ->get('/dashboard')
            ->assertSee($data['title'])
            ->assertStatus(200);
    }

    /**
     * Guest user can not be create new post.
     *
     * @return void
     */
    public function test_guest_user_can_not_create_new_post()
    {
        $data = [
            'title' => 'Post title',
            'description' => 'Post description.',
        ];

        $response = $this->post('dashboard/create-post', $data)
            ->assertRedirect('/login')
            ->assertStatus(302);
    }
}
