<?php

namespace Tests\Feature;

use App\Domain\HttpCode;
use App\Models\Task;
use Tests\TestCase;

class TaskTest extends TestCase
{
    protected $task;

    public function setUp(): void
    {
        parent::setUp();
        $this->task = Task::factory()->create();
    }

    public function test_the_list_route(): void
    {
        $response = $this->get('/api/tasks');
        $response->assertStatus(HttpCode::OK);
    }

    public function test_the_get_route(): void
    {
        $response = $this->get('/api/task/' . $this->task->id);
        $response->assertStatus(HttpCode::OK);
    }

    public function test_fail_the_get_route(): void
    {
        $response = $this->get('/api/task/99999');
        $response->assertStatus(httpCode::NOT_FOUND);
    }

    public function test_create_a_task(): void
    {
        $response = $this->post('/api/task', [
            'title' => 'new task',
            'description' => 'new desc',
        ]);
        $response->assertStatus(httpCode::CREATED);
    }

    public function test_update_a_task(): void
    {
        $response = $this->put('/api/task/' . $this->task->id, [
            'title' => 'update task',
            'description' => 'update desc',
        ]);
        $this->task->refresh();
        $response->assertStatus(httpCode::OK);
        $this->assertEquals('update task', $this->task->title);
        $this->assertEquals('update desc', $this->task->description);
    }

    public function test_update_a_task_fail(): void
    {
        $response = $this->put('/api/task/9999', [
            'title' => 'update task',
            'description' => 'update desc',
        ]);
        $response->assertStatus(httpCode::NOT_FOUND);
    }

    public function test_delete_a_task(): void
    {
        $response = $this->delete('/api/task/' . $this->task->id);
        $response->assertStatus(httpCode::OK);
    }

    public function test_delete_a_task_fail(): void
    {
        $response = $this->delete('/api/task/9999');
        $response->assertStatus(httpCode::NOT_FOUND);
    }
}
