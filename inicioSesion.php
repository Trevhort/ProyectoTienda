<?php
include("conexionPHP.php");
session_start();

$response = array();

if (isset($_POST['user_pass']) && isset($_POST['user_email'])) {

    $email = $_POST['user_email'];
    $pass = $_POST['user_pass'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();
        if (password_verify($pass, $user['pass'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nombre'] = $user['nombre'];
            $_SESSION['user_apellidos'] = $user['apellidos'];

            // Verificar el rol del usuario
            if ($user['rol'] == 'administrador') {
                $_SESSION['user_tipo'] = 'administrador';
            } else {
                $_SESSION['user_tipo'] = 'cliente';
            }

            $response['success'] = true;
            $response['redirect'] = "administracionTienda/inicioAdministracion.php";
        } else {
            $response['success'] = false;
            $response['message'] = "Usuario o contraseña incorrecto.";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Usuario o contraseña incorrecto.";
    }
} else {
    $response['success'] = false;
    $response['message'] = "Por favor, ingresa tu usuario y contraseña.";
}

// Redirige y envía el mensaje de error como parámetro en la URL
header("Location: index.php?error=" . urlencode($response['message']));
exit();
?>
