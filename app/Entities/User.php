<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, SoftDeletes;

    /**
     * The ORM Database attributes
     */
    public $timestamps = true;

    protected $table = 'users';

    protected $fillable = [ 
        'cpf',
        'name',
        'email',
        'password',
        'phone',
        'birth',
        'gender',
        'notes',
        'status',
        'permission'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
