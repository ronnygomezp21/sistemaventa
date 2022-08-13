<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-permiso', ['only' => ['index']]);
    }
   
    public function index()
    {
        $permisos = Permission::paginate(8);
        return view('permiso.index', compact('permisos'));
    }
}