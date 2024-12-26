<?php 
$dbfile = 'usuarios.sqlite';
$db = new SQLite3($dbfile);

$sql = 'SELECT * FROM usuarios';
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Registrados</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #3498db;
            margin-bottom: 30px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            color: #333;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Usuarios Registrados</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Contraseña</th>
            </tr>
            <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                    <td><?php echo htmlspecialchars($row['correo']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($row['contraseña']); ?></td>
                </tr>
            <?php } ?>
        </table>
        <div class="footer">
            &copy; <?php echo date("Y"); ?> - Todos los derechos reservados.
        </div>
    </div>
</body>
</html>

<?php
$db->close();
?>
