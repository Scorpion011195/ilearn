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
        return view('backend.user.user-management', $param);
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

        return view('backend.user.detail-user',$param);
    }

    function postDetailUser(Request $request)
    {
        $column = 'id_user';
        $idUser = $request['_idUser'];

        $name = $request['profile-name'];
        $address = $request['profile-address'];
        $phone = $request['profile-phone'];
        $dateOfBirth = $request['profile-dob'];

        $attributes = ['name'=>$name, 'address'=>$address, 'phone'=>$phone, 'date_of_birth'=>$dateOfBirth];

        $userInformationService = new UserInformationService(new UserInformation);
        $userInformationService->updateByColumn($column, $idUser, $attributes);

        //echo "Da update thong tin";

        return redirect()->route('adminGetDetailUser',$idUser)->with('alertUpdateDetailUser','Cập nhật thành công!');
    }

    // Tìm kiếm tài khoản
    function searchUser(AdminAccountManagementRequest $request){
        $keyTaiKhoan = $request->_keytaikhoan;
        $keyNgayDk = $request->_keyngaydk;

        $noOfPages = 5;
        $statusService = new StatusService(new Status);
        $listStatus = $statusService->getAll();

        $userRoleService = new UserRoleService(new UserRole);
        $listRoles = $userRoleService->getAll();

        // Chưa nhập key Tài khoản và chưa chọn Ngày đăng ký
        if(empty($keyTaiKhoan)&&empty($keyNgayDk)){
            $accounts = User::paginate($noOfPages);
            $noOfAccounts = User::count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>'','key_day'=>'','code'=>'RequestInput'];
            return view('backend.user.user-management', $param);
        }
        // Chỉ nhập Tài khoản
        else if(empty($keyNgayDk)){
            $accounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->paginate($noOfPages);
            $noOfAccounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>$keyTaiKhoan,'key_day'=>'','code'=>'Success'];
            return view('backend.user.user-management', $param);
        }
        // Chỉ chọn Ngày đăng ký
        else if(empty($keyTaiKhoan)){
            $accounts = User::where('created_at', '>=', $keyNgayDk." 00:00:00")->paginate($noOfPages);
            $noOfAccounts = User::where('created_at', '>=', $keyNgayDk." 00:00:00") ->count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>'','key_day'=>$keyNgayDk,'code'=>'Success'];
            return view('backend.user.user-management', $param);
        }
        // Cả hai được nhập và chọn
        else{
            $accounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->orWhere('created_at', '>=', $keyNgayDk." 00:00:00")->paginate($noOfPages);
            $noOfAccounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->orWhere('created_at', '>=', $keyNgayDk." 00:00:00")->count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>$keyTaiKhoan,'key_day'=>$keyNgayDk,'code'=>'Success'];
            return view('backend.user.user-management', $param);
        }
    }
}
?>
