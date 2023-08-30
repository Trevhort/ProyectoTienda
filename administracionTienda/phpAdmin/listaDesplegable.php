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

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Resto del código del head -->
</head>
<body>
    <!-- Resto del código del cuerpo, incluyendo el contenido dinámico -->

    <!-- Código para el formulario de añadir producto -->
    <h2 id="anadirTitulo" style="display: none;">Añadir Producto</h2>
    <form id="formularioAnadir" action="procesarAnadirProducto.php" method="post" style="display: none;">
        <!-- Campos del formulario -->
        <label for="nombre">Nombre:</label>
        <select name="nombre" id="nombreSelect" required>
            <option value="" disabled selected>Selecciona un producto</option>
            <option value="producto1">Producto 1</option>
            <option value="producto2">Producto 2</option>
            <option value="producto3">Producto 3</option>
            <!-- Opción para agregar un nuevo producto -->
            <option value="otro">Otro</option>
        </select>
        <!-- Campo de texto para agregar un nuevo producto si se selecciona "Otro" -->
        <input type="text" name="nuevoNombre" id="nuevoNombre" style="display: none;">
        <!-- Resto de los campos del formulario -->
        <button type="submit">Añadir Producto</button>
    </form>
    
    <!-- Resto del código, incluyendo los scripts -->
</body>
</html>
