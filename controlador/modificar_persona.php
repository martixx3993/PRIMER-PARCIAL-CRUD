<?php
// Verificar si el botón de registrar ha sido presionado
if (!empty($_POST["btnregistrar"])) {
    // Verificar que todos los campos necesarios no estén vacíos
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["carnet"]) && !empty($_POST["fecha"]) && !empty($_POST["correo"])) {
        // Obtener los datos del formulario
        $id = $_POST["id"]; 
        $nombre = $_POST["nombre"]; 
        $apellido = $_POST["apellido"]; 
        $carnet = $_POST["carnet"]; 
        $fecha = $_POST["fecha"]; 
        $correo = $_POST["correo"]; 

        // Preparar y ejecutar la consulta SQL para actualizar los datos de la persona
        $sql = $conexion->query("UPDATE persona SET nombre='$nombre', apellido='$apellido', carnet='$carnet', fecha='$fecha', correos='$correo' WHERE id_persona='$id'");

        // Verificar si la consulta se ejecutó correctamente
        if ($sql) {
            // Redirigir a la página principal si la actualización fue exitosa
            header("Location: index.php");
            exit; 
        } else {
            // Mostrar mensaje de error si la consulta falló
            echo "<div class='alert alert-danger'>Error al modificar datos</div>";
        }
    } else {
        // Mostrar advertencia si hay campos vacíos
        echo "<div class='alert alert-warning'>Campos vacíos</div>";
    }
}
?>
