<?php
// registroUsuario.php

if (isset($_POST['user_pass']) && isset($_POST['user_email']) && isset($_POST['user_nombre']) && isset($_POST['user_apellidos']) && isset($_POST['user_telefono']) && isset($_POST['user_direccion']) && isset($_POST['user_poblacion']) && isset($_POST['user_cp'])) {

    include("conexionPHP.php");

    // Recibir los datos del formulario
    $email = $_POST['user_email'];
    $pass = $_POST['user_pass'];
    $nombre = $_POST['user_nombre'];
    $apellidos = $_POST['user_apellidos'];
    $telefono = $_POST['user_telefono'];
    $direccion = $_POST['user_direccion'];
    $poblacion = $_POST['user_poblacion'];
    $cp = $_POST['user_cp'];

    // Verificar si el usuario ya existe en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // El usuario ya existe, mostrar un mensaje de error o redirigir a una página de registro fallido
        echo "El usuario ya está registrado.";
    } else {
        // Generar un hash bcrypt seguro para la contraseña
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        // Insertar el nuevo usuario en la base de datos
        $insertStmt = $pdo->prepare("INSERT INTO usuarios (email, pass, nombre, apellidos, telefono, direccion, poblacion, cp) VALUES (:email, :pass, :nombre, :apellidos, :telefono, :direccion, :poblacion, :cp)");
        $insertStmt->bindParam(':email', $email);
        $insertStmt->bindParam(':pass', $hashedPassword);
        $insertStmt->bindParam(':nombre', $nombre);
        $insertStmt->bindParam(':apellidos', $apellidos);
        $insertStmt->bindParam(':telefono', $telefono);
        $insertStmt->bindParam(':direccion', $direccion);
        $insertStmt->bindParam(':poblacion', $poblacion);
        $insertStmt->bindParam(':cp', $cp);
        $insertStmt->execute();

        // Redirigir a index.php después de un registro exitoso
        header("Location: index.php");
        exit(); // Asegura que el script se detenga después de la redirección
    }
} else {
    // Mostrar mensaje de error de registro
    header("Location: registroError.html");
    exit();
}
?>
