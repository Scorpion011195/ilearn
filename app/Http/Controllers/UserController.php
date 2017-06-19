<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;

use Illuminate\Http\Request;

class UserController extends Controller implements BaseController
{
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function setStatus($id, $id_status)
    {

    }

    public function changePassword($id, $attributes)
    {

    }


    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getByID($id)
    {
        // TODO: Implement getByID() method.
    }

    public function find(Request $request)
    {
        // TODO: Implement find() method.
    }

    public function update(Request $request)
    {
        // TODO: Implement update() method.
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
