<?php

namespace App\Services\Task;

use App\Models\Task;
use \Illuminate\Database\Eloquent\Collection;

/**
 * Class TaskService
 */
class TaskService
{

    /**
     * @var Task
     */
    protected Task $model;

    /**
     * @param Task $model
     */
    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    /**
     * return all tasks
     * @return array
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * get the specific task
     * @param $id
     * @return mixed
     */
    public function get(int $id): Task
    {
        return $this->model->where('id', $id)->firstOrFail();
    }

    /**
     * @param array $data
     * @return Task
     */
    public function create(array $data): Task
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        return $this->get($id)->update($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->get($id)->delete();
    }
}
