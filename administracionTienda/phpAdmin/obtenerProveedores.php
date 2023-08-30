<?php
include("C:/wamp64/www/Tienda/conexionPHP.php");
include("C:/wamp64/www/Tienda/verificacionUsuarioConectado.php");

try {
    $sql = "SELECT id_proveedor, nombre FROM proveedores";
    $result = $pdo->query($sql);

    $proveedores = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $proveedores[] = $row;
    }

    echo json_encode($proveedores);
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Error al obtener los proveedores'));
}
?>
