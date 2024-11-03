<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION["user_id"])) {
    // Devolver los datos del usuario en formato JSON
    echo json_encode([
        "success" => true,
        "user_id" => $_SESSION["user_id"],
        "nombre" => $_SESSION["nombre"],
        "apellido" => $_SESSION["apellido"],
        "nombre_usuario" => $_SESSION["nombre_usuario"],
        "registro" => $_SESSION["registro"],
        "rol" => $_SESSION["rol"]
    ]);
} else {
    // No hay sesión activa
    echo json_encode(["success" => false, "message" => "No hay sesión activa."]);
}
?>

