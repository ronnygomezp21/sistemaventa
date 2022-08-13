<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'descripcion' => 'required',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
            'id_categoria' => 'required',
        ];
    }

    public function messages(){
        return [
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'cantidad.required' => 'El campo cantidad es obligatorio',
            'precio.required' => 'El campo precio es obligatorio',
            'cantidad.numeric' => 'El campo cantidad debe contener solo números',
            'precio.numeric' => 'El campo precio debe contener solo números',
            'id_categoria.required' => 'El campo categoria es obligatorio',
        ];
    }
}
