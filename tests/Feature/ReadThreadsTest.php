<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadsTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function a_user_can_browse_threads()
    {
    	$thread = factory('App\Thread')->create();

    	$response = $this->get('/threads');
    	$response->assertSee($thread->title);	
    }

    /** @test */
    public function a_user_can_view_a_single_thread()
    {
    	$thread = factory('App\Thread')->create();

    	$response = $this->get($thread->path());
    	$response->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_view_replies_to_a_thread()
    {
    	$thread = factory('App\Thread')->create();

    	$reply = factory('App\Reply')->create(['thread_id' => $thread->id]);

    	$response = $this->get($thread->path());
    	$response->assertSee($reply->body);
    }
}
