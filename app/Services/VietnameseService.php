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

    public function findWordWithType($column, $word, $type)
    {
        return DB::table('vietnamese')->where($column, 'like', '%'.$type.'%'.$word.'"}')->first();
    }

    public function getAllByIdMappingOrderById($column, $value){
        return $this->model->where($column, $value)->orderBy('id','asc')->get();
    }
}
