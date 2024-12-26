<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Producto;
 
class ProductoController extends Controller
{
    // Método para mostrar la lista de productos
    public function index()
    {
        // Obtener todos los productos desde la base de datos
        $productos = Producto::all(); // Obtener todos los productos de la base de datos
        return view('product.index', compact('productos')); 
    }

    public function catalogo()
    {
        // Obtiene todos los productos de la base de datos
        $productos = Producto::all(); // Puedes ajustar esto para paginación si es necesario

      
        return view('product.catalogo', compact('productos'));
    }
 
    // Show form to create new product
    public function create()
    {
        return view('productos.create');
    }
 
 
    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'precio' => 'required|numeric',
        ]);
   
        $producto = new Producto();
        $producto->name = $request->input('name'); // Asegúrate de capturar el valor aquí
        $producto->description = $request->input('description');
        $producto->precio = $request->input('precio');
   
        // Maneja la subida de imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenNombre = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('assets'), $imagenNombre);
            $producto->imagen = 'assets/' . $imagenNombre;
        }
   
        $producto->save();
   
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }
 
    // Edit a product
    public function edit($id)
    {
        $producto = Producto::findOrFail($id); // Busca el producto por ID
        return response()->json($producto); // Devuelve los datos del producto en formato JSON
 
       
    }
 
    // Update an existing product
 // Update an existing product
public function update(Request $request, Producto $producto)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'imagen' => 'image|nullable|max:2048', // Se asegura de que sea una imagen, pero es opcional
        'precio' => 'required|numeric',
    ]);
 
    // Actualizar los atributos del producto
    $producto->name = $request->name;
    $producto->description = $request->description;
    $producto->precio = $request->precio;
 
    // Maneja la subida de imagen solo si hay una nueva imagen
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $imagenNombre = time() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move(public_path('assets'), $imagenNombre);
        $producto->imagen = 'assets/' . $imagenNombre; // Actualiza la ruta de la imagen
    }
 
    $producto->save(); // Guarda los cambios en la base de datos
 
    return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito');
}
 
    // Delete a product
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito');
    }
}
 
