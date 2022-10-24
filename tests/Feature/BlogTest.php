<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    protected function setUp() :void
    {
        parent::setUp();
        $this->withoutExceptionHandling();

    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Blog_can_be_viewed()
    {
        $post = Post::first();
        $response = $this->get('/blog/' .$post->id);

        $response->assertSee($post->title);
    }
}
