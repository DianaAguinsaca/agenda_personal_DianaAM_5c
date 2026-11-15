<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$id = $_GET['id'];

$sql = "DELETE FROM contactos WHERE id='$id' AND id_usuario='$id_usuario'";
mysqli_query($conexion, $sql);

header("Location: dashboard.php");
exit();
?>