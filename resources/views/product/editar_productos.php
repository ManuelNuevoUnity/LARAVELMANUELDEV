<?php
$productosJson = file_get_contents('productos.json');
$productos = json_decode($productosJson, true);

$index = $_GET['index'];
$producto = $productos[$index];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Actualizar los datos del producto
    $productos[$index]['nombre'] = $_POST['nombre'];
    $productos[$index]['descripcion'] = $_POST['descripcion'];
    $productos[$index]['precioAnterior'] = $_POST['precioAnterior'];
    $productos[$index]['precioActual'] = $_POST['precioActual'];
    $productos[$index]['imagen'] = $_POST['imagen'];

    // Guardar el archivo JSON
    file_put_contents('productos.json', json_encode($productos));

    // Redirigir a la página de productos
    header('Location: productos.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #a8e6cf, #dcedc1);
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 40px;
        }
        form {
            background-color: white;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            font-size: 1.1rem;
            margin-bottom: 8px;
            color: #2c3e50;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #f9f9f9;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #3498db, #2ecc71);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: linear-gradient(135deg, #2980b9, #27ae60);
        }
    </style>
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
        
        <label for="precioAnterior">Precio Anterior:</label>
        <input type="number" name="precioAnterior" value="<?php echo htmlspecialchars($producto['precioAnterior']); ?>" required>
        
        <label for="precioActual">Precio Actual:</label>
        <input type="number" name="precioActual" value="<?php echo htmlspecialchars($producto['precioActual']); ?>" required>
        
        <label for="imagen">Imagen (URL):</label>
        <input type="text" name="imagen" value="<?php echo htmlspecialchars($producto['imagen']); ?>" required>
        
        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
