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

class UserController extends Controller
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
    'name' => 'required',
    'pass' =>'required|min:6|max:32',
    ];
    $messages = [
    'name.required' => 'Trường username là bắt buộc',
    'pass.required' => 'Mật khẩu là bắt buộc',
    'pass.min' => 'Mật khẩu lớn hơn 6 kí tự',
    'pass.max' => 'Mật khẩu nhỏ hơn 32 kí tự'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if($validator->fails())

    {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    else {
      $username = $request->input('name');
      $password = $request->input('pass');
      $remember = $request->input('remember');

      if(Auth()->attempt(['username' =>$username, 'password' => $password],$remember)) {
        return redirect()->action('LaguageController@getAllLanguage');
      }
      else {
        $errors = new MessageBag(['errorLogin' => 'Email hoặc mật khẩu không đúng']);

        return redirect()->back()->withInput()->withErrors($errors);
      }
    }
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
    $user->id_status = 1;
    $user->id_role = 5;
    $user->save();

    $userHis = new \App\Models\History();
    $userHis->id_history = $user->id_user;
    $userHis->content = 'Chuc ban may man';
    $userHis->save();

    $userSet = new \App\Models\Setting();
    $userSet->id_user = $user->id_user;
    $userSet->save();

    $userID = User::find($user->id_user);
    $userID->id_history = $user->id_user;
    $userID->save();

    $userInfo = new \App\Models\UserInformation();
    $userInfo->id_user = $user->id_user;
    $userInfo->name = $user->username;
    $userInfo->save();

    $language = \DB::table('languages')->get();

    if(Auth()->attempt(['username' =>$user->username, 'password' =>$user->password])) {
     return redirect()->intended('/');

  }
    $success['text'] = 'flash';
    return view("index")->with([
                    'flash' => $success,
                    'data' => $language ]);

}
}
