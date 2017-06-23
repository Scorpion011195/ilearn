<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class English extends Model
{
    protected $table='english';
    protected $fillable = ['word', 'listen', 'explain', 'id_mapping'];
}
