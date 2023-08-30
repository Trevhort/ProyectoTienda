<?php
include("C:/wamp64/www/Tienda/conexionPHP.php");
include("C:/wamp64/www/Tienda/verificacionUsuarioConectado.php");

try {
    $sql = "SELECT * FROM productos";
    $result = $pdo->query($sql);

    if ($result) {
        $resultados = $result->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultados);
    } else {
        echo json_encode([]);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => "Error al obtener los productos"]);
}
?>
