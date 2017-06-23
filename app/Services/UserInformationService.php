<?php

namespace App\Services;


use App\Repositories\UserInformationRepository;
use App\Models\UserInformation;

class UserInformationService extends BaseService implements UserInformationRepository
{
    public function __construct(UserInformation $model)
    {
        $this->model = $model;
    }
}

