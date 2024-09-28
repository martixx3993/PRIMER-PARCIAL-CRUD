<?php
// Intentar establecer una conexión a la base de datos SQLite
$conexion = new SQLite3("crup_php");

// Establecer el modo de error para la conexión
if (!$conexion) {
    die("Error de conexión: " . $conexion->lastErrorMsg()); // Manejo de errores
}
$conexion->exec("PRAGMA encoding = 'UTF-8';");
?>
