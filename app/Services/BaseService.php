<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class BaseService {

    /**
     * @var $model
     */
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }
}
