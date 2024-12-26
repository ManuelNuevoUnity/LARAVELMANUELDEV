<?php
$productosJson = file_get_contents('productos.json');
$productos = json_decode($productosJson, true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos en Oferta</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
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
        #productos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .producto {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .producto:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }
        .producto h2 {
            font-size: 1.5rem;
            color: #8c1936;
            margin-bottom: 10px;
        }
        .imagen {
            width: 100%;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .producto p {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #555;
        }
        .precioAnterior {
            text-decoration: line-through;
            color: #888;
        }
        .precioActual {
            font-size: 1.2rem;
            color: #e63946;
            font-weight: bold;
        }
        .producto a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #8c1936;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin-top: auto;
            transition: background-color 0.3s ease;
        }
        .producto a:hover {
            background-color: #cf945a;
        }
    </style>
</head>
<body>
    <h1>Productos en Oferta</h1>
    <div id="productos">
        <?php foreach ($productos as $index => $producto): ?>
            <div class="producto">
                <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" class="imagen" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                <p class="precioAnterior">Precio anterior: $<?php echo htmlspecialchars($producto['precioAnterior']); ?></p>
                <p class="precioActual">Precio actual: $<?php echo htmlspecialchars($producto['precioActual']); ?></p>
                <a href="editar_productos.php?index=<?php echo $index; ?>">Editar</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
