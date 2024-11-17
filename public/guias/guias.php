<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambiar si es necesario
$username = "root";        // Cambiar según tu configuración
$password = "";            // Cambiar según tu configuración
$dbname = "conexion";   // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener títulos y autores
$sql = "SELECT título, autor FROM guias";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guías de Viajes</title>
    <!-- Estilos básicos -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px;
            text-align: center;
        }
        .card h3 {
            margin: 0 0 10px;
            font-size: 1.5em;
            color: #333;
        }
        .card p {
            margin: 0;
            font-size: 1em;
            color: #666;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1 class="" >Guías de Viajes</h1>
    <div class="container">
        
        <?php
        if ($result->num_rows > 0) {
            // Generar una tarjeta para cada registro
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<h3>' . htmlspecialchars($row["título"]) . '</h3>';
                echo '<p>Autor: ' . htmlspecialchars($row["autor"]) . '</p>';
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
