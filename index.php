<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD CON PHP LICYT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/27de85405e.js" crossorigin="anonymous"></script>
</head>
<body>
    <script>
        function eliminar() {
            return confirm("¿Estás seguro que deseas eliminar?");
        }
    </script>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de personas</h3>
            <?php
            include "modelo/conexion.php"; // Conexión a la base de datos
            include "controlador/registro_persona.php"; // Lógica para registrar personas
            include "controlador/eliminar_persona.php"; // Lógica para eliminar personas
            ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la persona</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido de la persona</label>
                <input type="text" class="form-control" name="apellido" required>
            </div>
            <div class="mb-3">
                <label for="carnet" class="form-label">C.I de la persona</label>
                <input type="text" class="form-control" name="carnet" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" required>
            </div>
    
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form> 
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRES</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">CARNET</th>
                        <th scope="col">FECHA DE NAC</th>
                        <th scope="col">CORREO</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $conexion->query("SELECT * FROM persona");
                    while($datos = $sql->fetch_object()) {
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($datos->id_persona) ?></td>
                        <td><?= htmlspecialchars($datos->nombre) ?></td>
                        <td><?= htmlspecialchars($datos->apellido) ?></td>
                        <td><?= htmlspecialchars($datos->carnet) ?></td>
                        <td><?= htmlspecialchars($datos->fecha_nac) ?></td>
                        <td><?= htmlspecialchars($datos->correo) ?></td>
                        <td>
                            <a href="modificar_persona.php?id=<?= $datos->id_persona ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_persona ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                    } // Cierre del while
                    ?>
                </tbody>
            </table>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
