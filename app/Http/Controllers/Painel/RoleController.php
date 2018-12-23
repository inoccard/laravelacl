<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use Gate;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    private function checkarGate()
    {
        $this->authorize('adm');
    }
    
    public function index()
    {   
        $roles = $this->role->all();
        $this->checkarGate();
        return view('painel.roles.index', compact('roles'));
    }

    public function permissions($id)
    {   
        // Recupera role
        $role = $this->role->find($id);
        $this->checkarGate();
        // Recuperar permissões
        $permissions = $role->permissions()->get();
        return view('painel.roles.permissions', compact('role','permissions'));
    }
}
