<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInThread extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_participate_in_thread()
    {
    	$this->signIn();

    	$thread = factory('App\Thread')->create();
    	$reply = factory('App\Reply')->create();

    	$this->post($thread->path() .'/replies', $reply->toArray());

    	$this->get($thread->path())
    		->assertSee($reply->body);
    }
}
