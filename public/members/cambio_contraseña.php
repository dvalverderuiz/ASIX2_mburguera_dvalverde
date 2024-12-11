<?php
require("../conexion.php");

try {
    if (isset($_GET['token'])) {
        session_start();
        $token = $_GET['token'];
        $sql = "SELECT * FROM usuarios WHERE token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_data = $result->fetch_assoc();
        $stmt->close();

        if ($user_data) {
            $contenido = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
                <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet"/>
                <title>Restauración de contraseña</title>
            </head>
            <body style="background: #F4F1E9;">
                <div class="center-screen">
                    <div class="login-box">
                        <form id="update-password-form" action="cambio_contraseña.php" method="post">
                            <input type="hidden" name="token" value="' . htmlspecialchars($token) . '">
                            <div data-mdb-ripple-init class="mb-5">
                                <a href="../index.php">
                                    <img src="../assets/img/logo.png" width="100px" height="100px" alt="Logo">
                                </a>
                            </div>
                            <div style="justify-items: center;" class="mb-4">
                                <h3>RESTAURACIÓN DE CONTRASEÑA</h3>
                                <p>Bienvenido <b>' . htmlspecialchars($user_data['nombre_usuario']) . '</b>, escribe tu nueva contraseña.</p>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="nueva-contraseña" class="form-control" name="nueva-contraseña" required/>
                                <label class="form-label" for="nueva-contraseña">Nueva contraseña</label>
                            </div>
                            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">CAMBIAR CONTRASEÑA</button>
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
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </body>
            </html>
            ';
            echo $contenido;
        } else {
            echo "<h1>Token inválido o caducado.</h1>";
        }
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST["nueva-contraseña"]) && isset($_POST["token"])) {
            $nueva_contraseña = $_POST["nueva-contraseña"];
            $token = $_POST["token"];

            $sql = "SELECT id_usuario FROM usuarios WHERE token = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            $user_data = $result->fetch_assoc();
            $stmt->close();

            if ($user_data) {
                $id_usuario = $user_data['id_usuario'];
                $hashed_password = password_hash($nueva_contraseña, PASSWORD_BCRYPT);

                $sql_update = "UPDATE usuarios SET contraseña = ? WHERE id_usuario = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("si", $hashed_password, $id_usuario);

                if ($stmt_update->execute()) {
                    echo "<script>alert('Contraseña actualizada correctamente.'); window.location.href='../index.php';</script>";
                } else {
                    echo "<script>alert('Error al actualizar la contraseña.'); window.history.back();</script>";
                }
                $stmt_update->close();
            } else {
                echo "<script>alert('Token inválido o caducado.'); window.location.href='../index.php';</script>";
            }
        } else {
            echo "<script>alert('Debe proporcionar una contraseña válida.'); window.history.back();</script>";
        }
    } else {
        echo "<h1>Acceso denegado.</h1>";
    }
} catch (Exception $e) {
    echo "<h1>Ocurrió un error inesperado.</h1>";
}
?>
