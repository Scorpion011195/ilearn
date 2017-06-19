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

    public function getLogin()
    {
        return view('index');
    }
    public function postLogin(Request $request)
    {

        $rules = [
      'username' => 'required',
      'password' =>'required|min:6|max:32',
      ];
      $messages = [
      'username.required' => 'Trường username là bắt buộc',
      'password.required' => 'Mật khẩu là bắt buộc',
      'password.min' => 'Mật khẩu lớn hơn 6 kí tự',
      'password.max' => 'Mật khẩu nhỏ hơn 32 kí tự'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $username = $request->input('username');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if(Auth()->attempt(['username' =>$username, 'password' => $password],$remember)) {
            return redirect()->intended('/');
          }
        else {
          $errors = new MessageBag(['errorLogin' => 'Email hoặc mật khẩu không đúng']);
          return redirect()->back()->withErrors($errors);
        }
      }
    }
}
