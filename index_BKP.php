<?php
session_start();

$contenido = '

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <title>Expedity</title>
</head>

<body style="background-color: #F4F1E9;">
    <header id="header" style="display: flex; align-items: center;">
        <ul class="nav justify-content-center nav-bar">
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./guias/guias.php"><b>Guias</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="#"><b>Link</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public/index.php">
                    <img src="../public/assets/img/logo.png" width="100px" height="100px" alt="Logo">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="#"><b>Link</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./members/login.php"><b>Login</b></a>
            </li>
        </ul>

        <form method="get" action="../public/members/login.php">
            <ul class="user-menu-navbar">

            
                <li class="nav-item dropdown mt-3" style="background-color: #CAD2C5;">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <p id="username-display" class="mt-3" style="margin-left: 5px;"><b>' . (isset($_SESSION["nombre_usuario"]) 
                        ? htmlspecialchars($_SESSION["nombre_usuario"]) 
                        : "Incia sesión") . '</b></p>
                    </a>';
                    if (isset($_SESSION["nombre_usuario"])) {
                    $contenido .= '
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="../public/members/area_usuario.php">Perfil</a>
                        </li>';

                        if ($_SESSION["rol"] == 1) {
                            $contenido .= '
                            <li>
                                <a class="dropdown-item" href="guias/creador_guias.php">Crear guia</a>
                            </li>';
                        }
                        
                        $contenido .= '
                        <li>
                            <a class="dropdown-item" href="../public/members/logout.php">Cerrar sesión</a>
                        </li>
                    </ul>
                    
                </li>';
            }

            $contenido .= '
            </ul>
        </form>
    </header>

    <main style="background-color: #F4F1E9;">
        <div class="caja-central">
            <h2 style="margin-top: 25px;">¡Regístrate Ahora y Desbloquea un Mundo de Ventajas Exclusivas!</h2>
            <p style="margin: 50px;"></p>
        </div>
        
        
        <section id="testimonios" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Lo que dicen nuestros viajeros</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p class="mb-3">"Gracias a esta guía, viví las mejores vacaciones de mi vida. ¡Todo fue perfecto!"</p>
                        <footer class="blockquote-footer">Ana, España</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p class="mb-3">"Me ayudaron a planificar mi itinerario y a descubrir lugares increíbles."</p>
                        <footer class="blockquote-footer">Carlos, México</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p class="mb-3">"Una experiencia inolvidable gracias a las recomendaciones que recibí."</p>
                        <footer class="blockquote-footer">María, Argentina</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    </main>

    <style type="text/css">
       
        .button_vamosaello:hover {
        
            background-color: #F4F1E9 ;

        }
        .nav-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            list-style-type: none;
            width: 100%;
            margin-top: 30px;
            padding: 0;
        }

        .user-menu-navbar {
            position: absolute;
            right: 150px;
            top: 30px;
            z-index: 2;
        }

        .nav-item.dropdown {
            border: solid;
            border-radius: 15px;
            background-color: #CAD2C5;
            display: inline-flex;
        }

        .nav-link {
            padding: 10px;
        }

        .caja-central {
            text-align: center;
            align-items: center;
            border-radius: 20px;
            background-color: #CAD2C5;
            height: 400px;
            width: 90%;
            max-width: 1200px;
            margin: 60px auto;
            overflow: hidden;
            position: relative;
        }

    

        

        .description-text {
            margin-top: 20px;
            font-size: 1.1rem;
            color: #333;
        }

        
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
</body>

</html>';

echo $contenido;
?>
