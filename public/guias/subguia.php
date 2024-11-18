<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conexion";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID de la guía de la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT título, descripción, autor, registro FROM guias WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$guia = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Guía</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            margin: 10px 0;
            color: #666;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #A3C1AD;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #A3C1AD;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($guia): ?>
            <h1><?php echo htmlspecialchars($guia['título']); ?></h1>
            <p><strong>Descripción:</strong> <?php echo nl2br(htmlspecialchars($guia['descripción'])); ?></p>
            <p><strong>Autor:</strong> <?php echo htmlspecialchars($guia['autor']); ?></p>
            <p><strong>Fecha de Registro:</strong> <?php echo htmlspecialchars($guia['registro']); ?></p>
            <a href="guias.php">Volver</a>
        <?php else: ?>
            <p>Guía no encontrada.</p>
            <a href="guias.php">Volver</a>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
