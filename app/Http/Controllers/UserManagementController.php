<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;
use App\Services\StatusService;
use App\Models\Status;
use App\Services\UserRoleService;
use App\Models\UserRole;

class UserManagementController extends Controller
{
    public function getAccount(){
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
    }

    function changeRole(Request $request){
        $column = 'id_user';
        $value = $request->idUser;

        $attributes = ['id_role'=>$request->idRole];

        $userService = new UserService(new User);
        $userService->updateByColumn($column, $value, $attributes);
    }

    function deleteUser(Request $request){
        $column = 'id_user';
        $value = $request->idUser;

        $userService = new UserService(new User);
        $userService->deleteByColumn($column, $value);

        return "OK";
    }

    function searchUser(Request $request){
        $keyTaiKhoan = $request->_keytaikhoan;
        $keyNgayDk = $request->_keyngaydk;

        $noOfPages = 5;
        $statusService = new StatusService(new Status);
        $listStatus = $statusService->getAll();

        $userRoleService = new UserRoleService(new UserRole);
        $listRoles = $userRoleService->getAll();

        if(empty($keyTaiKhoan)&&empty($keyNgayDk)){
            $noOfAccounts = User::count();
            $accounts = User::paginate($noOfPages);

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>'','key_day'=>''];
            return view('backend.user.user-management', $param);
        }
        else if(empty($keyNgayDk)){
            $accounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->paginate($noOfPages);
            $noOfAccounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>$keyTaiKhoan,'key_day'=>''];
            return view('backend.user.user-management', $param);
        }
        else if(empty($keyTaiKhoan)){
            $accounts = User::where('created_at', '>=', $keyNgayDk." 00:00:00")->paginate($noOfPages);
            $noOfAccounts = User::where('created_at', '>=', $keyNgayDk." 00:00:00") ->count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>'','key_day'=>$keyNgayDk];
            return view('backend.user.user-management', $param);
        }
        else{
            $accounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->orWhere('created_at', '>=', $keyNgayDk." 00:00:00")->paginate($noOfPages);
            $noOfAccounts = User::where('username', 'LIKE', '%'.$keyTaiKhoan.'%')->orWhere('created_at', '>=', $keyNgayDk." 00:00:00")->count();

            $param = ['accounts'=>$accounts,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles,'key_username'=>$keyTaiKhoan,'key_day'=>$keyNgayDk];
            return view('backend.user.user-management', $param);
        }

        // $noOfAccounts = User::count();
        // $noOfPages = 5;
        // $account = User::paginate($noOfPages);

        // $statusService = new StatusService(new Status);
        // $listStatus = $statusService->getAll();

        // $userRoleService = new UserRoleService(new UserRole);
        // $listRoles = $userRoleService->getAll();

        // $param = ['account'=>$account,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles];
        // return view('backend.user.user-management', $param);
    }
}
?>
