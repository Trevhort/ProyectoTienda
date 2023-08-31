function mostrarFormularioAnadir() {
    var formularioAnadir = document.getElementById('formularioAnadir');
    var ocultarStock = document.getElementById('ocultarStock');

    formularioAnadir.style.display = 'block';
    ocultarStock.style.display = 'none';
}

function mostrarStockProductos() {
    var formularioAnadir = document.getElementById('formularioAnadir');
    var ocultarStock = document.getElementById('ocultarStock');

    formularioAnadir.style.display = 'none';
    ocultarStock.style.display = 'block';
}
