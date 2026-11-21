<?php
session_start();
include("conexion.php");
include("funciones.php");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    header("Location: dashboard.php");
    exit();
}

$conexion = conectarDB();

$stmt = $conexion->prepare("SELECT * FROM contactos WHERE id = ? AND id_usuario = ?");
$stmt->bind_param("ii", $id, $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();
$fila = $resultado->fetch_assoc();
$stmt->close();

if (!$fila) {
    header("Location: dashboard.php");
    exit();
}

$mensaje = "";

if (isset($_POST['guardar'])) {
    $nombre = limpiarDato($_POST['nombre'] ?? '');
    $telefono = limpiarDato($_POST['telefono'] ?? '');
    $correo = limpiarDato($_POST['correo'] ?? '');
    $ciudad = limpiarDato($_POST['ciudad'] ?? '');

    if (empty($nombre) || empty($telefono) || empty($correo) || empty($ciudad)) {
        $mensaje = "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "<div class='alert alert-danger'>El correo no es válido.</div>";
    } else {
        $stmt2 = $conexion->prepare("UPDATE contactos SET nombre = ?, telefono = ?, correo = ?, ciudad = ? WHERE id = ? AND id_usuario = ?");
        $stmt2->bind_param("ssssii", $nombre, $telefono, $correo, $ciudad, $id, $id_usuario);

        if ($stmt2->execute()) {
            $mensaje = "<div class='alert alert-success'>Contacto actualizado correctamente.</div>";
            // Actualizamos los datos que se muestran en el formulario
            $fila['nombre'] = $nombre;
            $fila['telefono'] = $telefono;
            $fila['correo'] = $correo;
            $fila['ciudad'] = $ciudad;
        } else {
            $mensaje = "<div class='alert alert-danger'>Error al actualizar: " . $stmt2->error . "</div>";
        }
        $stmt2->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto - Agenda Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h4>Editar Contacto ✏️</h4>
                </div>
                <div class="card-body">
                    <?php echo $mensaje; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($fila['nombre']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" value="<?php echo htmlspecialchars($fila['telefono']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo" class="form-control" value="<?php echo htmlspecialchars($fila['correo']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ciudad</label>
                            <input type="text" name="ciudad" class="form-control" value="<?php echo htmlspecialchars($fila['ciudad']); ?>" required>
                        </div>
                        <button type="submit" name="guardar" class="btn btn-success w-100">Actualizar</button>
                    </form>
                    <a href="dashboard.php" class="btn btn-secondary w-100 mt-2">Volver al Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>