<?php
include("funciones.php");
include("sesiones.php");

$conn = conectarDB();
$mensaje = "";

if (isset($_POST['login'])) {
    $correo = limpiarDato($_POST['correo']);
    $password = $_POST['password'];

    $resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '$correo'");
    $usuario = mysqli_fetch_assoc($resultado);

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['usuario'] = $usuario['nombre'];
        $_SESSION['correo'] = $usuario['correo'];
        header("Location: dashboard.php");
        exit();
    } else {
        $mensaje = "Correo o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Mi Agenda Verde</title>
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
                        <h5 class="text-center">Iniciar Sesión</h5>
                        <?php if($mensaje != ""){ echo '<div class="alert alert-danger">'.$mensaje.'</div>'; } ?>
                        <form method="POST">
                            <label>Correo:</label>
                            <input type="email" name="correo" class="form-control mb-3" required>
                            <label>Contraseña:</label>
                            <input type="password" name="password" class="form-control mb-3" required>
                            <button name="login" class="btn btn-success w-100">Iniciar Sesión</button>
                        </form>
                        <p class="text-center mt-3">
                            ¿No tienes cuenta? <a href="registro.php">Regístrate</a>
                        </p>
                        <p class="text-center">
                            <a href="index.php">Volver al inicio</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>