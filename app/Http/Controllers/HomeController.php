<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Gate;

class HomeController extends Controller
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
        // filtra os posts dos usuarios logados
        //$posts = $post->all();
        $posts = $post->where('user_id', auth()->user()->id)->get();
        return view('home', compact('posts'));
    }
    public function update($idPost){
        $post = Post::find($idPost);
//        $this->authorize('update-post', $post);
        if(Gate::denies('update-post',$post))
            abort(401);
        return view('post-update', compact('post'));
    }
}
