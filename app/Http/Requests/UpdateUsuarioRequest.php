<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->usuario)],
            'password' => 'same:password_confirmation',
            'roles' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.regex' => 'El nombre solo acepta letras',
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email ya existe',
            'password.same' => 'Las contraseñas no coinciden',
            'roles.required' => 'El rol es requerido',
        ];
    }
}
