<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guard = 'web';

    protected $fillable = [
        'nm_pelanggan', 'username', 'email', 'password',
    ];

    protected $hidden = ['password'];
}
