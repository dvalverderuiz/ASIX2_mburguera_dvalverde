<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php'; 
require("../conexion.php");

if (isset($_GET['email_'])) {

    $email_envio = $_GET['email_'];
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_envio);
    $stmt->execute();
    $result = $stmt->get_result();

    $user_data = $result->fetch_assoc();
    $_SESSION["token"] = $user_data["token"];

    $stmt->close();
}

//unset($_SESSION['codigo']); -> El unset al inicio da problemas, buscar forma de limpiarlo antes de entrar - asi evitar error de atasco del código de verificación
//unset($_SESSION['token']); -> El token no deberia de borrarse, dejar comentado por si acaso

if (!isset($_SESSION['codigo'])) {
    
    $codigo_verificacion = rand(100000, 999999);
    $_SESSION['codigo'] = $codigo_verificacion; 

    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'expedity.recuperacion.contrasena@gmail.com'; 
        $mail->Password   = ''; // Contraseña de aplicación -> la da Google
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('expedity.recuperacion.contrasena@gmail.com', 'Recuperacion de contrasena');
        $mail->addAddress($email_envio); 
    
        $mail->isHTML(true);
        $mail->Subject = 'Codigo de Verificacion';
        $mail->Body    = "Tu código de verificación es: <b>$codigo_verificacion</b>";

        $mail->send();
        echo '<script type="text/javascript">
            alert("Código enviado correctamente a ' . $email_envio . '");
        </script>';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
} else {
    //unset($_SESSION['codigo']); -> Puede que aqui haya que hacerlo
    echo "Intentando desatascar el código";
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    
    $codigo_comprobar = $_POST["codigo-verificacion"];
    $codigo_verificacion = $_SESSION['codigo'] ?? null;

    if ($codigo_verificacion !== null && $codigo_comprobar == $codigo_verificacion) {
        echo '<script type="text/javascript">
                alert("Código correcto. Redirigiendo...");
                window.location.href = "cambio_contraseña.php?token=' . urlencode($_SESSION["token"]) . '";
              </script>';
        
        unset($_SESSION['codigo']);
        unset($_SESSION['token']);
    } else {
        echo '<script type="text/javascript">
                alert("El código ingresado es incorrecto.");
                window.location.href = "recuperar_contraseña.php";
              </script>';
    }
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
        <form id="recovery-form" action="codigo_recuperacion.php" method="post">
            <div data-mdb-ripple-init class="mb-5">
                <a href="../index.php">
                    <img src="../assets/img/logo.png" width="100px" height="100px" alt="Logo">
                </a>
            </div>
            <div style="justify-items: center;" class="mb-4">
                <h3>INTRODUZCA EL CÓDIGO</h3>
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="" id="codigo-verificacion" class="form-control" name="codigo-verificacion"/>
                <label class="form-label">Código de verificación</label>
            </div>
            
            
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">COMPROBAR</button>
        </form>    
    </div>
</div>



<style type="text/css">
    .container {
        margin: 50px;
        width: 160px;
        background: #ffffff;
        overflow: hidden;
        border: solid;
    }

    .container input {
        letter-spacing: 20px;
        font-family: "Courier New", Courier, monospace;
        font-size: 150%;
        font-weight: bold;
        height: 30px;
        padding-left: 20px;
        border: solid;
        border-color: #000000;
        padding-right: 20px;
        width: 160px;
        border: 0;
        background-color: transparent;
        outline: 0;
    }
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
