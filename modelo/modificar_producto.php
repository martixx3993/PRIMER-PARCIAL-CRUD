<?php
// conexión a la base de datos
include "modelo/conexion.php";

// Obtener la id de la persona
$id = $_GET["id"];

// Realizar la consulta para obtener el producto correspondiente al ID
$sql = $conexion->query("SELECT * FROM producto WHERE id_persona = $id");

// Verificar si la consulta se realizó correctamente
if (!$sql) {
    die("Error en la consulta: " . $conexion->lastErrorMsg());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center text-secondary">Modificar Productos</h3>
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>"> 

        <?php
        // Incluir lógica para modificar el producto
        include "controlador/modificar_producto.php";
        
        // Recuperar datos del producto y mostrarlos en el formulario
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($datos->nombre) ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?= htmlspecialchars($datos->descripcion) ?>" required>
            </div>
            <div class="mb-3">
                <label for="carnet" class="form-label">C.I de la persona</label>
                <input type="text" class="form-control" name="carnet" value="<?= htmlspecialchars($datos->carnet) ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de creación</label>
                <input type="date" class="form-control" name="fecha" value="<?= htmlspecialchars($datos->fecha) ?>" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" value="<?= htmlspecialchars($datos->correo) ?>" required>
            </div>
        <?php } ?>
    
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar</button>
    </form> 
</body>
</html>
