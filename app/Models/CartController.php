<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartController extends Model
{
    public function addToCart(Request $request)
    {
        $cartItem = Cart::create([
            'product_id' => $request->input('id'),
            'name' => $request->input('nombre'),
            'price' => $request->input('precio'),
            'quantity' => 1, // Puedes ajustar según el requerimiento
        ]);

        // Obtener el número total de productos en el carrito
        $cartCount = Cart::count();

        // Devolver la cantidad actualizada al frontend
        return response()->json(['count' => $cartCount]);
    }
}
