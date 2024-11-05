<?php
session_start();

header('Content-Type: application/json');

// Verificar si hay una sesión iniciada
if (isset($_SESSION["user_id"])) {
    // Si la sesión está activa, devolver los datos del usuario
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
    // Si no hay sesión activa, enviar un mensaje de error
    echo json_encode([
        "success" => false,
        "message" => "No hay sesión activa."
    ]);
}
