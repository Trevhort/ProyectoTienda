<?php
include("C:/wamp64/www/Tienda/conexionPHP.php");
include("C:/wamp64/www/Tienda/verificacionUsuarioConectado.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/Tienda/administracionTienda/cssAdmin/hojaEstiloAdmin.css">
    <link rel="stylesheet" href="/Tienda/administracionTienda/cssAdmin/hojaEstiloAdminProductos.css">
    <title>Panel de Administración</title>
</head>
<body>
    <h1 class="titulo">Alimentación San Enrique <br>ADMINISTRACIÓN</h1>
    <div class="menuInicio">
        <ul class="encabezado">
            <a class="encabezado encabezado1" href="inicioAdministracion.php">Inicio</a>
            <a class="encabezado encabezado2" href="clientes.php">Clientes</a>
            <a class="encabezado encabezado3" href="pedidos.php">Pedidos</a>
            <a class="encabezado encabezado4" href="stockProductos.php">&nbsp Stock Productos</a>
            <!-- Coloca aquí el resto de los enlaces generales -->
        
        <?php
        if ($usuarioConectado) {
            echo '<a class="encabezadoCerrar agrandar" href="/Tienda/cerrarSesion.php">Cerrar Sesión</a>';
            echo "<a><br></a>";
            echo "<p class='bolder'>Bienvenido, $nombreUsuario</p>";
        } else {
            echo '<a class="encabezado" href="/Tienda/index.php">Iniciar Sesión</a>';
        }
        ?>
        </ul>
    </div>
    <div id="contenidoDinamico">
        <!-- Aquí se cargará el contenido específico según el enlace seleccionado -->
    </div>
</body>
</html>
