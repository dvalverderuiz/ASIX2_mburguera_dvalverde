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
                <a class="nav-link" style="color: black;" href="./guias/guias.php"><b>LINK GUIAS</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="#"><b>LINK</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public/index.php">
                    <img src="../public/assets/img/logo.png" width="100px" height="100px" alt="Logo">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="#"><b>LINK</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./members/login.php"><b>LOGIN</b></a>
            </li>
        </ul>

        <form method="get" action="../public/members/login.php">
            <ul class="user-menu-navbar">

            
                <li class="nav-item dropdown mt-3" style="background-color: #CAD2C5;">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <p id="username-display" class="mt-3" style="margin-left: 5px;"><b>' . (isset($_SESSION["nombre_usuario"]) 
                        ? htmlspecialchars($_SESSION["nombre_usuario"]) 
                        : "no hay sesión iniciada") . '</b></p>
                    </a>';
                    if (isset($_SESSION["nombre_usuario"])) {
                    $contenido .= '
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="../public/members/area_usuario.php">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../public/members/logout.php">Logout</a>
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
            <div class="left-side">
                <!-- Carousel -->
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../public/assets/img/index_img/img1.jpg" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/assets/img/index_img/img2.jpg" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/assets/img/index_img/img3.jpg" class="d-block w-100" alt="Image 3">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/assets/img/index_img/img4.jpg" class="d-block w-100" alt="Image 4">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/assets/img/index_img/img5.jpg" class="d-block w-100" alt="Image 5">
                        </div>
                    </div>
                </div>
                <p class="description-text mt-3">.</p>
            </div>
            <div class="right-side">
                <h2>REGISTRATE AHORA PARA CONOCER LAS VENTAJAS</h2>
                <p>Accede a contenido premium con solo registrarte en nuestra página web. Mas número de guias accesibles, posibilidad de escribirlas tu mismo, contribuir y mucho más.</p>
                
                <div class="button_vamosaello">
                    <a href="../public/members/register.php" style="text-decoration: none; color: #333333;">¡Vamos a ello!</a>
                </div>
                
            </div>
        </div>
    </main>

    <style type="text/css">
        .button_vamosaello {
            background-color: #A3C1AD;
            border: solid;
            width: 150px;
        }

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
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 20px;
            background-color: #CAD2C5;
            height: 600px;
            width: 90%;
            max-width: 1200px;
            margin: 60px auto;
            overflow: hidden;
            position: relative;
        }

        .caja-central::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 8px;
            background-color: #F4F1E9;
            transform: rotate(5deg);
            z-index: 1;
        }

        .left-side {
            width: 50%;
            padding: 20px;
            text-align: center;
        }

        .description-text {
            margin-top: 20px;
            font-size: 1.1rem;
            color: #333;
        }

        .right-side {
            width: 50%;
            background-color: transparent;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .right-side h2 {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
    
    <script>
        document.addEventListener("contextmenu", (event) => event.preventDefault());
    </script>
    

    <script>
        document.addEventListener("keydown", (event) => {
            // F12
            if (event.key === "F12") {
            event.preventDefault();
            }
            // Ctrl+Shift+I o Cmd+Shift+I
            if (event.ctrlKey && event.shiftKey && event.key === "I") {
            event.preventDefault();
            }
            // Ctrl+Shift+J o Cmd+Shift+J
            if (event.ctrlKey && event.shiftKey && event.key === "J") {
            event.preventDefault();
            }
            // Ctrl+U
            if (event.ctrlKey && event.key === "u") {
            event.preventDefault();
            }
            if (event.ctrlKey && event.key === "s") {
            event.preventDefault();
            }
        });
    </script>
</body>

</html>';

echo $contenido;
?>
