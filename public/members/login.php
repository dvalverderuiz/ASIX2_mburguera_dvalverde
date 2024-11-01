<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "conexion";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_login = $_POST["email_login"];
    $contraseña_login = $_POST["contraseña_login"];

    // Protegerse contra inyecciones SQL usando consultas preparadas
    $sql = "SELECT * FROM usuarios WHERE email = ? AND contraseña = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email_login, $contraseña_login);
    $stmt->execute();

    $result = $stmt->get_result();
    /* 
    $sql2 = "SELECT..."
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    */


    if ($result->num_rows > 0) {
        echo "Usuario y Contraseña correctos. Inicio de sesión exitoso.";
        
    } else {
        echo "Correo electrónico o contraseña incorrectos.";
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
