<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    public function index()
    {
        return 'Dashboard Inicial';
    }
}
