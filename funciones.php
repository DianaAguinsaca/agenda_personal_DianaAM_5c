<?php
//LIMPIAR DATOS
function limpiarDato($dato){
    $dato = trim($dato);
    $dato = htmlspecialchars($dato, ENT_QUOTES, "UTF-8");
    return $dato;
}

//VALIDAR CORREO - tiene parametro y return
function validarCorreo($correo){
    if (filter_var($correo, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

// SWITCH - Mensaje según ciudad
function mensajeCiudad($ciudad){
    switch($ciudad){
        case "Loja": return "Saludos desde Loja";
        case "Quito": return "Saludos desde Quito";
        case "Guayaquil": return "Saludos desde Guayaquil";
        default: return "Saludos desde Ecuador";
    }
}

// WHILE - Contar contactos
function contarContactos($conn){
    $res = mysqli_query($conn, "SELECT * FROM contactos");
    $total = 0;
    while($fila = mysqli_fetch_assoc($res)){
        $total++;
    }
    return $total;
}
?>