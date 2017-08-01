<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Test.
     */
    public function testUserCanViewAllThreads()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');
        $response->assertSee($thread->title);
    }

    /**
     * Test.
     */
    public function testUserCanViewASingleThread()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);
    }
}
