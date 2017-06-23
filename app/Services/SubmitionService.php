<?php

namespace App\Services;

use App\Models\Submition;
use App\Repositories\SubmitionRepository;

class SubmitionService extends BaseService implements SubmitionRepository
{

    public function __construct(Submition $model)
    {
        $this->model = $model;
    }

    public function reset()
    {
        $this->model->truncate();
    }
}
