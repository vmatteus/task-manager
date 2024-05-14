<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Services\Task\TaskService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\TestCase;

class TaskServiceTest extends TestCase
{
    protected $taskService;
    protected $task;

    public function setUp(): void
    {
        parent::setUp();
        $this->taskService = app(TaskService::class);
        $this->task = Task::factory()->create();
    }

    public function test_all_method(): void
    {
        $task1 = Task::factory()->create();
        $task2 = Task::factory()->create();
        $allTasks = $this->taskService->all();
        $this->assertCount(3, $allTasks);
    }

    public function test_get_method(): void
    {
        $taskService = $this->taskService->get($this->task->id);
        $this->assertEquals($this->task->id, $taskService->id);
    }

    public function test_create_method(): void
    {
        $newTask = [
            'title' => 'test',
            'description' => 'test teste',
        ];
        $taskInserted = $this->taskService->create($newTask);
        $this->assertEquals($newTask['title'], $taskInserted->title);
        $this->assertEquals($newTask['description'], $taskInserted->description);
    }

    public function test_update_method(): void
    {
        $title = 'test999';
        $this->taskService->update($this->task->id, [
            'title' => $title,
        ]);
        $this->task->refresh();
        $this->assertEquals($this->task->title, $title);
    }

    public function test_update_method_exception(): void
    {
        $this->expectException(ModelNotFoundException::class);
        $this->taskService->update(9999, [
            'title' => 'test',
        ]);
    }

    public function test_delete_method(): void
    {
        $this->assertTrue($this->taskService->delete($this->task->id));
    }

    public function test_delete_method_exception(): void
    {
        $this->expectException(ModelNotFoundException::class);
        $this->taskService->delete(1234);
    }

}
