<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
     protected $fillable = [
        
        'email',
        'password',
    ];

    protected $table = "usuarios";  
    public $timestamps = false;
}