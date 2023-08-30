<?php
include("C:/wamp64/www/Tienda/conexionPHP.php");
include("C:/wamp64/www/Tienda/verificacionUsuarioConectado.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idProducto"])) {
    $idProducto = $_GET["idProducto"];

    try {
        $sql = "DELETE FROM productos WHERE id = :idProducto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: stockProductos.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al eliminar el producto: " . $e->getMessage();
    }
} else {
    echo "ID de producto no especificado.";
}
?>

