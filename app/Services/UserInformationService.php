<?php

namespace App\Services;


use App\Repositories\UserInformationRepository;
use App\Models\UserInformation;

class UserInformationService extends BaseService implements UserInformationRepository
{
    public $paginate = 20;

    public function __construct(UserInformation $model)
    {
        $this->model = $model;
    }

    public function find(array $attributes)
    {

    }
}

