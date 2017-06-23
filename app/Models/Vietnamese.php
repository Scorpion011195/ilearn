<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vietnamese extends Model
{
    protected $table='vietnamese';
    protected $fillable = ['word', 'listen', 'explain', 'id_mapping'];
}
