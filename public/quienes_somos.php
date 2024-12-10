<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conexion";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos de los usuarios
$sql = "SELECT nombre, descripcion, ruta_img FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de Nosotros</title>
    <!-- Agregando Bootstrap para el diseño -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F4F1E9;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            padding: 50px;
            background-color: #A3C1AD;
        }

        .header h1 {
            color: white;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .team-section {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 50px 0;
        }

        .team-member {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
            margin: 20px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .team-member:hover {
            transform: scale(1.05);
        }

        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .team-member h3 {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
        }

        .team-member p {
            font-size: 1rem;
            color: #666;
        }

        .footer {
            background-color: #CAD2C5;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }

        .footer p {
            margin: 0;
            color: #333;
        }
    </style>
</head>
<body>

    <header class="header">
        <h1>Acerca de Nosotros</h1>
        <p>Conoce al equipo detrás de este proyecto</p>
    </header>

    <div class="team-section">
        <?php
        // Verificamos si hay resultados
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imagePath = htmlspecialchars($row["ruta_img"]);
                $name = htmlspecialchars($row["nombre"]);
                $description = htmlspecialchars($row["descripcion"]);

                echo '<div class="team-member">';
                echo '    <img src="' . $imagePath . '" alt="' . $name . '">';
                echo '    <h3>' . $name . '</h3>';
                echo '    <p>' . $description . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No se encontraron miembros del equipo.</p>';
        }
        ?>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Nomadity. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
