<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasApiTokens;

    protected $table = "teachers";
    
    protected $hidden = [
        'password',
    ];
}
