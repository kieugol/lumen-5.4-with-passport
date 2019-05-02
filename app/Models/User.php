<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

class User extends BaseModel implements AuthenticatableContract, AuthorizableContract
{
    use Notifiable, HasApiTokens;
    
    protected $table = 'user';
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'age',
        'is_active',
        'created_by',
        'updated_by'
    ];
    
}
