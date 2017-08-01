<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }
    /**
     * Test.
     */
    public function testUserCanViewAllThreads()
    {
         $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /**
     * Test.
     */
    public function testUserCanViewASingleThread()
    {
        $this->get('/threads/' . $this->thread->id)
            ->assertSee($this->thread->title);
    }

    /**
     * Test.
     */
    function testUserCanReadThreadReplies()
    {
        $reply = factory('App\Reply')
            ->create(['thread_id' =>$this->thread->id]);
        $this->get('/threads/' . $this->thread->id)
            ->assertSee($reply->body);

    }
}
