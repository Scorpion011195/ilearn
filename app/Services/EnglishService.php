<?php

namespace App\Services;

use App\Repositories\EnglishRepository;
use App\Models\English;
use DB;

class EnglishService extends BaseService implements EnglishRepository{

    public function __construct(English $model)
    {
        $this->model = $model;
    }

    public function find(array $attributes) {

    }

    public function findWord($column, $key)
    {
        return DB::table('english')
                    ->where($column, 'like', '%'.$key.'%')
                    ->get();
    }

}
