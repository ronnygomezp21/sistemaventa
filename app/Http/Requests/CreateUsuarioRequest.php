<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsuarioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
            'roles' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombres es obligatorio',
            'name.regex' => 'El campo nombres solo acepta letras',
            'email.required' => 'El campo correo es obligatorio',
            'email.email' => 'El campo correo debe ser un correo valido',
            'email.unique' => 'El correo ya se encuentra registrado',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.same' => 'La contraseña y la confirmacion deben ser iguales',
            'confirm_password.required' => 'El campo confirmar contraseña es obligatorio',
            'roles.required' => 'El campo roles es obligatorio',
        ];
    }
}
