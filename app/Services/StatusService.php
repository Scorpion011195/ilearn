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
}

