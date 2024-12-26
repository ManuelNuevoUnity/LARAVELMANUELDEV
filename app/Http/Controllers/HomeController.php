<?php

namespace App\Models\Producto;
namespace App\Http\Controllers;
use App\Models\Producto;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // Obtener todos los productos desde la base de datos
        $productos = Producto::all(); // Obtener todos los productos de la base de datos
        return view('home', compact('productos')); 
    }
}
