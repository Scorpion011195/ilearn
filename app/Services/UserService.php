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
    public $paginate = 20;
    
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function setStatus($id, $id_status)
    {
        return $this->model->find($id)->update(['id_status' => $id_status]);
    }

    public function find(array $attributes)
    {
        return $this->where('email', 'LIKE', '%'.$attributes['email'].'%')
                    ->where('created_at', '>=', $attributes['created_at'])
                    ->paginate($this->paginate);
    }
}