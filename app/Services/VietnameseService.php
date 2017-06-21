<?php

namespace App\Services;

use App\Repositories\VietnameseRepository;
use App\Models\Vietnamese;

class VietnameseService extends BaseService implements VietnameseRepository{

    public function __construct(Vietnamese $model)
    {
        $this->model = $model;
    }

    public function find(array $attributes) {

    }

}
