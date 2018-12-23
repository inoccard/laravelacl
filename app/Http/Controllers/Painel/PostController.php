<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Gate;

class PostController extends Controller
{
    private $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    
    private function checkarGate()
    {
        $this->authorize('view_post');
    }

    public function index()
    {   
        $posts = $this->post->all();
        $this->checkarGate();
        return view('painel.posts.index', compact('posts'));
    }
}
