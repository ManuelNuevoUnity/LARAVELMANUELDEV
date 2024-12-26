<?php  
$dbfile = 'usuarios.sqlite';
$db = new SQLite3($dbfile);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $sql = $db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
    $sql->bindValue(1, $usuario);
    $result = $sql->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && $contraseña === $user['contraseña']) {  
        header('Location: catalogo.blade.php');
        exit();  
    } else {
        echo "<p class='error'>Usuario o contraseña incorrectos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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
        input[type="password"] {
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

        .error {
            color: #e74c3c;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulario de Inicio de Sesión</h2>
        <form action="login.php" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>

            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>
