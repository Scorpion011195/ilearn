<?php

namespace App\Services;


use App\Repositories\StatusRepository;
use App\Models\Status;

class StatusService extends BaseService implements StatusRepository
{

    public function __construct(Status $model)
    {
        $this->model = $model;
    }

    public function find(array $attributes)
    {
        // TODO: Implement find() method.
    }

}

