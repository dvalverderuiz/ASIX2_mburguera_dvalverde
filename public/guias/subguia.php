<?php

require("../conexion.php");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT título, descripción, autor, registro, ruta_img FROM guias WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$guia = $result->fetch_assoc();

$contenido = $guia ? file_get_contents($guia['descripción']) : "Contenido no disponible.";
$contenido2 = wordwrap($contenido, 100, "<br>", true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Guía</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f1e9;
            margin: 0;
            padding: 0;
        }
        .hero {
            position: relative;
            background: url('<?php echo $guia["ruta_img"] ?? "default.jpg"; ?>') center/cover no-repeat;
            height: 35vh;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        .hero h1 {
            font-size: 3rem;
            text-align: center;
        }
        .content {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.6);
            margin-top: 10px; 
            margin: 0;

            line-height: 1.6;
        }
        .btn-custom {
            background-color: #a3c1ad;
            color: white;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8);
        }
        .btn-custom:hover {
            background-color: #91b09c;
            color: white;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>

<?php if ($guia): ?>
    <div class="hero">
        <h1><?php echo htmlspecialchars($guia['título']); ?></h1>
    </div>
    <div class="container mt-5">
        <div class="content">
            <p><strong>Descripción:</strong></p>
            <p><?php echo $contenido2; ?></p>
            <hr>
            <p><strong>Autor:</strong> <?php echo htmlspecialchars($guia['autor']); ?></p>
            <p><strong>Fecha de Registro:</strong> <?php echo htmlspecialchars($guia['registro']); ?></p>
        </div>
        <div class="button-container">
            <a href="guias.php" class="btn btn-custom">Volver</a>
        </div>
    </div>
<?php else: ?>
    <div class="container text-center mt-5">
        <div class="alert alert-warning" role="alert">
            <strong>Guía no encontrada.</strong>
        </div>
        <div class="button-container">
            <a href="guias.php" class="btn btn-custom">Volver</a>
        </div>
    </div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
