<?php

namespace App\Services;


use App\Repositories\UserRoleRepository;
use App\Models\UserRole;

class UserRoleService extends BaseService implements UserRoleRepository
{

    public function __construct(UserRole $model)
    {
        $this->model = $model;
    }

    public function find(array $attributes)
    {
        // TODO: Implement find() method.
    }

}

