<?php
$dbfile = 'usuarios.sqlite';
$db = new SQLite3($dbfile);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña']; 

    $sql = $db->prepare('INSERT INTO usuarios (nombre, usuario, correo, telefono, contraseña) VALUES (?, ?, ?, ?, ?)');
    $sql->bindValue(1, $nombre);
    $sql->bindValue(2, $usuario);
    $sql->bindValue(3, $correo);
    $sql->bindValue(4, $telefono);
    $sql->bindValue(5, $contraseña); 

    if ($sql->execute()) {
        echo "<p class='success'>Registro exitoso.</p>";
    } else {
        echo "<p class='error'>Error en el registro: " . $db->lastErrorMsg() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #3498db;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #2c3e50;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .success {
            color: #27ae60;
            margin-top: 20px;
        }

        .error {
            color: #e74c3c;
            margin-top: 20px;
        }
        .login-link {
            margin-top: 10px;
            display: inline-block;
        }

        .login-link a {
            text-decoration: none;
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulario de Registro</h2>
        <form action="registro.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>

            <input type="submit" value="Registrarse">
        </form>
        <p class="login-link">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
