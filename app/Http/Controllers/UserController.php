<?php

namespace App\Http\Controllers;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Illuminate\Support\MessageBag;

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
    
    public function getRegister()
    {
        return view('index');
    }
    public function postRegister(RegisterRequest $request)
    {       
            
            $user = new \App\Models\User();
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = \Hash::make($request->password); 
            $user->remember_token = '';
            $user->id_role = 5;
            
            $user->save();

            $success['text'] = 'flash';
            return view("index", ["flash"=>$success]);
    }
}
