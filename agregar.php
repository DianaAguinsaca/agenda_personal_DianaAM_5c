<?php
// ==========================================
//  PARTE 1: LO QUE NO SE VE - PHP
// ==========================================

include("conexion.php");
include("funciones.php");
include("sesiones.php");
verificarSesion();

$conn = conectarDB();
$mensaje = "";

// Si le dieron clic al botón Guardar...
if (isset($_POST['guardar'])) {


    $id_usuario = $_SESSION['id_usuario'];
    $nombre = limpiarDato($_POST['nombre']);
    $telefono = limpiarDato($_POST['telefono']);
    $correo = limpiarDato($_POST['correo']);
    $ciudad = limpiarDato($_POST['ciudad']);

    if (empty($nombre) || empty($telefono) || empty($correo) || empty($ciudad)) {
    $mensaje = "Todos los campos son obligatorios.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $mensaje = "El correo no es válido.";
    } else
    {

    $stmt = $conn->prepare("INSERT INTO contactos (id_usuario, nombre, telefono, correo, ciudad) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $id_usuario, $nombre, $telefono, $correo, $ciudad);
if ($stmt->execute()) {
    $mensaje = "Contacto guardado";
} else {
    $mensaje = "Error al guardar: " . $stmt->error;
}
$stmt->close();
 }
}
?>

<!-- ========================================== -->
<!--  PARTE 2: LO QUE SÍ SE VE - HTML           -->
<!-- ========================================== -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Contacto - Mi Agenda Verde</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-success bg-opacity-10">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow">

                    <div class="card-header bg-success text-white text-center">
                        <h4>Mi Agenda Verde 🌿</h4>
                    </div>

                    <div class="card-body">

                        <h5 class="text-center">Agregar Contacto</h5>

                        <?php if($mensaje != ""){ echo '<div class="alert alert-success">'.$mensaje.'</div>'; } ?>

                        <form method="POST">

                            <label>nombre:</label>
                            <input type="text" name="nombre" class="form-control mb-3" required>

                            <label> telefono:</label>
                            <input type="text" name="telefono" class="form-control mb-3" required>

                            <label> correo :</label>
                            <input type="text" name="correo" class="form-control mb-3" required>

                            <label> ciudad :</label>
                            <input type="text" name=" ciudad" class="form-control mb-3" required>

                            <button name="guardar" class="btn btn-success w-100">Guardar</button>
                        </form>

                        <p class="text-center mt-3">
                            <a href="dashboard.php">Volver al Dashboard</a>
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </div>

</body>
</html>