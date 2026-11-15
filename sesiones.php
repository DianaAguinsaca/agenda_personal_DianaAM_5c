<?php
// sesiones.php - Manejo de sesiones
// Mi Agenda Verde - Diana

session_start();

// Verifica que estés logueada, si no te manda al login
function verificarSesion() {
    if (!isset($_SESSION["id_usuario"])) {
        header("Location: login.php");
        exit();
    }
}

// Cierra tu sesión y te manda al login
function cerrarSesion() {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>