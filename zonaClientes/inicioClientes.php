<?php
include("../conexionPHP.php");
include("../verificacionUsuarioConectado.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="hojaEstiloClientes.css">
    <title>Panel de Clientes</title>
</head>
<body>
    <h1 class="titulo">--------------------Alimentación San Enrique--------------------</h1>
    <div class="menuInicio">
        <ul class="encabezado">
            <a class="encabezado" href="inicioClientes.php">Inicio</a>
            <a class="encabezado" href="productos.php">Productos</a>
            <a class="encabezado" href="pedidos.php">Pedidos</a>
            <a class="carrito" href="carrito.php"><img class="carritoImg" src="../carrito.png" /></a>
            <a class="bold">
                <?php
                    if ($usuarioConectado) {
                        echo '<a class="encabezadoCerrar agrandar" href="../cerrarSesion.php">Cerrar Sesión</a>';
                        echo "<a><br></a>";
                        echo "<p class='bolder'>Bienvenido, $nombreUsuario</p>";
                }   else {
                        echo '<a class="encabezado" href="../index.php">Iniciar Sesión</a>';
                    }
                ?>
</a>

        </ul>
    </div>
</body>
</html>
