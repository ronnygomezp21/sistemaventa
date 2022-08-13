<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $fillable = ['descripcion', 'cantidad', 'precio', 'id_categoria'];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
