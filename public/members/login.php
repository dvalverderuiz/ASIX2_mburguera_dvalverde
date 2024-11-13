<?php
session_start();

// Configuración de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conexion";

// Conectar a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email_login = $_POST["email_login"];
    $contraseña_login = $_POST["contraseña_login"];

    // Consulta SQL usando un marcador de posición
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($contraseña_login, $user_data['contraseña'])) {
            
            
            
            $_SESSION["user_id"] = $user_data["id_usuario"];
            $_SESSION["nombre"] = $user_data["nombre"];
            $_SESSION["apellido"] = $user_data["apellido"];
            $_SESSION["nombre_usuario"] = $user_data["nombre_usuario"];
            $_SESSION["registro"] = $user_data["registro"];
            $_SESSION["rol"] = $user_data["rol"];
            echo "VERIFICADO";
            echo $_SESSION["user_id"];
            echo $_SESSION["nombre"];
            echo $_SESSION["apellido"];
            echo $_SESSION["nombre_usuario"];
            echo $_SESSION["registro"];
            echo $_SESSION["rol"];
            //header("Location: login.php");
            exit();
        } else {
            echo "Correo electrónico o contraseña incorrectos.";
        }
    } else {
        echo "Correo electrónico o contraseña incorrectos.";
    }

    
    $stmt->close();
}

$conn->close();
?>
