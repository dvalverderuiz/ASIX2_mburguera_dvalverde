<?php
require("../conexion.php")

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT id, título, autor, ruta_img_portada FROM guias";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Guías de Viajes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F4F1E9;
        }
        header {
            margin-bottom: 20px;
        }
    
        .nav-bar {
            display: flex;
            justify-content: center; 
            align-items: center; 
            background-color: #CAD2C5;
            padding: 10px 0; 
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            height: 100px; 
        }

        .nav-bar img {
            border-radius: 50%;
            transition: transform 0.3s ease;
            height: 80px; 
            width: 80px;  
            margin-top:-10px;
            margin-left:-14px;
        }

        .nav-bar img:hover {
        transform: rotate(10deg); 
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .guide-card {
            position: relative;
            width: 100%;
            height: 180px;
            margin-bottom: 20px;
            background-size: cover;
            background-position: center;
            filter: brightness(0.9);
        }
        .guide-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }
        .guide-content h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        .guide-content p {
            font-size: 1rem;
            margin-bottom: 15px;
        }
        .guide-content a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #A3C1AD;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .guide-content a:hover {
            background-color: #b1c9b9;
            color: #000;
        }
    </style>
</head>
<body>
    <header>
        <ul class="nav justify-content-center nav-bar">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <img src="../assets/img/logo.png" alt="Logo">
                </a>
            </li>
        </ul>
    </header>

    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                $imagePath = htmlspecialchars($row["ruta_img_portada"]);
                echo '<div class="guide-card" style="background-image: url(' . $imagePath . ');">';
                echo '    <div class="guide-content">';
                echo '        <h3>' . htmlspecialchars($row["título"]) . '</h3>';
                echo '        <p>Autor: ' . htmlspecialchars($row["autor"]) . '</p>';
                echo '        <a href="subguia.php?id=' . urlencode($row["id"]) . '">Ver más</a>';
                echo '    </div>';
                echo '</div>';
            }
        } else {
            echo '<p>No hay guías disponibles.</p>';
        }
        ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>
