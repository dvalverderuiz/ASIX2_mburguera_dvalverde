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
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                <!-- Font Awesome -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
                <!-- Google Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
                <!-- MDB -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet"/>
                <title>Document</title>
            </head>
            <body>
                <div class="center-screen">
                    <div class="login-box">
                        <form id="update-password-form" action="cambio_contraseña.php" method="post">
                            <div data-mdb-ripple-init class="mb-5">
                                <a href="../index.php">
                                    <img src="../assets/img/logo.png" width="100px" height="100px" alt="Logo">
                                </a>
                            </div>
                            <div style="justify-items: center;" class="mb-4">
                                <h3>RESTAURACIÓN DE CONTRASEÑA</h3>
                                <p> Bienvenido <b>' . $user_data['nombre_usuario'] . '</b> escriba su nueva contraseña  </p>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="" id="nueva-contraseña" class="form-control" name="nueva-contraseña"/>
                                <label class="form-label">Nueva contraseña</label>
                            </div>
                            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">COMPROBAR</button>
                        </form>    
                    </div>
                </div>

                <h1>Cambio contraseña funciona</h1>
                <p>ID: ' . $user_data['id_usuario'] . '</p>
                <p>Token: ' . $user_data['token'] . '</p>
                <p>Nombre: ' . $user_data['nombre'] . '</p>
                <p>Apellido: ' . $user_data['apellido'] . '</p>
                <p>Dirección de correo: ' . $user_data['email'] . '</p>
                <p>Nombre_usuario: ' . $user_data['nombre_usuario'] . '</p>
            


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



