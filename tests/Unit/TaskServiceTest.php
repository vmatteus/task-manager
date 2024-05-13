<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use App\Services\Task\TaskService;
use Tests\TestCase;

class TaskServiceTest extends TestCase
{
    protected $taskService;

    public function setUp(): void
    {
        parent::setUp();
        $this->taskService = app(TaskService::class);
        $this->task = Task::factory()->make();
        $this->task->save;
    }

    public function test_all_method(): void
    {
        $this->refreshDatabase();
        $task1 = Task::factory()->make();
        $task1->save();
        $task2 = Task::factory()->make();
        $task2->save();
        $allTasks = $this->taskService->all();
        $this->assertEquals($task1->id, $allTasks[0]['id']);
        $this->assertEquals($task2->id, $allTasks[1]['id']);
    }

    public function test_get_method(): void
    {
        $task = Task::factory()->make();
        $task->save();
        $taskService = $this->taskService->get($task->id);
        $this->assertEquals($task->id, $taskService->id);
    }
}
