<?php
// Importar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Cargar PHPMailer usando Composer

// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

// Código de verificación
$codigo_verificacion = rand(100000, 999999);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'expedity.recuperacion.contrasena@gmail.com'; // Tu correo electrónico
    $mail->Password   = 'itjz dupj tvdd oojq'; // Tu contraseña o clave de aplicación
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configuración del correo
    $mail->setFrom('expedity.recuperacion.contrasena@gmail.com', 'Recuperacion de contraseña');
    $mail->addAddress('davidvalverderuiz209@gmail.com'); // Cambia al destinatario deseado

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Código de Verificación';
    $mail->Body    = "Tu código de verificación es: <b>$codigo_verificacion</b>";

    // Enviar el correo
    $mail->send();
    echo "Correo enviado correctamente con el código de verificación: $codigo_verificacion";
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
