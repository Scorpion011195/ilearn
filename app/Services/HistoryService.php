<?php

namespace App\Services;

use App\Models\History;
use App\Repositories\HistoryRepository;

class HistoryService extends BaseService implements HistoryRepository
{

    public function __construct(History $model)
    {
        $this->model = $model;
    }
}
