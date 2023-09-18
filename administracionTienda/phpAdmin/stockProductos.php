<?php
include("C:/wamp64/www/Tienda/administracionTienda/phpAdmin/inicioAdministracion.php"); // Incluir la plantilla base

?>
<div class="navbar">
    <div class="dropdown">
        <button class="dropbtn">Productos</button>
        <div class="dropdown-content">
            <a href="javascript:void(0);" onclick="mostrarStockProductos()">Stock productos &nbsp;</a>
            <a href="javascript:void(0);" onclick="mostrarFormularioAnadir()">Añadir producto &nbsp;</a>
        </div>
    </div>
</div>
<div id="contenidoDinamico">
        <div id="ocultarStock">
        <?php
        try {
            // Realiza la consulta para obtener los productos
            $sql = "SELECT * FROM productos";
            $result = $pdo->query($sql);

            // Verifica si la consulta se ejecutó correctamente
            if ($result) {
                // Obtén los resultados de la consulta
                $resultados = $result->fetchAll(PDO::FETCH_ASSOC);

                if (count($resultados) > 0) {
                    // Muestra los productos en una tabla
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Nombre</th><th>Lote</th><th>Proveedor</th><th>Stock</th><th>Precio</th><th>Acciones</th></tr>";
                    foreach ($resultados as $producto) {
                        echo "<tr>";
                        // Mostrar los datos de cada producto
                        echo "<td>" . $producto["id"] . "</td>";
                        echo "<td>" . $producto["nombre"] . "</td>";
                        echo "<td>" . $producto["lote"] . "</td>";
                        echo "<td>" . $producto["proveedor"] . "</td>";
                        echo "<td>" . $producto["stock"] . "</td>";
                        echo "<td>" . $producto["precio"] . '€' . "</td>";
                        // Agregar enlace para eliminar y modificar el producto
                        echo '<td><a href="procesarEliminarProducto.php?idProducto=' . $producto["id"] . '">Eliminar</a>';
                        echo '<div><a href="javascript:void(0);" class="enlaceModificar" data-id="' . $producto["id"] . '">Modificar</a></div></td>';
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No hay productos disponibles.";
                }
            } else {
                // Si la consulta falló
                echo "Error al obtener los productos";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        </div>
<?php foreach ($resultados as $producto) { ?>
    <div class="formularioModificar" id="formularioModificar_<?php echo $producto['id']; ?>" style="display: none;">
        <h2>Modificar Producto</h2>
        <form action="procesarModificarProducto.php" method="post">
            <!-- Campos del formulario con valores pre-cargados -->
            <input type="hidden" name="idProducto" value="<?php echo $producto['id']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br>
            <label for="lote">Lote:</label>
            <input type="text" name="lote" value="<?php echo $producto['lote']; ?>" required><br>
            <label for="proveedor">Proveedor:</label>
            <input type="text" name="proveedor" value="<?php echo $producto['proveedor']; ?>" required><br>
            <label for="idProveedor">ID del Proveedor:</label>
            <input type="text" name="idProveedor" value="<?php echo $producto['idProveedor']; ?>" required><br>
            <label for="stock">Stock:</label>
            <input type="text" name="stock" value="<?php echo $producto['stock']; ?>" required><br>
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required><br>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div><?php } ?>
    </div>
    <h2 id="anadirTitulo" style="display: none;">Añadir Producto</h2>
<form id="formularioAnadir" action="procesarAnadirProducto.php" method="post" style="display: none;">
    <!-- Campos del formulario -->
    <label for="nombre">Nombre:</label>
    <select name="nombre" id="nombreSelect" required>
        <option value="" disabled selected>Selecciona un producto</option>
        <?php foreach ($productosExistentes as $productoNombre) { ?>
            <option value="<?php echo $productoNombre; ?>"><?php echo $productoNombre; ?></option>
        <?php } ?>
        <!-- Opción para agregar un nuevo producto -->
        <option value="otro">Añadir Producto</option>
    </select>
    <input type="text" name="nuevoNombre" id="nuevoNombre" style="display: none;" required><br>
    <label for="lote">Lote:</label>
    <input type="number" name="lote" required><br>
    <label for="proveedor">Proveedor:</label>
    <select id="proveedorSelect" name="idProveedor" required>
        <option value="" disabled selected>Selecciona un proveedor</option>
        <!-- Opciones de proveedores serán llenadas por JavaScript -->
    </select>
    <input type="hidden" id="proveedorSeleccionado" name="proveedor" value="">
    <label for="idProveedor">ID del Proveedor:</label>
    <input type="text" id="idProveedor" name="idProveedor" required><br>
    <label for="stock">Stock:</label>
    <input type="number" name="stock" required><br>
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" required><br>
    <button type="submit">Añadir Producto</button>
</form>

    </div><script src="/Tienda/administracionTienda/jsAdmin/productos.js"></script>
<script src="/tienda/administracionTienda/jsAdmin/ocultarStock.js"></script>
<script src="/Tienda/administracionTienda/jsAdmin/addProducto.js"></script>
<script src="/Tienda/administracionTienda/jsAdmin/modificarProducto.js"></script>
