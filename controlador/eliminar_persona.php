<?php
// Verificar si el parámetro "id" en la URL no está vacío
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    
    // Preparar la consulta SQL para eliminar a la persona con el ID especificado
    $sql = $conexion->query("DELETE FROM persona WHERE id_persona = $id");

    // Verificar si la consulta se ejecutó correctamente
    if ($sql) {
        // Mostrar mensaje de éxito si se eliminó una fila
        if ($conexion->changes() > 0) {
            echo '<div class="alert alert-success">Persona eliminada correctamente</div>';
        } else {
            // Si no se eliminaron filas, puede ser que el ID no exista
            echo '<div class="alert alert-warning">No se encontró la persona para eliminar</div>';
        }
    } else {
        // Mostrar mensaje de error si la consulta falló
        echo '<div class="alert alert-danger">Error al eliminar: ' . $conexion->lastErrorMsg() . '</div>';
    }
}
?>
