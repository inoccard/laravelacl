<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {   
        $roles = $this->role->all();
        return view('painel.roles.index', compact('roles'));
    }

    public function permissions($id)
    {   
        // Recupera role
        $role = $this->role->find($id);

        // REcuperar permissões
        $permissions = $role->permissions()->get();
        return view('painel.roles.permissions', compact('role','permissions'));
    }
}
