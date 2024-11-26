<?php
require("../conexion.php");
try {
    if (isset($_GET['token'])) {
        try {
            session_start();
            
            $token = $_GET['token'];
            $sql = "SELECT * FROM usuarios WHERE token = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            $user_data = $result->fetch_assoc();
            $stmt->close();
        
            

            $contenido = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <h1>Cambio contraseña funciona</h1>
                <p>ID: ' . $user_data['id_usuario'] . '</p>
                <p>Token: ' . $user_data['token'] . '</p>
                <p>Nombre: ' . $user_data['nombre'] . '</p>
                <p>Apellido: ' . $user_data['apellido'] . '</p>
                <p>Dirección de correo: ' . $user_data['email'] . '</p>
                <p>Nombre_usuario: ' . $user_data['nombre_usuario'] . '</p>
                
            </body>
            </html>
            ';
            echo $contenido;
        } catch (Exception $e) {
           null;
        }
    } else {
        $contenido = "<h1>Acceso denegado</h1>";
        echo $contenido;
    }


} catch (Exception) {
    null;
}


?>



