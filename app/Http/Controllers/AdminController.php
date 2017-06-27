<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Services\UserInformationService;
use App\Models\UserInformation;
use App\Services\UserService;
use App\Models\User;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\MessageBag;

class AdminController extends Controller
{
    function getLogin()
    {
        return view('backend.login');
    }

    function postLogin(AdminLoginRequest $request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $check = ['username'=>$username,'password'=>$password,'id_role'=>1,'id_status'=>1];
        if(Auth::attempt($check)){
            Session::put('user', Auth::user());
            return redirect()->route('adminHome');
        }
        else{
            $errors = new MessageBag(['errorLogin' => 'Username hoặc Password không đúng']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    function logout(){
        Auth::logout();
        Session::forget('user');
        return redirect()->route('adminGetLogin');
    }

    function getProfile()
    {
        $column = 'id_user';
        $value = Session::get('user')->id_user;

        $userInformationService = new UserInformationService(new UserInformation);
        $profile = $userInformationService->getByColumn($column, $value);

        // Check if exist personal information
        if(!isset($profile)){
            $userInformationService->create(['id_user' => $value]);

            $profile = $userInformationService->getByColumn($column, $value);
        }

        return view('backend.user.profile',['profile'=>$profile]);
    }

    function updateProfile(Request $request)
    {
        $column = 'id_user';
        $value = Session::get('user')->id_user;

        $name = $request['profile-name'];
        $address = $request['profile-address'];
        $phone = $request['profile-phone'];
        $dateOfBirth = $request['profile-dob'];

        $attributes = ['name'=>$name, 'address'=>$address, 'phone'=>$phone, 'date_of_birth'=>$dateOfBirth];

        $userInformationService = new UserInformationService(new UserInformation);
        $userInformationService->updateByColumn($column, $value, $attributes);

        return redirect()->route('adminProfile')->with('alertUpdateProfile','Cập nhật thành công!');
    }

    function changePassword(Request $request)
    {
        $password = Session::get('user')->password;

        $passwordOld = $request['profile-password-old'];
        $passwordNew = $request['profile-password-new'];
        $passwordNewConfirm = $request['profile-password-new-confirm'];

        if(empty($passwordOld)||empty($passwordNew)||empty($passwordNewConfirm))
        {
            return redirect()->route('adminProfile')->with('alertUpdatePassword','failNull');
        }
        else
        {
            if (Hash::check($passwordOld, $password))
            {
                if($passwordNew==$passwordNewConfirm)
                {
                    $column = 'id_user';
                    $value = Session::get('user')->id_user;

                    $attributes = ['password'=>bcrypt($passwordNewConfirm)];

                    $userService = new UserService(new User);
                    $userService->updateByColumn($column, $value, $attributes);

                    return redirect()->route('adminProfile')->with('alertUpdatePassword','Thay đổi mật khẩu thành công!');
                }
                else
                    return redirect()->route('adminProfile')->with('alertUpdatePassword','failPassConfirm');
            }
            else
                return redirect()->route('adminProfile')->with('alertUpdatePassword','failPass');
        }

    }
}
