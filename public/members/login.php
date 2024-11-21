<?php
require("../conexion.php");

session_start();  





if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
            
            
            $_SESSION["user_id"] = $user_data["id_usuario"];
            $_SESSION["nombre"] = $user_data["nombre"];
            $_SESSION["apellido"] = $user_data["apellido"];
            $_SESSION["nombre_usuario"] = $user_data["nombre_usuario"];
            $_SESSION["email"] = $user_data["email"];
            $_SESSION["registro"] = $user_data["registro"];
            $_SESSION["rol"] = $user_data["rol"];
        
            header("Location: ../index.php");
            exit();
        } else {
            echo'<script type="text/javascript">
              alert("Error en las credenciales");
              window.location.href="login.php";
              </script>';
        }
    } else {
        echo'<script type="text/javascript">
          alert("Error en las credenciales");
          window.location.href="login.php";
          </script>';
    }

    
    $stmt->close();
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
    <title>Document</title>
</head>
<body style="background-color: #F4F1E9; ;">
    <div class="center-screen">
      <div class="login-box">
        <form id="login-form" action="login.php" method="post">
          <div data-mdb-ripple-init class="mb-5">
              <a href="../index.php">
                <img src="../assets/img/logo.png" width="100px" height="100px" alt="Logo">
              </a>
          </div>
          <div style="justify-items: center;" class="mb-4">
            <h3>INICIO DE SESION</h3>
            <p>En caso de <b>NO</b> tener cuenta <a href="../members/register.php">regístrate</a>.</p>
          </div>
          
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" id="email-login" class="form-control" name="email_login"/>
            <label class="form-label">Email address</label>
          </div>
        
          
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" id="contraseña-login" class="form-control" name="contraseña_login" />
            <label class="form-label">Password</label>
          </div>
        
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked/>
                <label class="form-check-label"> Recordar usuario </label>
              </div>
            </div>
        
            <div class="col">
              <a href="recuperar_contraseña.php">Recuperar contraseña?</a>
            </div>
          </div>
        
          
          <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Login</button>
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

        .login-box {
          background-color: #CAD2C5; 
          width: 500px; 
          height: 600px; 
          padding: 50px; 
          border-radius: 5px;
        }
    </style>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>
    
    <!--  <script src="auth.js"></script>  -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

