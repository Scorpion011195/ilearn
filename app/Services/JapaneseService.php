<?php

namespace App\Services;

use App\Repositories\JapaneseRepository;
use App\Models\Japanese;
use DB;

class JapaneseService extends BaseService implements JapaneseRepository{

    public function __construct(Japanese $model)
    {
        $this->model = $model;
    }

    public function findWord($column, $word)
    {
        return DB::table('japanese')->where($column, 'like', '%word":"'.$word.'"}')->get();
    }

    public function findWordWithType($column, $word, $type)
    {
        return DB::table('japanese')->where($column, 'like', '%'.$type.'%'.$word.'"}')->first();
    }

    public function getMaxIdMapping(){
        return DB::table('japanese')->max('id_mapping');
    }

    public function getAllByIdMappingOrderById($column, $value){
        return $this->model->where($column, $value)->orderBy('id','asc')->get();
    }
}
