<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//use Gate;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view('portal.home.index');
    }
    public function update($idPost){
        $post = Post::find($idPost);
        $this->authorize('edit_post', $post);
        //if(Gate::denies('update-post',$post))
        //    abort(401,'Acesso negado!');
        return view('post-update', compact('post'));
    }

    public function rolesPermissions()
    {
        $nomeUser = auth()->user()->name;
        echo("<h1>{$nomeUser}</h1>");

        foreach(auth()->user()->roles as $role):
            echo "<b>$role->nome</b> -> ";
            $permissions = $role->permissions;
            foreach ($permissions as $permission):
                echo " $permission->nome";
            endforeach;
            echo '<hr>';
        endforeach;
    }
}
