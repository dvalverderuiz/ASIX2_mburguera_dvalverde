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

<body>
    <header class="nav-bar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="../guias/guias.php">Guías</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public/index.php">
                    <img src="../assets/img/logo.png" width="80" height="80" alt="Logo">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./quienes_somos.html">Quienes somos</a>
            </li>
        </ul>
        <form method="get" action="../members/login.php">
            <ul class="user-menu-navbar">
                <li class="nav-item dropdown mt-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <p id="username-display" class="mt-3" style="margin-left: 5px;"><b>' . (isset($_SESSION["nombre_usuario"]) 
                        ? htmlspecialchars($_SESSION["nombre_usuario"]) 
                        : "Sesión no iniciada") . '</b></p>
                    </a>';
if (isset($_SESSION["nombre_usuario"])) {
    $contenido .= '
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="../members/area_usuario.php">Perfil</a>
                        </li>';

    if ($_SESSION["rol"] == 1) {
        $contenido .= '
                        <li>
                            <a class="dropdown-item" href="guias/creador_guias.php">Crear guía</a>
                        </li>';
    }

    $contenido .= '
                        <li>
                            <a class="dropdown-item" href="../members/logout.php">Cerrar sesión</a>
                        </li>
                    </ul>
                </li>';
}

$contenido .= '
            </ul>
        </form>
    </header>

    <main>
        <div class="imagen-fondo">
            <div class="caja-central">
                <h2>¡Regístrate Ahora y Desbloquea un Mundo de Ventajas Exclusivas!</h2>
                <p>Accede a guías exclusivas, descubre destinos increíbles y planifica tus aventuras con Expedity.</p>
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4 ">
                    <a href="../members/login.php" class="btn">Iniciar sesión</a>
                    <a href="../members/register.php" class="btn">Regístrate</a>
            </div>
        </div>


       <section id="testimonios" class="py-5">
            <div class="container text-center">
                <h2 class="mb-4">Lo que dicen nuestros viajeros</h2>

                <div id="carouselTestimonios" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <blockquote>
                                <p>"Gracias a esta guía, viví las mejores vacaciones de mi vida. ¡Todo fue perfecto!"</p>
                                <footer class="blockquote-footer">Ana, España</footer>
                            </blockquote>
                        </div>
                        <div class="carousel-item">
                            <blockquote>
                                <p>"Me ayudaron a planificar mi itinerario y a descubrir lugares increíbles."</p>
                                <footer class="blockquote-footer">Carlos, México</footer>
                            </blockquote>
                        </div>
                        <div class="carousel-item">
                            <blockquote>
                                <p>"Una experiencia inolvidable gracias a las recomendaciones que recibí."</p>
                                <footer class="blockquote-footer">María, Argentina</footer>
                            </blockquote>
                        </div>
                        <div class="carousel-item">
                            <blockquote>
                                <p>"Gracias a Expedity, mi viaje fue mucho más fácil de planear. ¡Recomendadísimo!"</p>
                                <footer class="blockquote-footer">Laura, Perú</footer>
                            </blockquote>
                        </div>
                        <div class="carousel-item">
                            <blockquote>
                                <p>"Las guías son increíbles, me ayudaron a descubrir lugares únicos. ¡Una experiencia genial!"</p>
                                <footer class="blockquote-footer">Javier, Colombia</footer>
                            </blockquote>
                        </div>
                        <div class="carousel-item">
                            <blockquote>
                                <p>"La mejor forma de descubrir destinos nuevos y emocionantes. ¡Expedity es mi guía de confianza!"</p>
                                <footer class="blockquote-footer">Sofía, Argentina</footer>
                            </blockquote>
                        </div>
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestimonios" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselTestimonios" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

    </main>

    <footer class="footer mt-auto py-3 text-white">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <h5>Expedity</h5>
                    <p>Explora el mundo con nuestras guías exclusivas. Tu próxima aventura comienza aquí.</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Términos de servicio</a></li>
                        <li><a href="#" class="text-white">Política de privacidad</a></li>
                        <li><a href="#" class="text-white">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Síguenos</h5>
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="mt-3">
                <p class="mb-0">&copy; 2024 Expedity. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

<style type="text/css">

        body {
            background-color: #F4F1E9;
            font-family: "Roboto", sans-serif;
            margin: 0;
            padding: 0;
        }

      .nav-bar {
            display: flex;
            justify-content: center; /* Asegura que los enlaces estén centrados horizontalmente */
            align-items: center; /* Alinea los enlaces verticalmente en el centro */
            background-color: #CAD2C5;
            padding: 10px 0; /* Ajuste para asegurar que haya suficiente espacio alrededor */
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            height: 100px; /* Asegura que el header tenga altura suficiente para centrar los elementos */
        }

       .nav-link {
            color: #333;
            font-weight: bold;
            margin: 0 15px;
            font-size: 1.2rem; /* Aumenté el tamaño de la fuente para hacerlo más visible */
            transition: color 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center; /* Alinea el texto dentro del enlace */
            margin-top: 20px;
        }

        .nav-link:hover {
            color: #8aab8e;
            transform: scale(1.1);
           
        }

      .nav-item img {
            border-radius: 50%;
            transition: transform 0.3s ease;
            height: 80px; /* Ajusté la altura de la imagen */
            width: 80px;  /* Ajusté el ancho de la imagen */
            margin-top: -25px;
        }

        .nav-item img:hover {
            transform: rotate(10deg);
        }

        .caja-central {
            text-align: center;
            background-color: rgba(202, 210, 197, 0.7);
            border-radius: 20px;
            padding: 40px;
            max-width: 1200px;
            margin: 60px auto;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
        }

        .caja-central h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .caja-central p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.6;
        }

        blockquote {
            background-color: #fff;
            border-left: 4px solid #A3C1AD;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            font-style: italic;
        }

        blockquote p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        blockquote footer {
            color: #555;
            font-weight: bold;
            text-align: right;
        }

        .container h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .user-menu-navbar {
            position: absolute;
            right: 45px; 
            top: 10px; 
            background-color: #F4F1E9;
            border: 3px solid #A3C1AD; 
            border-radius: 10px;
            padding: 0px 0px; 
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 2; 
            width: auto; 
            margin-top: 10;
        }

        .user-menu-navbar li {
            list-style: none; /* Eliminar punto */
        }

        .footer {
            background-color: #A3C1AD;
            color: #fff;
            padding: 20px 0;
        }

        .footer h5 {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .footer ul {
            list-style-type: none;
            padding: 0;
        }

        .footer ul li a {
            text-decoration: none;
            color: #fff;
            transition: color 0.3s ease;
        }

        .footer ul li a:hover {
            color: #CAD2C5;
        }

        .footer a i {
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .footer a:hover i {
            transform: scale(1.2);
        }

        .imagen-fondo {
            text-align: center;
            border-radius: 20px;
            padding: 80px;
            max-width: 95%;
            margin: 25px auto;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
            background-image: url("../assets/img/index_img/index.jpg"); 
            background-size: cover;
            background-position: center;
        }

        .btn {
            background-color: #A3C1AD; 
            color: white;               
            padding: 10px 20px;         
            font-size: 1rem;           
            border-radius: 30px;        
            text-align: center;         
            text-decoration: none;    
            display: inline-block;      
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #8aab8e; 
            transform: scale(1.05);      
        }

            
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
';

echo $contenido;
?>
