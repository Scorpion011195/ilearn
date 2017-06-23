<?php

namespace App\Services;

use App\Repositories\VietnameseRepository;
use App\Models\Vietnamese;
use DB;

class VietnameseService extends BaseService implements VietnameseRepository{

    public function __construct(Vietnamese $model)
    {
        $this->model = $model;
    }

    public function getMaxIdMapping(){
        return DB::table('vietnamese')->max('id_mapping');
    }

    public function findWord($column, $word)
    {
        return DB::table('vietnamese')->where($column, 'like', '%word":"'.$word.'"}')->get();
    }
}
