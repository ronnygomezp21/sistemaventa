<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-producto', ['only' => ['index']]);
        $this->middleware('permission:crear-producto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-producto', ['only' => ['destroy']]);
    }

    public function index()
    {
        $productos = Producto::with('categorias')
            ->paginate(5, ['id', 'descripcion', 'cantidad', 'precio', 'id_categoria', 'estado']);
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::select('id', 'descripcion')->get();
        return view('producto.create', compact('categorias'));
    }

    public function store(CreateProductoRequest $request)
    {
        DB::beginTransaction();

        try {
            $producto = new Producto();
            $producto->descripcion = $request->descripcion;
            $producto->cantidad = $request->cantidad;
            $producto->precio = $request->precio;
            $producto->id_categoria = $request->id_categoria;
            $producto->save();
            DB::commit();
            return redirect()->route('productos.index');
        } catch (\Exception$e) {
            DB::rollback();
            return redirect()
                ->route('producto.index')
                ->with('error', 'Error al crear el producto');
        }
    }

}
