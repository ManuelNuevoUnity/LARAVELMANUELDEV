<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    

    // Especificar la tabla asociada al modelo
    protected $table = 'productos';

    // Campos que pueden ser asignados masivamente
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'precio'];
}