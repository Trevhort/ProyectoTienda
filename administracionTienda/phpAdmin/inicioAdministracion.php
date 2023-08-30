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
    <title>Panel de Administración</title>
</head>
<body>
    <h1 class="titulo">Alimentación San Enrique <br>ADMINISTRACIÓN</h1>
    <div class="menuInicio">
        <ul class="encabezado">
          <a class="encabezado encabezado1" href="inicioAdministracion.php">Inicio</a>
          <a class="encabezado encabezado2" href="clientes.php">Clientes</a>
          <a class="encabezado encabezado3" href="pedidos.php">Pedidos</a>
          <a class="encabezado encabezado3" href="stockProductos.php">&nbsp Stock Productos</a>
        <?php
          if ($usuarioConectado) {
              echo '<a class="encabezadoCerrar agrandar" href="../../cerrarSesion.php">Cerrar Sesión</a>';
              echo "<a><br></a>";
              echo "<p class='bolder'>Bienvenido, $nombreUsuario</p>";
          } else {
              echo '<a class="encabezado5" href="../index.php">Iniciar Sesión</a>';
          }
        ?>
        </ul>
    </div>
</body>
</html>
