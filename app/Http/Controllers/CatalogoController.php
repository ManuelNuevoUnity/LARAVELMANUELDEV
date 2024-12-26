<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        // Obtener todos los productos desde la base de datos
        $productos = Producto::all(); // Obtener todos los productos de la base de datos
        return view('product.catalogo', compact('productos')); 
    }
}

