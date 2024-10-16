<?php
$servername = "localhost";
$username = "root";
$password = ""; // Ajusta este valor si cambiaste la contraseña de MAMP
$dbname = "conexion";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contraseña = $_POST["contraseña"];
    $nombre_usuario = $_POST["nombre_usuario"];

    // por defecto los usuarios base tendran rol 0
    $rol = 0

    $sql = "INSERT INTO usuarios (nombre, apellido, email, contraseña, nombre_usuario, rol) VALUES ('$nombre', '$apellido', '$email', '$contraseña', '$nombre_usuario', '$rol')";
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
