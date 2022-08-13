<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-categoria', ['only' => ['index']]);
    }

    public function index()
    {
        return view('categoria.index');
    }
}
