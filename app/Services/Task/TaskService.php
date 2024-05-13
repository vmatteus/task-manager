<?php

namespace App\Services\Task;

use App\Models\Task;

/**
 * Class TaskService
 */
class TaskService
{

    protected Task $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    /**
     * return all tasks
     * @return array
     */
    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    /**
     * get the specific task
     * @param $id
     * @return mixed
     */
    public function get($id): Task
    {
        return $this->model->where('id', $id)->firstOrFail();
    }
}
