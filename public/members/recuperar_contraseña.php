<?php
require("../conexion.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email_recovery = $_POST["email-recovery"];


    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_recovery);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        echo'<script type="text/javascript">
            window.location.href="codigo_recuperacion.php?email_=' . urlencode($email_recovery) . '";
            </script>';
    } else {
        echo'<script type="text/javascript">
            alert("Este correo no existe");
            window.location.href="recuperar_contraseña.php";
            </script>';
    }

    

    
    $stmt->close();
}






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
<body style="background: #F4F1E9;">
<div class="center-screen">
      <div class="login-box">
        <form id="recovery-form" action="recuperar_contraseña.php" method="post">
            <div data-mdb-ripple-init class="mb-5">
                <a href="../index.php">
                    <img src="../assets/img/logo.png" width="100px" height="100px" alt="Logo">
                </a>
            </div>
            <div style="justify-items: center;" class="mb-4">
                <h3>RECUPERACIÓN DE CONTRASEÑA</h3>
            </div>
            
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="email-recovery" class="form-control" name="email-recovery"/>
                <label class="form-label">Email address</label>
            </div>
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Enviar código</button>
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