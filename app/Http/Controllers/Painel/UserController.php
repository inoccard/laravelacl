<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Gate;

class USerController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    private function checharGate(){
        $this->authorize('user');
    }

    public function index()
    {
        $users = $this->user->all();
        $this->checharGate();
        return view('painel.users.index', compact('users'));
    }

    public function roles($id)
    {
        // Recupera usuários
        $user = $this->user->find($id);

        // Recuperar roles
        $roles = $user->roles()->get();
        $this->checharGate();
        return view('painel.users.roles', compact('user','roles'));
    }
}
