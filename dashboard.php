<?php
include 'funciones.php';
include 'sesiones.php';
verificarsesion();

$conn = conectarDB();
$id_usuario = $_SESSION['id_usuario'];
$query = "SELECT * FROM contactos WHERE id_usuario='$id_usuario'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success bg-opacity-10">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
                <p>Correo: <?php echo $_SESSION['correo']; ?></p>

                <div class="d-flex justify-content-between mb-3">
                    <a href="agregar.php" class="btn btn-success">Agregar contacto</a>
                    <a href="cerrar.php" class="btn btn-danger">Cerrar sesión</a>
                </div>

                <table class="table table-bordered table-striped">
                    <tr class="table-success">
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Ciudad</th>
                        <th>Acciones</th>
                    </tr>

                    <?php while($fila = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td><?php echo $fila['correo']; ?></td>
                        <td><?php echo $fila['ciudad']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $fila['id']; ?>" 
                               class="btn btn-warning btn-sm">
                               Editar
                            </a>
                            <a href="eliminar.php?id=<?php echo $fila['id']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('¿Seguro que quieres eliminar este contacto?')">
                               Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</body>
</html>