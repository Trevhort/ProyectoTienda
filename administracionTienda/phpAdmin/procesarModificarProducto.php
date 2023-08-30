<?php
include("C:/wamp64/www/Tienda/conexionPHP.php");
include("C:/wamp64/www/Tienda/verificacionUsuarioConectado.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idProducto = $_POST["idProducto"];
    $nombre = $_POST["nombre"];
    $lote = $_POST["lote"];
    $proveedor = $_POST["proveedor"];
    $idProveedor = $_POST["idProveedor"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];

    // Actualizar el producto en la base de datos
    $sql = "UPDATE productos SET nombre = :nombre, lote = :lote, proveedor = :proveedor, 
            idProveedor = :idProveedor, stock = :stock, precio = :precio WHERE id = :idProducto";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":lote", $lote);
    $stmt->bindParam(":proveedor", $proveedor);
    $stmt->bindParam(":idProveedor", $idProveedor);
    $stmt->bindParam(":stock", $stock);
    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":idProducto", $idProducto);
    $stmt->execute();

    // Redirigir a la página de stockProductos.php después de actualizar
    header("Location: stockProductos.php");
    exit();
}
?>
