<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
    	'name', 'slug', 'permissions'
    ];

    protected $casts = [
    	'permissions' => 'array'
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class, 'role_users');
    }

    public function hasPermission($permission)
    {
    	return $this->permissions[$permission] ?? false;
    }

    public function hasAccess(array $permissions)
    {
    	foreach ($permissions as $permission){
    		if($this->hasPermission($permission)){
    			return true;
    		}
    	}
    		return false;
    }


}
