<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Perfil extends Component
{
    public $name, $email;

    protected function rules()
    {
        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:10',
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->user()->id)],
        ];
    }
    protected function messages()
    {
        return [
            'name.required' => 'Los nombres y apelidos es requerido',
            'name.regex' => 'Los nombres y apellidos solo puede contener letras',
            'name.min' => 'Los nombres y apellidos debe tener al menos 10 caracteres',
            'email.required' => 'El correo es requerido',
            'email.email' => 'El correo debe ser valido',
            'email.unique' => 'El correo ya esta registrado',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function __construct()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function update()
    {
        $this->validate();
        $user = User::find(auth()->user()->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        session()->flash('message', 'Perfil actualizado correctamente');
    }

    public function render()
    {
        return view('livewire.perfil');
    }
}
