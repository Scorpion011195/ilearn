<?php
/**
 * Created by PhpStorm.
 * User: silverhawk
 * Date: 08/06/2017
 * Time: 09:15
 */

namespace App\Services;


use App\Repositories\UserRepository;
use App\Models\User;

class UserService extends BaseService implements UserRepository
{

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
