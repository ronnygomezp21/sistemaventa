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
            'name' => 'required|min:6',
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->user()->id)],
        ];
    }
    protected function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener al menos 6 caracteres',
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
