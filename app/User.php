<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;
use PhpParser\Node\Stmt\Foreach_;

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
        return $this->belongsToMany(\App\Role::class);
    }

    // Recupera as funções dos usuários
    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles)
    {
        // verifica se é objeto ou matriz
        if(is_array($roles) || is_object($roles)):
            // verifica se o usuário está vinculado ao uma determinada função
            return !! $roles->intersect($this->roles)->count();
        else:
            return $this->roles->contains('nome',$roles);
        endif;
    }
}
