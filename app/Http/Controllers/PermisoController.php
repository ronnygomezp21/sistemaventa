<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-permiso', ['only' => ['index']]);
        $this->middleware('permission:crear-permiso', ['only' => ['create', 'store']]);
    }

    public function index()
    {
        $permisos = Permission::select('id', 'name')
            ->orderBy('id', 'asc')
            ->paginate(4);
        return view('permiso.index', compact('permisos'));
    }

    public function create()
    {
        return view('permiso.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:permissions,name',
            ], [
                'name.required' => 'El nombre del permiso es requerido',
                'name.unique' => 'El permiso ya existe',
            ]);

        DB::beginTransaction();

        try {

            $permiso = new Permission();
            $permiso->name = $request->name;
            $permiso->save();
            DB::commit();
            return redirect()->route('permisos.index')->with('mensaje', 'Permiso creado correctamente')->with('color', 'success');

        } catch (\Exception$e) {

            DB::rollback();
            return redirect()->route('permisos.index')->with('mensaje', 'Error al crear el permiso')->with('color', 'danger');

        }
    }
}
