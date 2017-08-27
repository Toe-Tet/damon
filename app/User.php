<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users')->withPivot('user_id', 'role_id');
    }

    public function hasAccess(array $permissions)
    {
        foreach($this->roles as $role) {
            if($role->hasAccess($permissions)){
                return true;
            }
        }
            return false;
    }

    public function isSuperAdmin()
    {
        if( $this->is_super === 1 ){
            return true;
        }
        return false;
    }
}
