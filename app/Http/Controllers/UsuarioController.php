<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-usuario', ['only' => ['index']]);
        $this->middleware('permission:crear-usuario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-usuario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-usuario', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $usuarios = User::with('roles')->paginate(5, ['id', 'name', 'email', 'estado']);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('usuarios.create', compact('roles'));
    }

    public function store(CreateUsuarioRequest $request)
    {
        DB::beginTransaction();

        try {

            $usuario = new User();
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->save();
            $usuario->assignRole($request->roles);
            DB::commit();
            return redirect()
                ->route('usuarios.index')
                ->with('mensaje', 'Usuario creado correctamente')
                ->with('color', 'success');

        } catch (\Exception$e) {

            DB::rollback();
            return redirect()
                ->route('usuarios.index')
                ->with('mensaje', 'Error al crear el usuario')
                ->with('color', 'danger');
        }
    }

    public function edit($id)
    {
        try {

            $user = User::select('id', 'name', 'email')->findOrFail($id);
            $roles = Role::pluck('name', 'name')->all();
            //$userRole = $user->roles->pluck('name', 'name')->all();
            /*chequear esta parte al pasarle la variable userRole*/
            return view('usuarios.edit', compact('user', 'roles'));

        } catch (ModelNotFoundException $e) {

            return redirect()
                ->route('usuarios.index')
                ->with('mensaje', 'Usuario no encontrado')
                ->with('color', 'danger');
        }
    }

    public function update(UpdateUsuarioRequest $request, $id)
    {
        DB::beginTransaction();

        try {

            $input = $request->all();
            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = Arr::except($input, array('password'));
            }

            $usuario = User::findOrFail($id);
            $usuario->update($input);

            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $usuario->assignRole($request->roles);
            DB::commit();
            return redirect()
                ->route('usuarios.index')
                ->with('mensaje', 'Usuario actualizado correctamente')
                ->with('color', 'success');

        } catch (ModelNotFoundException $e) {
            DB::rollback();
            return redirect()
                ->route('usuarios.index')
                ->with('mensaje', 'Error al actualizar el usuario')
                ->with('color', 'danger');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $usuario = User::findOrFail($id);
            $usuario->delete();
            DB::commit();
            return redirect()
                ->route('usuarios.index')
                ->with('mensaje', 'Usuario eliminado correctamente')
                ->with('color', 'success');

        } catch (ModelNotFoundException $e) {
            DB::rollback();
            return redirect()
                ->route('usuarios.index')
                ->with('mensaje', 'Error al eliminar el usuario')
                ->with('color', 'danger');
        }
    }
}
