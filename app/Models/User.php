<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Laravel\Passport\HasApiTokens;

class User extends BaseModel implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasApiTokens;
    
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'updated_date';
    
    protected $table = 'users';
    
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'age',
        'active',
        'created_by',
        'updated_by'
    ];
    
    protected $hidden = [
        'password'
    ];
}
