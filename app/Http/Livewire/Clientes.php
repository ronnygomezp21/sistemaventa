<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{
    use AuthorizesRequests, WithPagination;

    public $cedula, $nombres, $apellidos, $correo, $telefono, $direccion;
    protected $paginationTheme = 'bootstrap';
    public $view = 'create-cliente';

    protected $rules = [
        'cedula' => 'required|numeric|unique:cliente|min:10',
        'nombres' => 'required|regex:/^[\pL\s\-]+$/u|min:3',
        'apellidos' => 'required|regex:/^[\pL\s\-]+$/u|min:3',
        'correo' => 'required|email',
        'telefono' => 'required|numeric',
        'direccion' => 'required',
    ];

    protected $messages = [
        'cedula.required' => 'La cedula es requerida',
        'cedula.numeric' => 'La cedula debe contener solo numeros',
        'cedula.unique' => 'La cedula ya existe',
        'cedula.min' => 'La cedula debe contener 10 digitos',
        'nombres.required' => 'El nombre es requerido',
        'nombres.regex' => 'El nombre debe contener solo letras',
        'nombres.min' => 'El nombre debe tener al menos 3 caracteres',
        'apellidos.required' => 'El apellido es requerido',
        'apellidos.regex' => 'El apellido debe contener solo letras',
        'apellidos.min' => 'El apellido debe tener al menos 3 caracteres',
        'correo.required' => 'El correo es requerido',
        'correo.email' => 'El correo debe tener un formato valido',
        'telefono.required' => 'El telefono es requerido',
        'telefono.numeric' => 'El telefono debe contener solo numeros',
        'direccion.required' => 'La direccion es requerida',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $clientes = Cliente::select('id', 'cedula', 'nombres', 'apellidos', 'correo', 'telefono', 'direccion', 'estado')
        ->paginate(5);
        return view('livewire.cliente.listar-cliente', compact('clientes'));
    }

    public function store()
    {

        $validatedData = $this->validate();

        try {
            $this->authorize('crear-cliente');
            $cliente = new Cliente();
            $cliente->cedula = $validatedData['cedula'];
            $cliente->nombres = $validatedData['nombres'];
            $cliente->apellidos = $validatedData['apellidos'];
            $cliente->correo = $validatedData['correo'];
            $cliente->telefono = $validatedData['telefono'];
            $cliente->direccion = $validatedData['direccion'];
            $cliente->save();
            session()->flash('success', 'Cliente creado con exito');
            return redirect()->to('/clientes');

        } catch (\Exception$e) {
            session()->flash('error', 'No tienes permisos para crear un cliente');
            return redirect()->to('/clientes');
        }
    }

}
