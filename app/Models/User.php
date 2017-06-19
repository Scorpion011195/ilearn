<?php

namespace App\Models;
use \App\Http\Requests\RegisterRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserRole;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "users";
    protected $primaryKey = "id_user";
   

    protected $primaryKey = "id_user";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function userRole(){
        return $this->belongsTo('App\Models\UserRole','id_role','id_role');
    }

    function status(){
        return $this->belongsTo('App\Models\Status','id_status','id_status');
    }
}
