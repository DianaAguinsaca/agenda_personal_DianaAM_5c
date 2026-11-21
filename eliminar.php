<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $conexion = conectarDB();
    $stmt = $conexion->prepare("DELETE FROM contactos WHERE id = ? AND id_usuario = ?");
    $stmt->bind_param("ii", $id, $id_usuario);
    $stmt->execute();
    $stmt->close();
}

header("Location: dashboard.php");
exit();
?>