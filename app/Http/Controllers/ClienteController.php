<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-cliente', ['only' => ['index']]);
        $this->middleware('permission:crear-cliente', ['only' => ['create']]);
        $this->middleware('permission:editar-cliente', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cliente', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('cliente.index');
    }

    public function create(){
        return view('cliente.create');
    }

    
    public function edit($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            return view('cliente.edit', compact('cliente'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cliente')->with('error', 'Cliente no encontrado');
        }
    }
}
