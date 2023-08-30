<?php
session_start();

if (isset($_SESSION['user_tipo'])) {
    if ($_SESSION['user_tipo'] == 'administrador') {
        header("Location: administracionTienda/phpAdmin/inicioAdministracion.php");
        exit();
    } elseif ($_SESSION['user_tipo'] == 'cliente') {
        header("Location: zonaClientes/inicioClientes.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="hojaEstilo.css">
	<title>Alimentación San Enrique</title>
</head>
<body>

	<h1 class="titulo">Alimentación San Enrique</h1>
	<form action="/tienda/inicioSesion.php" method="post" id="loginForm">
		<ul>
			<li>
				<label for="email">Correo electrónico:</label>
				<input type="email" id="email" name="user_email" />
				<p id="mensajeErrorEmail" class="error-mensaje"></p>
			</li>
			<li>
				<label for="pass">Contraseña:</label>
				<input type="text" id="pass" name="user_pass"/>
				<p id="mensajeErrorPass" class="error-mensaje"></p>
			</li>
			<li class="boton">
				<button type="submit">Enviar</button>
			</li>
		</ul>
	</form>
	<p id="registro"><a href="registro.html">Registrar nuevo usuario</a></p>
</body>
</html>
