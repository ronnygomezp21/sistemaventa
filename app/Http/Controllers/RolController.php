<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-rol', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-rol', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-rol', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::paginate(5, ['id', 'name']);
        return view('roles.index', compact('roles'));
    }

    public function show($id)
    {
        return redirect()->route('roles.index');
    }

    public function create()
    {
        $permissions = Permission::select('id', 'name')->get();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:roles,name',
                'permissions' => 'required',
            ],
            [
                'name.required' => 'El nombre del rol es obligatorio',
                'name.unique' => 'El nombre del rol ya existe',
                'permissions.required' => 'Debe seleccionar al menos un permiso',
            ]);
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('mensaje', 'Rol creado con éxito')->with('color', 'success');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck("role_has_permissions.permission_id", "role_has_permissions.permission_id")
            ->all();
        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'Rol actualizado con éxito');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado con éxito');
    }
}
