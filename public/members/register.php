<?php
$servername = "localhost";
$username = "root";
$password = ""; // Ajusta este valor si cambiaste la contraseña de MAMP
$dbname = "conexion";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesamiento del formulario al recibir una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre-register"] ?? '';
    $apellido = $_POST["apellido-register"] ?? '';
    $email = $_POST["email-register"] ?? '';
    $contraseña = $_POST["contraseña-register"] ?? '';
    $nombre_usuario = $_POST["username-register"] ?? '';

    // Definir rol predeterminado
    $rol = 0;

    // Cifrado de la contraseña
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellido, email, contraseña, nombre_usuario, rol) VALUES ('$nombre', '$apellido', '$email', '$contraseña_hash', '$nombre_usuario', '$rol')";
    if ($conn->query($sql) === TRUE) {
        echo'<script type="text/javascript">
              alert("Usuario registrado correctamente");
              window.location.href="../index.php";
              </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet"/>
    
    <title>Registro de Usuario</title>
</head>
<body style="background-color: #F4F1E9;">
    <div class="center-screen">
        <div class="register-box">
            <form id="register-form" action="" method="POST">
                <div data-mdb-ripple-init class="mb-5">
                    <a href="../index.php">
                      <img src="../assets/img/logo.png" width="100px" height="100px" alt="Logo">
                    </a>
                </div>
                <div style="justify-items: center;" class="mb-4">
                  <h3>REGISTRO DE USUARIO</h3>
                  <p>En caso de tener una cuenta <a href="../members/login.html">inicia sesión</a>.</p>
                </div>
                
                <div class="row mb-4">
                  <div class="col">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="nombre-register" name="nombre-register" class="form-control" required />
                      <label class="form-label">Nombre</label>
                    </div>
                  </div>
                  <div class="col">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="apellido-register" name="apellido-register" class="form-control" required />
                      <label class="form-label">Apellido</label>
                    </div>
                  </div>
                  <div class="col">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="username-register" name="username-register" class="form-control" required />
                      <label class="form-label">Nombre de usuario</label>
                    </div>
                  </div>
                </div>
              
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" id="email-register" name="email-register" class="form-control" required />
                  <label class="form-label">Correo electrónico</label>
                </div>
              
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="contraseña-register" name="contraseña-register" class="form-control" required />
                  <label class="form-label">Contraseña</label>
                </div>
                
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Registrar</button>
            </form>
        </div>
    </div>
    
    <style type="text/css">
        .center-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;
        }

        .register-box {
          background-color: #CAD2C5; 
          width: 750px; 
          height: 600px; 
          padding: 50px; 
          border-radius: 5px;
        }
    </style>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
