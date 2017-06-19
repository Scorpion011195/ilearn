<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $table='user_informations';
    public $timestamps = false;
    protected $fillable = ['id_user', 'name', 'address', 'phone', 'date_of_birth'];
}
