<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_list_route(): void
    {
        $response = $this->get('/tasks');
        $response->assertStatus(200);
    }
}
