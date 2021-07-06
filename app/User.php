<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }
    public function checkPermissionAccess($permissionCheck)
    {
        // user login co quyen sua, them danh muc va xem menu
        // Check thong tin pha nquyen
        // Lay duoc tat cac cac quyen cua user trong he thong 
        $roles = auth()->user()->roles;
        foreach ($roles as $role) {
            // so sanh gia tri dua vao cua route hien tai xem co ton tai quyen hay ko 
            $permission = $role->permissions;
            if ($permission->contains('key_code',$permissionCheck)) {
                return true;
            }
            
        }
        return false;
        
    }
}