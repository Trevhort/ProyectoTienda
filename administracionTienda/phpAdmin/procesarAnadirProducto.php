<?php
include("C:/wamp64/www/Tienda/conexionPHP.php");
include("C:/wamp64/www/Tienda/verificacionUsuarioConectado.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    if ($nombre === "otro") {
        $nombre = $_POST["nuevoNombre"]; // Usar el nuevo nombre ingresado
    }
    $lote = $_POST["lote"];
    $proveedor = $_POST["proveedor"];
    $idProveedor = $_POST["idProveedor"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];

    // Insertar el nuevo producto en la base de datos
    $sql = "INSERT INTO productos (nombre, lote, proveedor, idProveedor, stock, precio) VALUES (:nombre, :lote, :proveedor, :idProveedor, :stock, :precio)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":lote", $lote);
    $stmt->bindParam(":proveedor", $proveedor);
    $stmt->bindParam(":idProveedor", $idProveedor);
    $stmt->bindParam(":stock", $stock);
    $stmt->bindParam(":precio", $precio);
    
    if ($stmt->execute()) {
        // Redirigir a la página de stockProductos.php después de agregar
        header("Location: stockProductos.php");
        exit();
    } else {
        echo "Error al agregar el producto.";
    }
}
$idProveedor = $_POST['idProveedor'];
$proveedor = $_POST['proveedor']; // Usar este valor en caso de que el desplegable tenga la opción "otro"

?>
