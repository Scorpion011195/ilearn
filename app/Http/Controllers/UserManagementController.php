<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;
use App\Services\UserInformationService;
use App\Models\UserInformation;
use App\Services\HistoryService;
use App\Models\History;
use App\Services\SettingService;
use App\Models\Setting;
use App\Services\StatusService;
use App\Models\Status;
use App\Services\UserRoleService;
use App\Models\UserRole;
use App\Http\Requests\AdminAccountManagementRequest;
use App\Http\Requests\AdminDetailUserRequest;
use Illuminate\Support\MessageBag;

class UserManagementController extends Controller
{
    function getAccount(){
        $noOfAccounts = User::count();
        $noOfPages = 5;
        $accounts = User::paginate($noOfPages);

        $statusService = new StatusService(new Status);
        $listStatus = $statusService->getAll();

        $userRoleService = new UserRoleService(new UserRole);
        $listRoles = $userRoleService->getAll();

        $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>'','key_day'=>''];
        return view('backend.pages.user.user-management.user-management', $param);
    }

    function changeStatus(Request $request){
        $column = 'id_user';
        $value = $request->idUser;

        $attributes = ['id_status'=>$request->idStatus];

        $userService = new UserService(new User);
        $userService->updateByColumn($column, $value, $attributes);

        $dataResponse = ["data"=>"OK"];
        return json_encode($dataResponse);
    }

    function changeRole(Request $request){
        $column = 'id_user';
        $value = $request->idUser;

        $attributes = ['id_role'=>$request->idRole];

        $userService = new UserService(new User);
        $userService->updateByColumn($column, $value, $attributes);

        $dataResponse = ["data"=>"OK"];
        return json_encode($dataResponse);
    }

    function deleteUser(Request $request){
        $column = 'id_user';
        $value = $request->idUser;

        $userService = new UserService(new User);
        $userService->deleteByColumn($column, $value);

        $userInformationService = new UserInformationService(new UserInformation);
        $userInformationService->deleteByColumn($column, $value);

        $settingService = new SettingService(new Setting);
        $settingService->deleteByColumn($column, $value);

        $historyService = new HistoryService(new History);
        $historyService->deleteByColumn('id_history', $value);

        $dataResponse = ["data"=>"OK"];
        return json_encode($dataResponse);
    }

    function getDetailUser($id){
        $column = 'id_user';
        $userService = new UserService(new User);
        $user = $userService->getByColumn($column, $id);

        $userInformationService = new UserInformationService(new UserInformation);
        $userInformation = $userInformationService->getByColumn($column, $id);

        $param = ['user'=>$user,'userInformation'=>$userInformation];

        return view('backend.pages.user.user-management.detail-user',$param);
    }

    function postDetailUser(AdminDetailUserRequest $request)
    {
        $column = 'id_user';
        $idUser = $request['_idUser'];

        // Input
        $name = $request['profile-name'];
        $address = $request['profile-address'];
        $phone = $request['profile-phone'];
        $dateOfBirth = date('Y-m-d', strtotime($request['profile-dob']));

        // If profile-name invalidate
        if(!DictionaryManagementController::checkValidate($name)){
            $errors = new MessageBag(['profile-name' => 'Tên không hợp lệ!']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        // If profile-address invalidate
        if(!DictionaryManagementController::checkValidate($address)){
            $errors = new MessageBag(['profile-address' => 'Địa chỉ không hợp lệ!']);
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $attributes = ['name'=>$name, 'address'=>$address, 'phone'=>$phone, 'date_of_birth'=>$dateOfBirth];

        $userInformationService = new UserInformationService(new UserInformation);
        $userInformationService->updateByColumn($column, $idUser, $attributes);

        return redirect()->route('adminGetDetailUser',$idUser)->with('alertUpdateDetailUser','Cập nhật thành công!');
    }

    function searchUser(AdminAccountManagementRequest $request){
        $keyTaiKhoan = $request->_keytaikhoan;
        $keyNgayDk = date('Y-m-d', strtotime($request->_keyngaydk));

        $formatdate = '1970-01-01';

        $noOfPages = 5;
        $statusService = new StatusService(new Status);
        $listStatus = $statusService->getAll();

        $userRoleService = new UserRoleService(new UserRole);
        $listRoles = $userRoleService->getAll();

        // Empty key Account and Date
        if(empty($keyTaiKhoan)&&($keyNgayDk==$formatdate)){
            $accounts = User::paginate($noOfPages);
            $noOfAccounts = User::count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>'','key_day'=>'','code'=>'RequestInput'];
            //return view('backend.pages.user.user-management.user-management', $param);
        }
        // Only type Account
        else if($keyNgayDk==$formatdate){
            $accounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->paginate($noOfPages);
            $noOfAccounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>$keyTaiKhoan,'key_day'=>'','code'=>'Success'];
            //return view('backend.pages.user.user-management.user-management', $param);
        }
        // Only get Date
        else if(empty($keyTaiKhoan)){
            $accounts = User::where('created_at', '>=', $keyNgayDk." 00:00:00")->paginate($noOfPages);
            $noOfAccounts = User::where('created_at', '>=', $keyNgayDk." 00:00:00") ->count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>'','key_day'=>$keyNgayDk,'code'=>'Success'];
            //return view('backend.pages.user.user-management.user-management', $param);
        }
        // Choose all
        else{
            $accounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->orWhere('created_at', '>=', $keyNgayDk." 00:00:00")->paginate($noOfPages);
            $noOfAccounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->orWhere('created_at', '>=', $keyNgayDk." 00:00:00")->count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>$keyTaiKhoan,'key_day'=>$keyNgayDk,'code'=>'Success'];
            //return view('backend.pages.user.user-management.user-management', $param);
        }
        return view('backend.pages.user.user-management.user-management', $param);
    }
}
?>
