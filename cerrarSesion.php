<?php
include("conexionPHP.php");
session_start();
session_destroy(); // Cierra la sesión

// Redirige al usuario a la página de inicio
header("Location: index.php");
exit();
?>
