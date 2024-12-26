<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $carrito = json_decode($_GET['carrito'], true);
    
    // Puedes guardar los datos en la base de datos aquí (usando SQLite)
    // Conexión a la base de datos
    $db = new PDO('sqlite:database.sqlite');
    
    // Por ejemplo, insertar productos al carrito en la base de datos:
    foreach ($carrito as $producto) {
        $query = $db->prepare("INSERT INTO carrito (producto_id, nombre, precio) VALUES (?, ?, ?)");
        $query->execute([$producto['id'], $producto['nombre'], $producto['precio']]);
    }

    // Después de insertar, redireccionar o mostrar el contenido del carrito.
}
