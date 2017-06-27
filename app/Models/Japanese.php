<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Japanese extends Model
{
    protected $table='japanese';
    protected $fillable = ['id','word', 'listen', 'explain', 'id_mapping'];
}
