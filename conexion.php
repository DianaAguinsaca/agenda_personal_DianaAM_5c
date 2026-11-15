<?php
// conexion.php - Conexión a la base de datos
// Mi Agenda Verde - Diana

$servidor = "localhost";
$usuario_db = "root";
$clave_db = "";
$nombre_db = "agenda_personal";
$puerto=3307;

$conexion = mysqli_connect($servidor, $usuario_db, $clave_db, $nombre_db, $puerto);

if (!$conexion) {
    die("Error al conectar con la base de datos. Intenta más tarde.");
}

mysqli_set_charset($conexion, "utf8");
?>