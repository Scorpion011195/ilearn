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
use Session;
use Illuminate\Support\MessageBag;
use App\Models\Setting;

class UserController extends Controller
{

  public function __construct(UserRepository $user)
  {
    $this->user = $user;
  }

  public function getLogin()
  {
    return view('frontend.pages.login');
  }
  public function postLogin(Request $request)
  {
    $rules = [
    'name' => 'alpha_dash|required',
    'pass' =>'required|min:6|max:32',
    ];
    $messages = [
    'name.required' => 'Trường username là bắt buộc',
    'name.alpha_dash' => 'Chỉ nhập các kí tự là: chữ, số, "-", "_"',
    'pass.required' => 'Mật khẩu là bắt buộc',
    'pass.min' => 'Mật khẩu lớn hơn 6 kí tự',
    'pass.max' => 'Mật khẩu nhỏ hơn 32 kí tự'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);
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
        // Get status push notification
        $id=Auth::user()->id_user;
        $setting = Setting::where('id_user',$id)->first();
        $status = $setting->status;
        Session::put('statusPushNotification', $status);
        Session::put('isStartSessionPush', 'true');

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
    return view('frontend.pages.register');
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
    $arrHis = array();
    $arrStart = array('type_to'=>'Thán từ','from'=>'english', 'to'=>'vietnamese', 'from_text'=>'hello','to_text'=>'xin chào','notification'=> 'F');
    array_push($arrHis, $arrStart);
    $userHis->content = json_encode($arrHis, JSON_UNESCAPED_UNICODE);
    $userHis->save();

    $userSet = new \App\Models\Setting();
    $userSet->id_user = $user->id_user;
    $userSet->time_to_remind = '5';
    $userSet->id_reminder = '1';
    $userSet->status = 'OFF';
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
    return view("frontend.pages.home")->with([
                    'flash' => $success,
                    'data' => $language ]);

}
}
