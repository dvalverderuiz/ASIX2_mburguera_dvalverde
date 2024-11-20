<?php
// logout.php
session_start(); // Inicia la sesión

// Destruir todas las variables de sesión
$_SESSION = [];



session_destroy();


header("Location: ../index.php"); 
exit;
