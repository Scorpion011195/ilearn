<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table='historys';
    public $timestamps = false;
    protected $fillable = ['id_history','content'];
}
