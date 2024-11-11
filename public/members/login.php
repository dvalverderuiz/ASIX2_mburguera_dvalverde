<?php
session_start();

header('Content-Type: application/json'); // Asegura que el contenido es JSON

// Configuración de conexión
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "conexion";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die(json_encode(["success" => false, "message" => "Conexión fallida: " . mysqli_connect_error()]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_login = $_POST["email_login"];
    $contraseña_login = $_POST["contraseña_login"];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_login);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        if (password_verify($contraseña_login, $user_data['contraseña'])) {
            // Guardar datos del usuario en la sesión
            $_SESSION["user_id"] = $user_data["id"];  
            $_SESSION["nombre"] = $user_data["nombre"];
            $_SESSION["apellido"] = $user_data["apellido"];
            $_SESSION["nombre_usuario"] = $user_data["nombre_usuario"];
            $_SESSION["registro"] = $user_data["registro"];
            $_SESSION["rol"] = $user_data["rol"];

            echo json_encode([
                "success" => true, 
                "message" => "Inicio de sesión exitoso"
                "nombre_usuario" => $_SESSION["nombre_usuario"]
            ]);

            
            header("Location: http://localhost/xampp/public/index.html")
        } else {
            echo json_encode(["success" => false, "message" => "Correo electrónico o contraseña incorrectos."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Correo electrónico o contraseña incorrectos."]);
    }

    $stmt->close();
}

$conn->close();

?>
