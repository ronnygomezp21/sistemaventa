<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Categorias extends Component
{
    /*public $foo;
    public $search = '';
    public $page = 1;

    public function updatingSearch()
    {
    $this->resetPage();
    }

    protected $queryString = [
    'search' => ['except' => '', 'as' => 's'],
    'page' => ['except' => 1, 'as' => 'p'],
    ];*/

    public $modal_agregar = false;

    use AuthorizesRequests, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $descripcion;

    protected $rules = [
        'descripcion' => 'required|regex:/^[\pL\s\-]+$/u|min:3|unique:categoria',
    ];

    protected $messages = [
        'descripcion.required' => 'La descripción es requerida',
        'descripcion.regex' => 'La descripción debe contener solo letras',
        'descripcion.min' => 'La descripción debe tener al menos 3 caracteres',
        'descripcion.unique' => 'La categoria ya existe',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        try {
            $this->authorize('crear-categoria');
            $this->validate();
            $categoria = new Categoria();
            $categoria->descripcion = $this->descripcion;
            $categoria->save();
            $this->limpiar_campos();
            $this->dispatchBrowserEvent('cerrar_modal');
            session()->flash('messagge', 'Categoria agregada con exito.');
            session()->flash('color', 'success');
        } catch (\Exception$e) {
            //$this->dispatchBrowserEvent('mostrar_error', $e->getMessage());
            //$this->emit('categoriaError', $e->getMessage());
            $this->limpiar_campos();
            $this->dispatchBrowserEvent('cerrar_modal');
            session()->flash('messagge', 'No tienes el permiso para crear una categoria.');
            session()->flash('color', 'danger');
            return redirect()->to('/categorias');
        }

    }

    public function confirmar_eliminacion($id)
    {
        $this->id_categoria = $id;

        $this->dispatchBrowserEvent('mostrar_modal_confirmacion');
    }

    public function destroy()
    {
        try {
            $this->authorize('borrar-categoria');
            $categoria = Categoria::findOrFail($this->id_categoria);
            $categoria->delete();
            $this->dispatchBrowserEvent('cerrar_modal');
            session()->flash('success', 'Categoria eliminada con exito.');
        } catch (\Exception$e) {
            //$this->dispatchBrowserEvent('mostrar_error', $e->getMessage());
            //$this->emit('categoriaError', $e->getMessage());
            session()->flash('error', 'No tienes el permiso para eliminar una categoria.');
            $this->dispatchBrowserEvent('cerrar_modal');
            return redirect()->to('/categorias');
        }
    }

    public function limpiar_campos()
    {
        $this->reset(['descripcion']);
    }

    public function render()
    {
        /*return view('livewire.categoria.categoria', [
        'categorias' => Categoria::where('descripcion', 'like', '%' . $this->search . '%')->paginate(2),
        ]);*/
        $categorias = Categoria::select('id', 'descripcion', 'estado')
            ->paginate(5);
        return view('livewire.categoria.categoria', [
            'categorias' => $categorias,
        ]);
    }
}
