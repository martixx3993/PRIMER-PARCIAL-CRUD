<?php
// Verificar si el botón de registrar ha sido presionado
if (!empty($_POST["btnregistrar"])) {
    // Verificar que todos los campos necesarios no estén vacíos
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["carnet"]) && !empty($_POST["fecha"]) && !empty($_POST["correo"])) {
        
        // Obtener los datos del formulario
        $nombre = $_POST["nombre"]; 
        $apellido = $_POST["apellido"]; 
        $carnet = $_POST["carnet"]; 
        $fecha = $_POST["fecha"]; 
        $correo = $_POST["correo"]; 

        // Preparar y ejecutar la consulta SQL para insertar los datos de la persona
        $sql = $conexion->query("INSERT INTO persona (nombre, apellido, carnet, fecha_nac, correo) VALUES ('$nombre', '$apellido', '$carnet', '$fecha', '$correo')");
        
        // Verificar si la consulta se ejecutó correctamente
        if ($sql) {
            echo '<div class="alert alert-success">Persona registrada correctamente</div>'; // Corregido "alert-succes"
        } else {
            // Mostrar mensaje de error si la consulta falló
            echo '<div class="alert alert-danger">Error al registrar persona</div>'; // Corregido el uso de comillas
        }
    } else {
        // Mostrar advertencia si hay campos vacíos
        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>'; // Corregido el uso de comillas
    }
}
?>
