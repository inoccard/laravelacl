<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Post;
use App\USer;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    //    \App\Post::class => \App\Policies\PoliticaPost::class,
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot( GateContract $gate)
    {
        $this->registerPolicies($gate);

        // função de callback
/*        $gate->define('update-post',function(User $user, Post $post){
            return $user->id == $post->user_id;
        });
*/
        // Recupera todas as permissões e objetos de todas as
        // chama o método roles da classe Permission
        $permissions = Permission::with('roles')->get();

        foreach ($permissions as $permission):
            $gate->define($permission->nome,function(User $user) use ($permission){
                return $user->hasPermission($permission);
            });
        endforeach;

        // verifica se usuário tem função de admin para editar sistema
        $gate->before(function(USer $user,  $ability){
            if($user->hasAnyRoles('admin')):
                return true;
            endif;
        });
    }
}
