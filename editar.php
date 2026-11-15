<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$id = $_GET['id'];

// Buscar el contacto y que sea tuyo
$sql = "SELECT * FROM contactos WHERE id='$id' AND id_usuario='$id_usuario'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);

if (!$fila) {
    header("Location: dashboard.php");
    exit();
}

// Si le das Guardar, actualizar
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $ciudad = $_POST['ciudad'];}

    if (empty($nombre) || empty($telefono) || empty($correo) || empty($ciudad)) {
    echo "Todos los campos son obligatorios.";
} elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo "El correo no es válido.";
} else {

    $sql2 = "UPDATE contactos SET nombre='$nombre', telefono='$telefono', correo='$correo', ciudad='$ciudad' WHERE id='$id' AND id_usuario='$id_usuario'";
    mysqli_query($conexion, $sql2);
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Contacto</title>
<style>
body { font-family: Arial, sans-serif; background: #eaf7ee; margin: 0; padding: 0; }
.header { background: #198a4b; color: white; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; border-radius: 6px 6px 0 0; }
.card { background: white; width: 420px; margin: 20px auto; padding: 0 25px 25px 25px; border-radius: 6px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden; }
h2 { text-align: center; color: #222; font-size: 18px; margin-top: 20px; }
label { display: block; margin-top: 15px; font-weight: bold; color: #333; font-size: 14px; }
input { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
.btn { width: 100%; background: #198a4b; color: white; border: none; padding: 11px; margin-top: 20px; border-radius: 6px; font-size: 15px; cursor: pointer; font-weight: bold; }
.btn:hover { background: #14763f; }
.volver { display: block; text-align: center; margin-top: 15px; color: #2a6df4; text-decoration: underline; font-size: 14px; }
</style>
</head>
<body>

<div class="card">
<div class="header">Mi Agenda Verde 🌿</div>

<h2>Editar Contacto</h2>
<form method="POST">
<label>Nombre:</label>
<input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required>

<label>Teléfono:</label>
<input type="text" name="telefono" value="<?php echo $fila['telefono']; ?>" required>

<label>Correo:</label>
<input type="email" name="correo" value="<?php echo $fila['correo']; ?>" required>

<label>Ciudad:</label>
<input type="text" name="ciudad" value="<?php echo $fila['ciudad']; ?>" required>

<input class="btn" type="submit" name="guardar" value="Guardar Cambios">
</form>
<a class="volver" href="dashboard.php">Volver</a>
</div>

</body>
</html>