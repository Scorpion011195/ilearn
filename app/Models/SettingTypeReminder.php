<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTypeReminder extends Model
{
    protected $table='setting_type_reminders';
    public $timestamps = false;

    protected $fillable = [
        'id_reminder','type'
    ];
}
