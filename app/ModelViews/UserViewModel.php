<?php

/**
 * Created by PhpStorm.
 * User: silverhawk
 * Date: 08/06/2017
 * Time: 10:51
 */
namespace App\ModelViews;

class LoginViewModel {
    public $userID;

    public $password;

    public $remember_token;
}

class UserViewModel {
    
    public $userID;
    
    public $name;
    
    public $email;
    
    public $role;

    public $phone;

    public $address;

    public $dob;

}