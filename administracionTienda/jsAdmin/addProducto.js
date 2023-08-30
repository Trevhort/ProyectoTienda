document.addEventListener("DOMContentLoaded", function() {
    var nombreSelect = document.getElementById("nombreSelect");
    var nuevoNombreInput = document.getElementById("nuevoNombre");
    var idProveedorInput = document.getElementById("idProveedor");
    var proveedorSelect = document.getElementById("proveedorSelect");
    var proveedorSeleccionadoInput = document.getElementById("proveedorSeleccionado");

    // Obtener los productos utilizando fetch
    fetch("obtenerProductos.php")
        .then(response => response.json())
        .then(productos => {
            productos.forEach(producto => {
                var option = document.createElement("option");
                option.value = producto.nombre;
                option.textContent = producto.nombre;
                nombreSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error al obtener los productos:", error);
        });

    // Obtener los proveedores utilizando fetch y llenar el desplegable
    fetch("obtenerProveedores.php")
        .then(response => response.json())
        .then(proveedores => {
            proveedores.forEach(proveedor => {
                var option = document.createElement("option");
                option.value = proveedor.id_proveedor;
                option.textContent = proveedor.nombre;
                proveedorSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error al obtener los proveedores:", error);
        });

    nombreSelect.addEventListener("change", function() {
        if (nombreSelect.value === "otro") {
            nuevoNombreInput.style.display = "block";
            nuevoNombreInput.required = true;
        } else {
            nuevoNombreInput.style.display = "none";
            nuevoNombreInput.required = false;
        }
    });

    proveedorSelect.addEventListener("change", function() {
        if (proveedorSelect.value === "otro") {
            nuevoNombreInput.style.display = "block";
            nuevoNombreInput.required = true;
        } else {
            nuevoNombreInput.style.display = "none";
            nuevoNombreInput.required = false;
            // Capturar el proveedor seleccionado y asignarlo al campo oculto
            proveedorSeleccionadoInput.value = proveedorSelect.value;
        }
    });

    // Actualizar el ID del proveedor cuando se seleccione uno
    document.getElementById("proveedorSelect").addEventListener("change", function() {
        idProveedorInput.value = this.value;
    });
});
