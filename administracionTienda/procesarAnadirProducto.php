<?php
include("../conexionPHP.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $lote = $_POST["lote"];
    $proveedor = $_POST["proveedor"];
    $idProveedor = $_POST["idProveedor"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];
    try {
    $sql = "INSERT INTO productos (nombre, lote, proveedor, idProveedor, stock, precio) VALUES ('$nombre', $lote, '$proveedor', $idProveedor, $stock, $precio)";
    // Ejecuta la consulta SQL y maneja posibles errores
    $stmt = $pdo->prepare($sql);

    // ... tu código para vincular parámetros ...

    // Ejecutar la consulta preparada
    if ($stmt->execute()) {
        header("Location: stockProductos.php");
        exit();
    } else {
        echo "Error al añadir el producto.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
?>
