<?php

namespace App\Services;

use App\Repositories\JapaneseRepository;
use App\Models\Japanese;

class JapaneseService extends BaseService implements JapaneseRepository{

    public function __construct(Japanese $model)
    {
        $this->model = $model;
    }

    public function find(array $attributes) {

    }

}
