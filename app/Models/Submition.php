<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submition extends Model
{
    protected $table='submitions';
    public $timestamps = false;
    protected $fillable = ['STT','from','to','from_text','to_text','quanlity','type_from','status'];
}
