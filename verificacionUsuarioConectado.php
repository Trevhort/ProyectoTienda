<?php
include("C:/wamp64/www/Tienda/conexionPHP.php");

session_start();

$usuarioConectado = false;
$nombreUsuario = "";

if (isset($_SESSION['user_nombre']) && isset($_SESSION['user_apellidos'])) {
    $usuarioConectado = true;
    $nombreUsuario = $_SESSION['user_nombre'] . " " . $_SESSION['user_apellidos'];
}
?>
