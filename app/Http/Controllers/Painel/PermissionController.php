<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;
use Gate;

class PermissionController extends Controller
{
    private $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;

    }

    private function checarGate()
    {
        $this->authorize('adm');
    }

    public function index()
    {   
        $permissions = $this->permission->all();
        $this->checarGate();
        return view('painel.permissions.index', compact('permissions'));
    }

    public function roles($id)
    {   
        // Recupera permission
        $permission = $this->permission->find($id);

        // REcuperar permissões
        $roles = $permission->roles()->get();
        $this->checarGate();
        return view('painel.permissions.roles', compact('permission','roles'));
    }
}
