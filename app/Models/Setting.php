<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table='settings';
    public $timestamps = false;

    protected $fillable = [
        'id_user', 'time_to_remind','id_reminder','status',
    ];

    function settingTypeReminder(){
        return $this->hasOne('App\Models\SettingTypeReminder','id_reminder','id_reminder');
    }
}
