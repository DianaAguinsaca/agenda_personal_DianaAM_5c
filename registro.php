<?php
include "conexion.php";
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave = $_POST["password"];
    $clave = password_hash($clave,PASSWORD_DEFAULT);

    $ver = $conexion->query("SELECT * FROM usuarios WHERE correo='$correo'");
    if ($ver->num_rows > 0) {
        $mensaje = "No se pudo registrar. Intenta con otro correo o inicia sesión.";
    } else {
        $sql = "INSERT INTO usuarios (nombre, correo, password) VALUES ('$nombre', '$correo', '$clave')";
        if ($conexion->query($sql)) {
            header("Location: login.php");
            exit();
        } else {
            $mensaje = "Error al registrar. Intenta más tarde.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse - Mi Agenda Verde</title>
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
                        <h5 class="text-center">Registrarse</h5>
                        <?php if($mensaje != ""){ echo '<div class="alert alert-danger">'.$mensaje.'</div>'; } ?>
                        <form method="POST" action="registro.php">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" class="form-control mb-3" required>
                            <label>Correo:</label>
                            <input type="email" name="correo" class="form-control mb-3" required>
                            <label>Contraseña:</label>
                            <input type="password" name="password" class="form-control mb-3" required>
                            <button type="submit" class="btn btn-success w-100">Registrarme</button>
                        </form>
                        <p class="text-center mt-3">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
                        <p class="text-center"><a href="index.php">Volver al inicio</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>