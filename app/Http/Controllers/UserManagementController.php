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
    function getAccount(){
        $noOfAccounts = User::count();
        $noOfPages = 5;
        $account = User::paginate($noOfPages);

        $statusService = new StatusService(new Status);
        $listStatus = $statusService->getAll();

        $userRoleService = new UserRoleService(new UserRole);
        $listRoles = $userRoleService->getAll();

        $param = ['account'=>$account,'noOfPages'=>$noOfPages,'noOfAccounts'=>$noOfAccounts,'listStatus'=>$listStatus,'listRoles'=>$listRoles];
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
}
?>
