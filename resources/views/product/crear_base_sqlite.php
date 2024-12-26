<?php
$dbfile = 'usuarios.sqlite';

$db = new SQLite3($dbfile);

if (!$db) {
    die("Error al abrir la base de datos.");
}

$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    usuario TEXT NOT NULL UNIQUE,
    contraseña TEXT NOT NULL,
    correo TEXT NOT NULL UNIQUE,
    telefono TEXT NOT NULL
)";

if ($db->exec($sql)) {
    echo "Tabla 'usuarios' creada exitosamente o ya existe.";
} else {
    echo "Error al crear la tabla: " . $db->lastErrorMsg();
}

$db->close();
?>
