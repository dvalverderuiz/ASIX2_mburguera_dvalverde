<?php
session_start();

$contenido = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos en Formulario Responsive</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            background-color: #F4F1E9;
        }

        /* Estilo de la tarjeta */
        .card {
            background-color: #CAD2C5;
            border: none; 
            text-align: center; 
        }

        /* Título centrado */
        .card-header {
            background-color: transparent;
            border-bottom: none; 
        }
        
        .card-header h3 {
            color: #333;
            font-weight: bold;
        }

        
        .logo {
            margin: 0 auto 15px; 
            max-width: 100px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    
                    <a href="../index.php">
                        <img src="../assets/img/logo.png" alt="Logo" class="logo">
                    </a>
                    <h3>Datos del Usuario</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value="' . (isset($_SESSION["nombre"]) 
                        ? htmlspecialchars($_SESSION["nombre"]) 
                        : "fallo al recuperar el dato o sesión no inciada") . '" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" value="' . (isset($_SESSION["apellido"]) 
                        ? htmlspecialchars($_SESSION["apellido"]) 
                        : "fallo al recuperar el dato o sesión no inciada") . '" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nombreUsuario">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="nombreUsuario" value="' . (isset($_SESSION["nombre_usuario"]) 
                        ? htmlspecialchars($_SESSION["nombre_usuario"]) 
                        : "fallo al recuperar el dato o sesión no inciada") . '" disabled>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" value="' . (isset($_SESSION["email"]) 
                        ? htmlspecialchars($_SESSION["email"]) 
                        : "fallo al recuperar el dato o sesión no inciada") . '" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies (Optional for some Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>';

echo $contenido;